<?php
/**
 *
 * @package emailSignatureGenerator
 */
namespace Includes\Base;

/**
 * GHUpdater class
 */
class GhUpdater {

    /**
     * Active plugin
     *
     * @var string
     */
    public $active;

    /**
     *
     * Options
     *
     * @var array
     */
    public $options;
    /**
     * Plugin file
     *
     * @var string
     */
    public $plugin_data;

    /**
     * Plugin file
     *
     * @var string
     */
    public $basename;

    /**
     * Github response
     *
     * @var string
     */
    private $github_response;

    public function register() {

        if ( !function_exists( 'get_plugin_data' ) ) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }

        $this->options     = get_option( 'esg_updater' );
        $this->plugin_data = get_plugin_data( ESG_PLUGIN_FILE );
        $this->basename    = plugin_basename( ESG_PLUGIN_FILE );
        $this->active      = is_plugin_active( $this->basename );
        $this->initialize();
    }

    private function get_repository_info() {
        if ( is_null( $this->github_response ) ) { // Do we have a response?



            $args        = array();
            $request_uri = sprintf( 'https://api.github.com/repos/%s/%s/releases', $this->options['gh_username'], $this->options['gh_repo'] ); // Build URI

            $args = array();

            if ( $this->options['gh_auth'] ) { // Is there an access token?
                $args['headers']['Authorization'] = "token {$this->options['gh_auth']}"; // Set the headers
            }
            $args['headers']['Accept'] = 'application/vnd.github+json'; // Set the headers

            $response = json_decode( wp_remote_retrieve_body( wp_remote_get( $request_uri, $args ) ), true ); // Get JSON and parse it

            if ( is_array( $response ) ) { // If it is an array
                $response = current( $response ); // Get the first item
            }

            $this->github_response = $response; // Set it to our property
        }
    }


    public function initialize() {
        add_filter( 'pre_set_site_transient_update_plugins', array( $this, 'modify_transient' ), 10, 1 );
        add_filter( 'plugins_api', array( $this, 'plugin_popup' ), 10, 3 );
        add_filter( 'upgrader_post_install', array( $this, 'after_install' ), 10, 3 );

        // Add Authorization Token to download_package
        add_filter(
            'upgrader_pre_download',
            function() {
                add_filter( 'http_request_args', array( $this, 'download_package' ), 15, 2 );
                return false; // upgrader_pre_download filter default return value.
            }
        );
    }

    public function modify_transient( $transient ) {

        if ( property_exists( $transient, 'checked' ) ) { // Check if transient has a checked property

            if ( $checked = $transient->checked ) { // Did WordPress check for updates?

                $out_of_date = false;
                $this->get_repository_info(); // Get the repo info

                if ( isset( $this->github_response['tag_name'] ) && isset( $checked[ $this->basename ] ) ) {
                    $out_of_date = version_compare( $this->github_response['tag_name'], $checked[ $this->basename ], 'gt' ); // Check if we're out of date
                }

                if ( $out_of_date ) {

                    $new_files = $this->github_response['zipball_url']; // Get the ZIP

                    $slug = current( explode( '/', $this->basename ) ); // Create valid slug

                    $plugin = array( // setup our plugin info
                        'url'         => $this->plugin_data['PluginURI'],
                        'slug'        => $slug,
                        'package'     => $new_files,
                        'new_version' => $this->github_response['tag_name'],
                    );

                    $transient->response[ $this->basename ] = (object) $plugin; // Return it in response
                }
            }
        }

        return $transient; // Return filtered transient
    }

    public function plugin_popup( $result, $action, $args ) {

        if ( !empty( $args->slug ) ) { // If there is a slug

            if ( $args->slug === current( explode( '/', $this->basename ) ) ) { // And it's our slug

                $this->get_repository_info(); // Get our repo info

                // Set it to an array
                $plugin = array(
                    'name'              => $this->plugin_data['Name'],
                    'slug'              => $this->basename,
                    'requires'          => '5.2',
                    'tested'            => '6.2',
                    'rating'            => '',
                    'num_ratings'       => '',
                    'downloaded'        => '999',
                    'added'             => '2021-03-22',
                    'version'           => $this->github_response['tag_name'],
                    'author'            => $this->plugin_data['AuthorName'],
                    'author_profile'    => $this->plugin_data['AuthorURI'],
                    'last_updated'      => $this->github_response['published_at'],
                    'homepage'          => $this->plugin_data['PluginURI'],
                    'short_description' => $this->plugin_data['Description'],
                    'sections'          => array(
                        'Description' => $this->plugin_data['Description'],
                        'Updates'     => $this->github_response['body'],
                    ),
                    'download_link'     => $this->github_response['zipball_url'],
                );

                return (object) $plugin; // Return the data
            }
        }
        return $result; // Otherwise return default
    }

    public function download_package( $args, $url ) {

        if ( null !== $args['filename'] ) {
            if ( $this->options['gh_auth'] ) {
                $args = array_merge( $args, array( 'headers' => array( 'Authorization' => "token {$this->options['gh_auth']}" ) ) );
            }
        }

        remove_filter( 'http_request_args', array( $this, 'download_package' ) );

        return $args;
    }

    public function after_install( $response, $hook_extra, $result ) {
        global $wp_filesystem; // Get global FS object

        $install_directory = ESG_PLUGIN_PATH; // Our plugin directory
        $wp_filesystem->move( $result['destination'], $install_directory ); // Move files to the plugin dir
        $result['destination'] = $install_directory; // Set the destination for the rest of the stack

        if ( $this->active ) { // If it was active
            activate_plugin( $this->basename ); // Reactivate
        }

        return $result;
    }
}

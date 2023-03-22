<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf6f7a9d52a7604a6abfa4aa3f42c5988
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Includes\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Includes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf6f7a9d52a7604a6abfa4aa3f42c5988::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf6f7a9d52a7604a6abfa4aa3f42c5988::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf6f7a9d52a7604a6abfa4aa3f42c5988::$classMap;

        }, null, ClassLoader::class);
    }
}

<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit080db2abbc364c70e011f58202296a96
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Digi\\Keha\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Digi\\Keha\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit080db2abbc364c70e011f58202296a96::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit080db2abbc364c70e011f58202296a96::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit080db2abbc364c70e011f58202296a96::$classMap;

        }, null, ClassLoader::class);
    }
}

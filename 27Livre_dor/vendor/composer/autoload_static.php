<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7cb160e7db2d023cf9f5fe18e5a34716
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Parsedown' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7cb160e7db2d023cf9f5fe18e5a34716::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7cb160e7db2d023cf9f5fe18e5a34716::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit7cb160e7db2d023cf9f5fe18e5a34716::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}

<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit18993e960df0636fef8f7ca484fc82ed
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
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit18993e960df0636fef8f7ca484fc82ed::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit18993e960df0636fef8f7ca484fc82ed::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit18993e960df0636fef8f7ca484fc82ed::$classMap;

        }, null, ClassLoader::class);
    }
}

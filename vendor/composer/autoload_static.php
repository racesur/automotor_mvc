<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6634eab846d148669d56e403373d4e31
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Raul\\AutomotorMvc\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Raul\\AutomotorMvc\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit6634eab846d148669d56e403373d4e31::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6634eab846d148669d56e403373d4e31::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6634eab846d148669d56e403373d4e31::$classMap;

        }, null, ClassLoader::class);
    }
}

<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc2b818a400d38d76d4e2c8f53681036a
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc2b818a400d38d76d4e2c8f53681036a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc2b818a400d38d76d4e2c8f53681036a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc2b818a400d38d76d4e2c8f53681036a::$classMap;

        }, null, ClassLoader::class);
    }
}

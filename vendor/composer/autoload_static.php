<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5675f4647568a0046b3550f8063dc3fa
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit5675f4647568a0046b3550f8063dc3fa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5675f4647568a0046b3550f8063dc3fa::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5675f4647568a0046b3550f8063dc3fa::$classMap;

        }, null, ClassLoader::class);
    }
}
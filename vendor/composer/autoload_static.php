<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteb2241b0d9034161f858cf58c6b27c8f
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Khipu\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Khipu\\' => 
        array (
            0 => __DIR__ . '/..' . '/khipu/khipu-api-client/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteb2241b0d9034161f858cf58c6b27c8f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteb2241b0d9034161f858cf58c6b27c8f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8dc39d0acd1be91795fca451d6cfca6f
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Webtechnologies\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Webtechnologies\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/Webtechnologies',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Webtechnologies\\Config\\App' => __DIR__ . '/../..' . '/app/Webtechnologies/Config/App.php',
        'Webtechnologies\\Controllers\\AccountController' => __DIR__ . '/../..' . '/app/Webtechnologies/Controllers/AccountController.php',
        'Webtechnologies\\Controllers\\UserController' => __DIR__ . '/../..' . '/app/Webtechnologies/Controllers/UserController.php',
        'Webtechnologies\\Models\\Account' => __DIR__ . '/../..' . '/app/Webtechnologies/Models/Account.php',
        'Webtechnologies\\Models\\User' => __DIR__ . '/../..' . '/app/Webtechnologies/Models/User.php',
        'Webtechnologies\\Views\\AccountTemplate' => __DIR__ . '/../..' . '/app/Webtechnologies/Views/AccountTemplate.php',
        'Webtechnologies\\Views\\UserTemplate' => __DIR__ . '/../..' . '/app/Webtechnologies/Views/UserTemplate.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8dc39d0acd1be91795fca451d6cfca6f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8dc39d0acd1be91795fca451d6cfca6f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8dc39d0acd1be91795fca451d6cfca6f::$classMap;

        }, null, ClassLoader::class);
    }
}

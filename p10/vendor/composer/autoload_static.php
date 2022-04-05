<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdda5b9ed14c7960224f35b93d1fa9802
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Kaiser\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Kaiser\\' => 
        array (
            0 => __DIR__ . '/../..' . '/backend/api/Kaiser',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Kaiser\\Create\\Create' => __DIR__ . '/../..' . '/backend/api/Kaiser/Create/Create.php',
        'Kaiser\\DataBase' => __DIR__ . '/../..' . '/backend/api/Kaiser/DataBase.php',
        'Kaiser\\Delete\\Delete' => __DIR__ . '/../..' . '/backend/api/Kaiser/Delete/Delete.php',
        'Kaiser\\Read\\Read' => __DIR__ . '/../..' . '/backend/api/Kaiser/Read/Read.php',
        'Kaiser\\Update\\Update' => __DIR__ . '/../..' . '/backend/api/Kaiser/Update/Update.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdda5b9ed14c7960224f35b93d1fa9802::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdda5b9ed14c7960224f35b93d1fa9802::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdda5b9ed14c7960224f35b93d1fa9802::$classMap;

        }, null, ClassLoader::class);
    }
}
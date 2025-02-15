<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd751713988987e9331980363e24189ce
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Model\\' => 6,
        ),
        'C' => 
        array (
            'Controller\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/model',
        ),
        'Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/controller',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Controller\\ProjetosController' => __DIR__ . '/../..' . '/src/controller/ProjetosController.php',
        'Controller\\TarefasController' => __DIR__ . '/../..' . '/src/controller/TarefasController.php',
        'Controller\\UsuarioController' => __DIR__ . '/../..' . '/src/controller/UsuarioController.php',
        'Model\\ConexaoMysql' => __DIR__ . '/../..' . '/src/model/ConexaoMysql.php',
        'Model\\ProjetosModel' => __DIR__ . '/../..' . '/src/model/ProjetosModel.php',
        'Model\\TarefasModel' => __DIR__ . '/../..' . '/src/model/TarefasModel.php',
        'Model\\UsuarioModel' => __DIR__ . '/../..' . '/src/model/UsuarioModel.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd751713988987e9331980363e24189ce::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd751713988987e9331980363e24189ce::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd751713988987e9331980363e24189ce::$classMap;

        }, null, ClassLoader::class);
    }
}

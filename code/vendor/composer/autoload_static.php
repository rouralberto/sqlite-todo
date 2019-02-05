<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0b38dda1d96aceff6bb117e149cf5a2c
{
    public static $classMap = array (
        'Categories' => __DIR__ . '/../..' . '/app/controllers/categories.php',
        'Common' => __DIR__ . '/../..' . '/app/controllers/common.php',
        'Dashboard' => __DIR__ . '/../..' . '/app/controllers/dashboard.php',
        'IdiormMethodMissingException' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormResultSet' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormString' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormStringException' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'ORM' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'Settings' => __DIR__ . '/../..' . '/app/controllers/settings.php',
        'Todos' => __DIR__ . '/../..' . '/app/controllers/todos.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit0b38dda1d96aceff6bb117e149cf5a2c::$classMap;

        }, null, ClassLoader::class);
    }
}
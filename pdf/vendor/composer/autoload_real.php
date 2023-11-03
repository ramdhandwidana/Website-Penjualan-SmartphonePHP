<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd7d6db8a2ab6cd85b52d1c6d1582ab0f
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitd7d6db8a2ab6cd85b52d1c6d1582ab0f', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd7d6db8a2ab6cd85b52d1c6d1582ab0f', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd7d6db8a2ab6cd85b52d1c6d1582ab0f::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
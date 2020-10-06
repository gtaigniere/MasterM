<?php

namespace Config;

require_once 'config.php';

class Autoloader {

    static function register() {
        spl_autoload_register(array(__class__, 'autoload'));
    }

    static function autoload($class_name) {
        $chunks = explode('\\', $class_name);
        $fileName = array_pop($chunks) . '.php';
        for ($i = 0; $i < count($chunks); $i++) {
            $chunks[$i] = strtolower($chunks[$i]);
        }
        require ROOT_DIR . join(DIRECTORY_SEPARATOR, $chunks) . DIRECTORY_SEPARATOR . $fileName;
    }

}

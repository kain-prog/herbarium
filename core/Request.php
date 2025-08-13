<?php
namespace core;

use src\Config;

class Request {

    public static function getUrl() {
        $uri = $_SERVER['REQUEST_URI'];
        
        $uri = explode('?', $uri)[0];

        $baseDir = rtrim(Config::$BASE_DIR, '/');
        if (!empty($baseDir) && str_starts_with($uri, $baseDir)) {
            $uri = substr($uri, strlen($baseDir));
        }

        return '/' . trim($uri, '/');
    }

    public static function getAll()
    {
        return !empty($_GET) ? $_GET : null;
    }

    public static function get($key = null)
    {
        if (is_null($key)) {
            return !empty($_GET) ? $_GET : null;
        }
        
        return !empty($_GET[$key]) ? $_GET[$key] : null;
    }

    public static function getMethod() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

}
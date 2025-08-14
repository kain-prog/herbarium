<?php

namespace src;

setlocale(LC_TIME, 'pt_BR.UTF-8', 'pt_BR', 'Portuguese_Brazil.1252');
date_default_timezone_set('America/Sao_Paulo');

class Config
{
    public static string $BASE_DIR = '';
    public static string $DB_DRIVER = '';
    public static string $DB_HOST = '';
    public static string $DB_DATABASE = '';
    public static string $DB_USER = '';
    public static string $DB_PASS = '';
    public static string $ERROR_CONTROLLER = '';
    public static string $DEFAULT_ACTION = '';

    public static function load(): void
    {
        self::$BASE_DIR = getenv('BASE_DIR');
        self::$DB_DRIVER = getenv('DB_DRIVER');
        self::$DB_HOST = getenv('DB_HOST');
        self::$DB_DATABASE = getenv('DB_DATABASE');
        self::$DB_USER = getenv('DB_USER');
        self::$DB_PASS = getenv('DB_PASS');
        self::$ERROR_CONTROLLER = getenv('ERROR_CONTROLLER');
        self::$DEFAULT_ACTION = getenv('DEFAULT_ACTION');
    }
}

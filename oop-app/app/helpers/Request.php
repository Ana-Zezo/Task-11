<?php
namespace App\Helpers;

class Request
{
    public static function requestPost(): bool
    {
        return $_SERVER["REQUEST_METHOD"] === "POST";
    }
    public static function requestGet(): bool
    {
        return $_SERVER["REQUEST_METHOD"] === "GET";
    }
    public static function allData()
    {
        return $_REQUEST;
    }
    public static function has($key)
    {
        return isset($_REQUEST[$key]);
    }
    public static function get($key)
    {
        return self::has($key) ? $_REQUEST[$key] : null;
    }
}
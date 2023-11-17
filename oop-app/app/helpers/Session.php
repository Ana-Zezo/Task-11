<?php

namespace App\Helpers;

if (session_status() == PHP_SESSION_NONE)
    session_start();
class Session
{
    public static function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }
    public static function has(string $key)
    {
        return isset($_SESSION[$key]);
    }
    public static function get(string $key)
    {
        if (self::has($key))
            return $_SESSION[$key];
    }

    public static function flash(string $key)
    {
        $value = null;
        if (self::has($key)) {
            $value = self::get($key);
            self::delete($key);
        }
        return $value;
    }
    public static function delete(string $key)
    {
        if (self::has($key))
            unset($_SESSION[$key]);
    }
}
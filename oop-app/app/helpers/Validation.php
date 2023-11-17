<?php
namespace App\Helpers;

class Validation
{
    public static function sanitize(mixed $input)
    {
        return htmlentities(htmlspecialchars(stripcslashes(trim($input))));
    }

    public static function required(mixed $input)
    {
        return empty($input) ? true : false;
    }

    public static function emailVal(string $email)
    {
        return !filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function minVal(string $min, int $len)
    {
        return strlen($min) < $len;
    }

    public static function maxVal(string $min, int $len)
    {
        return strlen($min) > $len;
    }

    public static function unique(string $value, string $col, string $table, $except = null): bool
    {
        $db = new DB();
        $result = !isset($except)
            ? $db->query("SELECT `$col` FROM `$table` WHERE `$col` = '$value'")
            : $db->query("SELECT `$col` FROM `$table` WHERE `$col` = '$value' AND `id` != '$except'")
        ;
        /*
            Error Email Is Exist 
            1 Mean Email Exits
            0 Mean Email No Exits
        */
        return $result->num_rows > 0;
    }


}
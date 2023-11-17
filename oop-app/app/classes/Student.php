<?php

namespace App\Classes;

use App\Helpers\DB;

class Student
{
    public static function getAll()
    {
        $db = new DB();
        $result = $db->query("SELECT * FROM `students`");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public static function store($data)
    {
        $db = new DB();
        $db->query("INSERT INTO `students` (`name`,`email`,`phone`) VALUES
        (
            '{$data['name']}',
            '{$data['email']}',
            '{$data['phone']}'
        )");
        return true;
    }
    // public static function find($id): array
    // {
    //     $db = new DB();
    //     $result = $db->query("SELECT * FROM `students` WHERE `id`=$id");
    //     return $result->num_rows > 0 ? $result->fetch_array(MYSQLI_ASSOC) : null;
    // }
    public static function find($id): array
    {
        $db = new DB();
        $result = $db->query("SELECT * FROM `students` WHERE `id`=$id");

        if ($result->num_rows > 0) {
            return $result->fetch_array(MYSQLI_ASSOC);
        } else {
            // Return an empty array when no records are found
            return [];
        }
    }


    public static function update($id, $data)
    {
        $db = new DB();
        $result = $db->query("UPDATE `students` SET `name`= '{$data['name']}' , `email` = '{$data['email']}' , `phone` = '{$data['phone']}' WHERE `id`='$id'");
        return $result;
    }
    public static function delete($id)
    {
        $db = new DB();

        return $db->query("DELETE FROM `students` WHERE `id`=$id") ? true : null;
    }
}
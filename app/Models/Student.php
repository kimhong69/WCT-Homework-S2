<?php

namespace App\Models;

class Student{
    protected static $data = [
        'id' => 1,
        'name' => 'John Doe',
        'age' => 20,
        'grade' => 'A',
    ];

    public static function all()
    {
        return self::$data;
    }


    public static function find($id)
    {
        // Implementation to find a student by ID

    }
}
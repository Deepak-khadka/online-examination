<?php

namespace App\Foundation\Lib;

final class UserType
{

    public const STUDENT = 0;

    public const TEACHER = 1;

    public static $current = [

        self::STUDENT => 'Student',
        self::TEACHER => 'Teacher'

    ];

}

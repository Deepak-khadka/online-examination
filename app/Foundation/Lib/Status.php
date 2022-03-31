<?php

namespace App\Foundation\Lib;

final class Status
{

    public const ACTIVE = 0;

    public const INACTIVE = 1;

    public static $current = [

        self::ACTIVE => 'Active',
        self::INACTIVE => 'In-Active'

    ];
}

<?php

namespace App\Foundation\Lib;

final class QuestionType
{

    public const SUBJECTIVE = 0;

    public const OBJECTIVE = 1;

    public static $current = [

        self::SUBJECTIVE => 'Subjective',
        self::OBJECTIVE => 'Objective'

    ];
}

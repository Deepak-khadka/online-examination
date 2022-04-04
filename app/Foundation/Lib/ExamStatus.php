<?php

namespace App\Foundation\Lib;

final class ExamStatus
{
    /*
     * Exam Successfully Done
     * */
    public const COMPLETED = 0;

    /*
     * Exam is remaining to do
     * */
    public const UNCOMPLETED = 1;

    /*
     * Student found to be cheated
     * */
    public const NOT_ELIGIBLE = 2;

}

<?php

namespace App\Http\Controllers\Action;

use Copyleaks\Copyleaks;
use Illuminate\Support\Facades\Session;

class Plagiarism
{

    /**
     * @var Copyleaks
     */
    protected $plagiarism;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $product;

    public function __construct(Copyleaks $copyleaks)
    {
        $this->plagiarism = $copyleaks;
        $this->token = $this->plagiarism->login(env('PLAGIARISM_EMAIL'), env('PLAGIARISM_SECRET_KEY'))->accessToken;
        $this->product = 'education';
    }


    public function checkAnswer($answer = null)
    {
        dd($this->plagiarism->start($this->product, $this->token, 'this is a test from nepal'));
    }

}

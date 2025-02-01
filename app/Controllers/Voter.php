<?php

namespace App\Controllers;

class Voter extends BaseController{
    public function index(): string{
        return view('voter');
    }
}
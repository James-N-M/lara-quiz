<?php

namespace JamesNM\LaraQuiz\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('laraquizpackage::layout');
    }
}
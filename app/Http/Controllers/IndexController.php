<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    function __construct()
    {
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function index()
    {
        return view('index');
    }
}

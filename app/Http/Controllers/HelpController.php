<?php

namespace App\Http\Controllers;

class HelpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'logout']);
    }

    protected function index()
    {
        return view('dashboard.help.index');
    }
}

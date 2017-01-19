<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     */
    function __construct()
    {
        $this->middleware('guest');
    }
}

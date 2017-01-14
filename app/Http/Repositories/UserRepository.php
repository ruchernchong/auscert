<?php

namespace app\Http\Repositories;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getAuthenticatedUser()
    {
        return User::findOrfail(Auth::user()->id);
    }

    /**
     * @return string
     */
    public function getAuthenticatedUserName()
    {
        return Auth::user()->first_name . ' ' . Auth::user()->last_name;
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    protected $user;

    /**
     * AccountController constructor.
     * @param UserRepository $user
     */
    function __construct(UserRepository $user)
    {
        $this->middleware('auth');

        $this->user = $user;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Database\Eloquent\Collection|\Illuminate\View\View|static[]
     */
    protected function index()
    {
        $user = User::with(['userGroups' => function ($query)
        {
            $query->join('groups', 'groups.id', '=', 'user_groups.group_id');
        }
        ])->where('id', Auth::user()->id)->firstOrFail();

        return view('dashboard.account', compact('user'));
    }
}

<?php

namespace App\Http\Controllers;

use App\User;

class AccountController extends Controller
{
    /**
     * AccountController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Database\Eloquent\Collection|\Illuminate\View\View|static[]
     */
    protected function index()
    {
        $user = User::with(['userGroups' => function ($query) {
            $query->join('groups', 'groups.id', '=', 'user_groups.group_id');
        }])->findOrFail(auth()->id());

        return view('dashboard.account.index', compact('user'));
    }
}

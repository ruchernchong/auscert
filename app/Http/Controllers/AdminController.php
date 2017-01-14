<?php

namespace App\Http\Controllers;

use App\Course;
use App\Groups;
use App\User;

class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function index()
    {
        $users = User::with(['userGroups' => function ($query)
        {
            $query->join('groups', 'groups.id', '=', 'user_groups.group_id')->orderBy('organisation');
        }])->paginate(10);

        $courses = Course::orderBy('name', 'ASC')->get();
        $groups = Groups::with('userGroups')->orderBy('organisation')->get();

        return view('dashboard.admin', compact('courses', 'users', 'groups'));
    }
}

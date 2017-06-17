<?php

namespace App\Http\Controllers;

use App\User;
use App\UserCourses;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    protected function index()
    {
        $user = User::findOrFail(auth()->id());

        $userCourses = UserCourses::join('courses', 'courses.id', '=', 'user_courses.course_id')
            ->with('user')
            ->where('user_id', auth()->id())
            ->get();

        $completedUserCourses = UserCourses::join('courses', 'courses.id', '=', 'user_courses.course_id')
            ->with('user')
            ->where('status', '=', 'Completed')
            ->where('user_id', auth()->id())
            ->get();

        return view('dashboard.home', compact('user', 'userCourses', 'completedUserCourses'));
    }
}

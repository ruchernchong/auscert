<?php

namespace App\Http\Controllers;

use App\User;
use App\UserCourses;
use Illuminate\Support\Facades\Auth;

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
        //                Auth::loginUsingId(2);

        $user = User::findOrFail(Auth::user()->id);

        $userCourses = UserCourses::join('courses', 'courses.id', '=', 'user_courses.course_id')
            ->with('user')
            ->where('user_id', Auth::user()->id)
            ->get();

        $completedUserCourses = UserCourses::join('courses', 'courses.id', '=', 'user_courses.course_id')
            ->with('user')
            ->where('status', '=', 'Completed')
            ->where('user_id', Auth::user()->id)
            ->get();

        return view('dashboard.home', compact('user', 'userCourses', 'completedUserCourses'));
    }
}

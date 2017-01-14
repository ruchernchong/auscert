<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    protected $user;

    /**
     * CourseController constructor.
     * @param UserRepository $user
     */
    function __construct(UserRepository $user)
    {
        $this->middleware('admin');

        $this->user = $user;
    }

    /**
     *
     */
    protected function index()
    {

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function create()
    {
        return view('dashboard.admin.course.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'category' => 'required',
            'passPercentage' => 'required|numeric',
            'description' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $course = $this->createCourse($request);

        return redirect()->action('CourseController@show', ['id' => $course->id]);
    }

    /**
     * @param Request $request
     * @return Course
     */
    protected function createCourse(Request $request)
    {
        $course = new Course();
        $course->name = $request->name;
        $course->category = $request->category;
        $course->description = $request->description;
        $course->creator = $this->user->getAuthenticatedUserName();
        $course->passPercentage = $request->passPercentage;
        $course->version = 1;
        $course->save();

        return $course;
    }

    /**
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function destroy(Course $course)
    {
        $course->delete();

        return redirect()->action('AdminController@index');
    }
}

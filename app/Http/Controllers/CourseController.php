<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courses;
use App\Models\students;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function show($id)
    {
        $course = courses::where('id','=',$id)->get()->toArray();
        //
        $students = DB::select("SELECT * FROM `students_courses` AS `sc` JOIN `students` AS `s` ON `sc`.`student_id` = `s`.`id` WHERE `sc`.`course_id` = {$id}");
        $students = json_decode(json_encode($students),true);

        return view('coursescreen',compact('course','students'));
     }

    public function edit($id)
    {
        $course = courses::where('id','=',$id)->get()->first()->toArray();
        $students = DB::select("SELECT * FROM `students_courses` AS `sc` JOIN `students` AS `s` ON `sc`.`student_id` = `s`.`id` WHERE `sc`.`course_id` = {$id}");
        $students = json_decode(json_encode($students),true);

        return view('courseEdit',compact('course', 'students'));

    }

    public function update($id, Request $request)
    {
        $data = \Request::all();

        $course = courses::find($id);
        if(isset($data['name']))
            $course->name = $data['name'];
        if(isset($data['description']))
            $course->description = $data['description'];
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path("/upload"), $request->file('image')->getClientOriginalName());
            $course->image =$image;
        }

        $course->save();

        return redirect('/school');

    }

    public function destroy($id)
    {
        // delete
        $course = courses::destroy($id);
       // $course->destroy();

        // redirect
        return redirect('/school');
    }


    public function create(Request $request){
        $name = $request->input('name');
        $description = $request->input('description');
        $course = new courses;
        $course->name = $name;
        $course->description =$description;
        $course->save();
        return redirect('/school');
    }

    public function store(Request $request){
        $name = $request->input('name');
        $description = $request->input('description');
        $course = new courses;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path("/upload"), $request->file('image')->getClientOriginalName());
            $course->image =$image;
        }


        $course->name = $name;
        $course->description =$description;

        $course->save();
        return redirect('/school');
    }

}

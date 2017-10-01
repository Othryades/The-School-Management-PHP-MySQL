<?php

namespace App\Http\Controllers;
use App\Models\courses;
use App\Models\students_courses;
use Illuminate\Http\Request;
use App\Models\students;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class StudentController extends Controller
{

    public function __construct()
    {
       // $this->middleware('auth');
    }


    public function update($id,Request $request)
    {
        $data = \Request::all();

        $student = students::find($id);
        if(isset($data['name']))
            $student->name = $data['name'];
        if(isset($data['phone']))
            $student->phone = $data['phone'];
        if(isset($data['email']))
            $student->email = $data['email'];
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path("/upload"), $request->file('image')->getClientOriginalName());
            $student->image =$image;
        }

        $courses = Input::get('courses');
        if(isset($courses)){
            $student->courses = json_encode($courses);
        }else{
            $student->courses = '';
        }
        $student->save();

        $delete_courses = students_courses::where('student_id',$student->id)->delete();

        //DELETE FROM `students_courses` WHERE `student_id` = 30
        if(isset($courses)){
            foreach ($courses as $key => $value){
                $student_courses = new students_courses;
                $student_courses->student_id = $id;
                $student_courses->course_id = $value;
                $student_courses->save();
            }
        }
        $courses = courses::all();
        $students = students::all();
        //return redirect('/school');
        return view('school',compact('courses','students'));
    }


    public function destroy($id)
    {
        // delete
        $student = students::destroy($id);
        // $course->destroy();

        // redirect
        return redirect('/school');
    }


    public function index()
    {
        return view('home');
    }


    public function edit($id)
    {
        $student = students::where('id','=',$id)->get()->first()->toArray();
        //$user_courses = DB::select("SELECT* FROM `students_courses` as `sc` join `students` as `s` ON `s`.`id` = `sc`.`student_id` join `courses` as `c` on `sc`.`course_id` = `c`.`id` where `s`.id ={$id}");
        return view('studentedit',compact('student','user_courses'));

    }


    public function show($id)
    {
        $courses = DB::select("SELECT* FROM `students_courses` as `sc` join `students` as `s` ON `s`.`id` = `sc`.`student_id` join `courses` as `c` on `sc`.`course_id` = `c`.`id` where `s`.id ={$id}");

        $student = students::where('id','=',$id)->get()->toArray();
        $courses = json_decode(json_encode($courses),true);


        return view('studentscreen',compact('student','courses'));
     }


    public function create(Request $request){
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $courses = $request->input('courses');
        $student = new students;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path("/upload"), $request->file('image')->getClientOriginalName());
            $student->image =$image;
        }

            $student->name = $name;
            $student->phone =$phone;
            $student->email = $email;
            $student->courses = json_encode($courses);

            $student->save();
        if (isset($courses) && is_array($courses)) {
            foreach ($courses as $key => $value){
                $student_courses = new students_courses;
                $student_courses->student_id = $student->id;
                $student_courses->course_id = $value;
                $student_courses->save();
            }
        }


        return redirect('/school');
    }


}

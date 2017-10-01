<?php

use App\Models\students;

use Illuminate\Support\Facades\DB;
use App\User;

Route::get('/', function () { return view('auth/login'); });
use App\Models\courses;

Route::get('/school', function () {
   // $courses = DB::table('courses')->whereNull('deleted_at')->get();
    $courses = courses::all();
    $students = students::all();

    return view('school', compact('courses', 'students'));

});


Route::get('/manager', function () {

    //$users = DB::select("SELECT * FROM `users`");
    $users = User::all();

    $users = (array)json_decode(json_encode($users),true);
    return view('manager', compact('users'));

});

Route::get('/studentscreen', function () { return view('studentscreen');});

Route::get('/view_show/{id}','StudentController@show');

Route::get('/studentedit', function () {
    $courses = DB::table('courses')->get();

    return view('studentedit', compact('courses'));
});

Route::resource('/students', 'StudentController');
Route::post('/student_create','StudentController@create');



Route::get('/coursescreen', function () { return view('coursescreen');});

Route::resource('/courses', 'CourseController');
Route::post('/courses_create','CourseController@store');

Route::get('/courseEdit', function () { return view('courseEdit'); });

Route::post('/course_create','CourseController@create');



Route::resource('/users', 'AdminController');

Route::get('/AdminEdit', function () { return view('AdminEdit'); });

Route::post('/admin_create','AdminController@create');

Route::get('/admin_create', function () { return view('admin_create');});



Route::get('/students_courses', function () {

    $user = DB::select("SELECT * FROM `students_courses` as `sc` join `students` as `s` ON `s`.`id` = `sc`.`student_id` join `courses` as `c` on `sc`.`course_id` = `c`.`id`");

    return $user;
});

Auth::routes();

Route::get('/home', 'HomeController@index');



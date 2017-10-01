<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\admins;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
class AdminController extends Controller
{

    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function show($id)
    {

        $users = User::where('id','=',$id)->get()->toArray();

        //$users = DB::select("SELECT * FROM `users` AS `us` WHERE `us`.`id` = {$id}");


        return view('AdminEdit', compact('users'));
    }

    public function update($id, Request $request)
    {
        $data = \Request::all();

        $users = User::find($id);
        if(isset($data['name']))
            $users->name = $data['name'];
        if(isset($data['phone']))
            $users->phone = $data['phone'];
        if(isset($data['email']))
            $users->email = $data['email'];
        if(isset($data['role']))
            $users->role = $data['role
            '];
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path("/upload"), $request->file('image')->getClientOriginalName());
            $users->image =$image;
        }


        $users->save();
        $users = User::all();
        return view('manager',compact('users'));

    }

    public function destroy($id)
    {

        $admins = User::destroy($id);

        // redirect
        return redirect('/manager');
    }

    public function edit($id)
    {
        $users = User::where('id','=',$id)->get()->toArray();

        return view('AdminEdit',compact('users'));

    }


    public function index()
    {
        return view('home');
    }


    public function create(Request $request){
        // get the form data for the user
        $userFormData = \Request::all();
        // write the validation rules for your form

        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path("/upload"), $request->file('image')->getClientOriginalName());
            $userFormData['image']= $image;
        }

        $rules = [
            'email' => 'required|unique:users',
            'password' => 'required',
            'name' => 'required'
        ];
        // validate the user form data
        $validation = \Validator::make($userFormData, $rules);

        // if validation fails
        if($validation->fails())
        {
            dd('validation faild, please try again');
            // redirect back to the form
            return redirect()->back();
        }
        $userFormData['password'] = Hash::make($userFormData['password']);
        // if validation passes
        // save the user to the database
        $user = User::create($userFormData);

        return redirect('/manager');
    }

}

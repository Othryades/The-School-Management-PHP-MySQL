@extends('layouts.app')

@section('content')
    <div class="container"><h2>Welcome to School Management by Moris</h2></div>


    <div class="container">

        <form action="{{ url('/admin_create') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="create_form">

                <div class="head">
                    <h3 class="headCreateForm">Add New Administrator</h3>
                </div>

                <div class="btnPosition">
                    <button class="btnSaveCreateform" type="submit">Save</button></br></br>
                </div>

                <div class="formInput" >


                    <div class="form-group">
                        <label for="Name">Name:</label>
                        <input type="text" class="form-control input-sm" id="" name="Name">
                    </div>
                    <div class="form-group">
                        <label for="phone">phone:</label>
                        <input type="tel" class="form-control input-sm" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password"  class="form-control input-sm" id="pwd" name="password">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control input-sm" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="Role">Role:</label>
                        <select name="role">
                            <option value="" disabled selected>Select role</option>
                            <option value="Manager">Manager</option>
                            <option value="Sales">Sales</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Image">Image:</label>
                        <input type="file" class="i_file" value="Upload Image" name="image">
                        <img src="" class="image_position show_image"  height="80" alt="Image preview..." style="display: none;">
                    </div>

                </div>

            </div>

        </form>
    </div>















































@stop



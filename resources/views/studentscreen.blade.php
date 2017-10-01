@extends('layouts.app')

@section('content')
    <div class="container">
            <h2>Student screen</h2></br>



            <div class="screenDetails">
                <div class="head">

                    <span class="nameTitle">{{ $student[0]['name'] }}</span><br>
                    {{ $student[0]['phone'] }}<br>
                    {{ $student[0]['email'] }}
                    <a class="editButton" href="{{ url('/students/'. $student[0]['id'].'/edit') }}"><button class="editStudentBtn">Edit</button></a>
                    <hr class="line" style="size:5px">
                </div>

                <div style="position: relative; margin: 5px">
                    @if($student[0]['image'] == true)
                        <img src="{{ asset('upload/' . $student[0]['image'] )}}" width="75" height="75" />
                    @endif
                </div>
                <br/>

                @if(count($courses) > 0)
                    <h5>following course:</h5>
                <ul>
                    @foreach($courses as $course)
                        <li>{{$course['name']}}</li>

                    @endforeach
                </ul>
                    @else
                    doesn't follow any course
                @endif
            </div>


        </div>
@stop


@extends('layouts.app')

@section('content')
    <div class="container">
            <h2>Course screen</h2></br>

            <div class="screenDetails">

                <div class="head">
                    <span id="cousreTitle">{{ $course[0]['name'] }}</span>
                    @if(\Auth::user()->role == 'owner' | \Auth::user()->role == 'Manager' )
                        <a href="{{ url('/courses/'. $course[0]['id'].'/edit') }}"><button class="editCourseBtn">Edit</button></a>
                    @endif
                    <hr class="line" style="size:5px">
                </div>

                <div style="position: relative; margin: 5px">
                    @if($course[0]['image'] == true)
                     <img src="{{ asset('upload/' . $course[0]['image'] )}}" width="65" height="65" />
                    @endif
                </div>

                <div>
                    <span class="nameTitle">{{ $course[0]['name'] }} </span>, {{ count($students)}} Student</br>
                    <p>
                    {{ $course[0]['description'] }}
                    </p>
                </div>

                <h4>Student registered :</h4>

                <div class="scrollStudentEnrolled">
                    <ul>
                        @foreach($students as $student)
                            <li><a href="{{ url('students/'.$student['id']) }}">{{ $student['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
@stop


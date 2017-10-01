@extends('layouts.app')

@section('content')
    <div class="container">

        @if(\Auth::check())

            <div id="listContainer">

                <div class="col"><span onclick=" $('.add_form2').fadeIn();  $('.add_form').css('display','none'); $('.main-container').css('display','none');"> @if(\Auth::user()->role == 'owner' | \Auth::user()->role == 'Manager' )Courses <button >+</button>@endif</span>

                    @foreach($courses as $course)
                        <div class="fontList course_hide">
                            <a href="{{ url('courses/'.$course->id) }}">{{ $course->name }}</a>
                        </div>
                    @endforeach
                </div>


                <div class="col"><span onclick=" $('.add_form').fadeIn(); $('.add_form2').css('display','none'); $('.main-container').css('display','none');">Students <button >+</button></span>

                    @foreach($students as $student)
                        <div  class="fontList student_hide"><a href="{{ url('students/'.$student->id) }}"> {{ $student->name }}</a></div>
                    @endforeach
                </div>

            </div>



            <div class="add_form2" style="display:none; ">
                @include('course_create_partial')
            </div>

            <div class="add_form" style="display:none; ">
                @include('student_createPartial')

            </div>


            <div class="main-container">
                <h3 class="fontCenter">School management</h3>
            </div>


    </div>

    @else
        no access
    @endif

@endsection

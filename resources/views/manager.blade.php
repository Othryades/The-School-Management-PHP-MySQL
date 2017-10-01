@extends('layouts.app')

@section('content')

    <div class="container">

        @if(\Auth::check() && \Auth::user()->role == 'owner' | \Auth::user()->role == 'Manager' )


            <div class="colAdmin" id="adminList">


                <span onclick="$('.add_form').fadeIn(); $('.main-container').css('display','none') ">Administrator <button >+</button></span>


                @foreach($users as $user)

                    <div class="fontList admin_hide"  admin-id="{{ $user['id'] }}">
                        @if($user['image'] == true)
                            <img src="{{ asset('upload/' . $user['image'] )}}" width="20" height="20" />
                        @endif

                        <a href="{{ url('users/'.$user['id']) }}">{{ $user['name'] }}, role: {{ $user['role'] }}</a><br>
                    </div>

                @endforeach

            </div>




            <div class="add_form" style="display:none;">
                @include('admin_createPartial')
            </div>



            <div class="admins">
                @foreach($users as $user)

                    <div style="display:none;" class="admin admin-{{ $user['id']}}">
                        <?php
                        $user = [$user];
                        ?>
                        @include('AdminEditPartial')
                    </div>
                @endforeach
            </div>






            <div  class="main-container">
                <h3 class="fontCenter">Admins management</h3>
            </div>

    </div>


    @else
        no access
    @endif

@stop


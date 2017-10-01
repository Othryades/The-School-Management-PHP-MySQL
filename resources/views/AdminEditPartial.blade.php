
@if((\Auth::user()->role == 'Manager'  && $users[0]['role'] != 'owner')  ||  \Auth::user()->role == 'owner' )
<div class="container">


    <form action="{{ url('/users') }}/{{ $users[0]['id'] }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="put"/>
        {{ csrf_field() }}


        <div class="create_form">
            <div class="head">
                Add Administrator / Edit Admin Name
                <hr class="line" style="size:5px">
            </div>
            <button class="btnSaveEditForm" type="submit">Save</button></br></br>

            <div class="form" style="width: 50%; margin: 0 auto">
                Name <input id="nadmeAdmin" type="text" name="name" value="@if(isset($users[0]['name'])) {{ $users[0]['name'] }} @endif"><br><br>
                Phone <input id="phone" type="text" name="phone" value="@if(isset($users[0]['phone'])) {{ $users[0]['phone'] }} @endif"><br><br>
                Email <input id="email" type="text" name="email" value="@if(isset($users[0]['email'])) {{ $users[0]['email'] }} @endif"><br><br>
                @if(\Auth::user()->role == 'owner' || \Auth::user()->id != $users[0]['id'] )
                Role <select name="role" value="@if(isset($users[0]['role'])) {{ $users[0]['role'] }} @endif">
                    <option value="" disabled selected>Select role</option>
                    <option value="Manager">Manager</option>
                    <option value="Sales">Sales</option>
                </select><br><br>
                @endif
                Image <input type="file" value="Upload Image" name="image"></br></br>
            </div>

        </div>

    </form>
    @if(\Auth::user()->id != $users[0]['id'] )
        <form action="{{ url('/users') }}/{{ $users[0]['id'] }}" method="post">
            <input type="hidden" name="_method" value="DELETE"/>
            {{ csrf_field() }}

            <button class="button_delete_Admin" type="submit" style="float:right; margin:2px">Delete</button>
        </form>
    @endif






</div>
@else
<h1>You do not have permissions for this action</h1>
@endif
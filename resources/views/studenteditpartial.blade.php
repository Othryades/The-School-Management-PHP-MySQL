    <div class="container">

        <form action="{{ url('/students') }}/{{ $student['id'] }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put"/>
            {{ csrf_field() }}

            <h2>Edit/Delete Student</h2></br>

            <div class="contEditCourse_Student">

                <div class="head">
                    <h4>{{ $student['name'] }}</h4>
                    <hr class="line" style="size:5px">
                </div>

                <button class="btnSaveEditForm" type="submit">Save</button></br></br>

                <div class="form" >

                    Name <input id="nameStudent" name="name" type="text" value="@if(isset($student['name'])) {{ $student['name'] }} @endif"><br><br>
                    Phone <input id="phone" name="phone" type="text" pattern="[0-9]+" title="Numbers Only" value="@if(isset($student['phone'])) {{ $student['phone'] }} @endif"><br><br>
                    Email <input id="email" name="email" type="text"  value="@if(isset($student['email'])) {{ $student['email'] }} @endif"><br><br>

                    <div class="imageStudentEditForm">Image <input type="file" value="Upload Image" name="image"></div><br/>

                    <div class="scroll_edit">
                        Courses :
                        @inject('courses','App\Models\courses')
                        <?php $courses = $courses::all(); ?>
                        <?php $user_course = [];   ?>

                        <?php if(isset($student['courses'])){ $user_course = json_decode($student['courses']); }  ?>

                        @foreach($courses as $key => $value)
                            @if(is_array($user_course))
                            <div style="display: inline-block"><input name="courses[]" type="checkbox" @if(in_array($value['id'],$user_course)) checked="true" @endif
                                                    value="{{ $value['id'] }}"> {{ $value['name'] }}</div>
                            @else
                                <div style="display: inline-block"><input name="courses[]" type="checkbox" value="{{ $value['id'] }}"> {{ $value['name'] }}</div>
                            @endif
                        @endforeach
                    </div>

                </div>

            </div>

        </form>

        <form action="{{ url('/students') }}/{{ $student['id'] }}" method="post">
            <input type="hidden" name="_method" value="DELETE"/>
            {{ csrf_field() }}

            <button class="button_delete_student">Delete</button>

        </form>



    </div>
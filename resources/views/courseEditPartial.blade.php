<div class="container">

         <form action="{{ url('/courses') }}/{{ $course['id'] }}" method="post" enctype="multipart/form-data">
             <input type="hidden" name="_method" value="put"/>
             {{ csrf_field() }}

             <h2>Edit/Delete course</h2></br>

             <div class="contEditCourse_Student">

                <div class="head">
                    <h4>{{ $course['name'] }}</h4>
                    <hr class="line" style="size:5px">
                </div>

                <button class="btnSaveEditForm" type="submit">Save</button></br></br>

                <div class="formInputEdit">
                    Name <input id="name" name="name" type="text" value="@if(isset($course['name'])) {{ $course['name'] }} @endif"><br><br>
                    Description <textarea name="description" rows="4" cols="25">@if(isset($course['description'])) {{ $course['description'] }} @endif
                                </textarea><br/><br/>
                    Image <div class="imageCourseEdit"><input type="file" value="Upload Image" name="image"></div><br/>
                </div>
                 <br/>

                <span>TOTAL :{{ count($students)}} students taking this course</span>

            </div>

         </form>



         <form action="{{ url('/courses') }}/{{ $course['id'] }}" method="post">
            <input type="hidden" name="_method" value="DELETE"/>
            {{ csrf_field() }}

            @if(!count($students) > 0)
                <button class="button_delete_course" type="submit">Delete</button>
            @endif

         </form>

</div>

    <div class="container">

        <form action="{{ url('/student_create') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="create_form">

                <div class="head">
                   <h3 class="headCreateForm">Add New Student</h3>
                </div>

                <div class="btnPosition">
                    <button class="btnSaveCreateform" type="submit">Save</button></br></br>
                </div>

                <div class="formInput">
                    Name <input id="nameStudent" name="name" type="text" required><br><br>
                    Phone <input id="phone" name="phone" type="text" required><br><br>
                    Email <input id="email" name="email" type="text" required><br><br>
                    Image <div class="imageStudentForm">
                        <input type="file" class="i_file" value="Upload Image" name="image">
                        <img src="" class="image_position show_image" height="80" alt="Image preview..." style="display: none;">
                    </div>
                     <div class="courseOptionForm">
                         Courses :
                        <div class="scroll">
                            @inject('courses','App\Models\courses')
                            <?php $courses = $courses::all(); ?>

                            @foreach($courses as $key => $value)
                                <div style="display: inline-block"><input name="courses[]" type="checkbox" value="{{ $value['id'] }}"> {{ $value['name'] }}</div>
                            @endforeach

                        </div>
                     </div>
                </div>

            </div>

        </form>

    </div>

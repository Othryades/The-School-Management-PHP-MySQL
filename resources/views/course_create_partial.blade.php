<div class="container">

    <form action="{{ url('/courses_create') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="create_form">

            <div class="head">
                <h3 class="headCreateForm">Add New Course</h3>
            </div>

            <div class="btnPosition">

                <button class="btnSaveCreateform" type="submit">Save</button></br></br><br/>
            </div>

            <div class="formInput">

                Name <input id="nameCourseForm" name="name" type="text"><br><br>
                Description <textarea id="textareaCourseForm" name="description" rows="4" cols="25"></textarea><br><br>
                Image <div class="imageCourseForm">
                        <input type="file" class="i_file" value="Upload Image" name="image">
                        <img src="" class="image_position show_image"  height="80" alt="Image preview..." style="display: none;">
                     </div>
            </div>

        </div>

    </form>

</div>

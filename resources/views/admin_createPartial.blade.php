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

                Name <input id="" type="text" name="name"><br><br>
                Phone <input id="phone" type="text" name="phone"><br><br>
                Password <input id="password" type="text" name="password"><br><br>
                Email <input id="email" type="text" name="email"><br><br>
                Role <select name="role">
                    <option value="" disabled selected>Select role</option>
                    <option value="Manager">Manager</option>
                    <option value="Sales">Sales</option>
                </select><br><br>
                Image <div class="imageAdminForm">
                    <input type="file" class="i_file" value="Upload Image" name="image">
                    <img src="" class="image_position show_image"  height="80" alt="Image preview..." style="display: none;">
                </div>

            </div>

        </div>

    </form>



</div>


jQuery(function(){

   $('.student_hide').on('click',function(){
       var student_id = $(this).attr('student-id');

        $('.student').css('display','none');
        $('.course').css('display','none');
         $('.student-'+student_id).toggle();
   });

   $('.course_hide').on('click', function () {
       var course_id = $(this).attr('course-id');
       $('.course').css('display','none');
       $('.student').css('display','none');

       $('.course-'+course_id).toggle();

   });

    $('.i_file').change( function(event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        $(".show_image").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));

        $("#disp_tmp_path").html("Temporary Path(Copy it and try pasting it in browser address bar) --> <strong>["+tmppath+"]</strong>");
    });



});
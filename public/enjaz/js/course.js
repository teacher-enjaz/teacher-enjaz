$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('body').on('click', '.create-btn', function (e)
    {
        e.preventDefault();
        $('#nameError').text('');
        $('#organizationError').text('');
        $('#hoursError').text('');
        $('#dateError').text('');
    });
    /************************** store Experience **********************/
    $('#courseForm').ajaxForm({
        success:function(response)
        {
            if(response)
            {
                Swal.fire({
                    title: 'تمت الإضافة بنجاح',
                    text: "",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonText: "موافق",
                    confirmButtonColor: "#109f99",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#add-course-eModal').hide();
                        $('#add-course-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#nameError').text('');
            $('#organizationError').text('');
            $('#hoursError').text('');
            $('#dateError').text('');
            $('#nameError').text(response.responseJSON.errors.name);
            $('#organizationError').text(response.responseJSON.errors.training_center);
            $('#hoursError').text(response.responseJSON.errors.hours);
            $('#dateError').text(response.responseJSON.errors.end_date);
        }
    });
    /************************** Update Experience **********************/
    $('body').on('click', '.edit-btn', function (e)
    {
        e.preventDefault();
        var course_id = $(this).data('id');
        var action = 'courses/update/'+course_id;
        $('#editCourseForm').attr('action',action);
        $.get('courses/edit/' + course_id , function (data)
        {
            $('#name').val(data.name);
            $('#training_center').val(data.training_center);
            $('#hours').val(data.hours);
            $('#end_date').val(data.end_date);
        })
    });

    $('#editCourseForm').ajaxForm({
        success:function(response)
        {
            if(response)
            {
                Swal.fire({
                    title: 'تم التعديل بنجاح',
                    text: "",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonText: "موافق",
                    confirmButtonColor: "#109f99",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#edit-course-eModal').hide();
                        $('#edit-course-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#editNameError').text('');
            $('#editOrganizationError').text('');
            $('#editHoursError').text('');
            $('#editDateError').text('');
            $('#editNameError').text(response.responseJSON.errors.name);
            $('#editOrganizationError').text(response.responseJSON.errors.training_center);
            $('#editHoursError').text(response.responseJSON.errors.hours);
            $('#editDateError').text(response.responseJSON.errors.end_date);
        }
    });
    /************************* chasnge status *******************************/
    $('.course-status').change(function() {
        var status = $(this).prop('checked') === true ? 1 : 0;
        var course_id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "application/json",
            url: 'courses/status/'+status+'/'+course_id,
            success: function(data){
                console.log(data.success)
            }
        });
    });
});

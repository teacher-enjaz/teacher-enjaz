$(document).ready(function(){
    /************************** store Experience **********************/
    $('#experienceForm').ajaxForm({
        success:function(response)
        {
            if(response)
            {
                swal({
                    title: "تمت الإضافة بنجاح",
                    text: "",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonText: "موافق",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        $('#add-experience-eModal').hide();
                        $('#add-experience-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#experienceError').text('');
            $('#organizationError').text('');
            $('#fromError').text('');
            $('#toError').text('');
            $('#experienceError').text(response.responseJSON.errors.name);
            $('#organizationError').text(response.responseJSON.errors.organization);
            $('#fromError').text(response.responseJSON.errors.from);
            $('#toError').text(response.responseJSON.errors.to);
        }
    });
    /************************** Update Experience **********************/
    $('#edit').click( function (e) {
        e.preventDefault();
        var experience_id = $(this).data('id');
        var action = 'experiences/update/'+experience_id;
        $('#editExperienceForm').attr('action',action);
        console.log(experience_id)
        $.get('experiences/edit/' + experience_id , function (data)
        {
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#organization').val(data.organization);
            $('#from').val(data.from);
            $('#to').val(data.to);

        })
    });

    $('#editExperienceForm').ajaxForm({
        success:function(response)
        {
            if(response)
            {
                swal({
                    title: "تم التعديل بنجاح",
                    text: "",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonText: "موافق",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        $('#edit-experience-eModal').hide();
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#experienceError').text('');
            $('#organizationError').text('');
            $('#fromError').text('');
            $('#toError').text('');
            $('#experienceError').text(response.responseJSON.errors.name);
            $('#organizationError').text(response.responseJSON.errors.organization);
            $('#fromError').text(response.responseJSON.errors.from);
            $('#toError').text(response.responseJSON.errors.to);
        }
    });
});

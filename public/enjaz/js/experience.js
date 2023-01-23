$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /************************** store Experience **********************/
    $('#experienceForm').ajaxForm({
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
    $('body').on('click', '.edit-btn', function (e)
    {
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
    /************************* chasnge status *******************************/
    $('.experience-status').change(function() {
        var status = $(this).prop('checked') === true ? 1 : 0;
        var experience_id = $(this).data('id');
        console.log(experience_id)
        $.ajax({
            type: "GET",
            dataType: "application/json",
            url: 'experiences/status/'+status+'/'+experience_id,
            success: function(data){
                console.log(data.success)
            }
        });
    });
});

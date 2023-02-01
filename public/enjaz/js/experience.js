$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('select[name="job_id"]').on('change',function (e) {
        if($(this).val() === '-1')
            $('#job_name').show();
        else
            $('#job_name').hide();
    })
    $('select[id="job_id"]').on('change',function (e) {
        if($(this).val() === '-1')
            $('#edit_job_name').show();
        else
            $('#edit_job_name').hide();
    })
    $('body').on('click', '.create-btn', function (e)
    {
        e.preventDefault();
        $('#editJobError').text('');
        $('#editJobNameError').text('');
        $('#editOrganizationError').text('');
        $('#editFromError').text('');
        $('#editToError').text('');
        $('#editNoteError').text('');
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
            $('#jobError').text('');
            $('#editJobNameError').text('');
            $('#organizationError').text('');
            $('#fromError').text('');
            $('#toError').text('');
            $('#noteError').text('');
            $('#nameError').text('');

            $('#jobError').text(response.responseJSON.errors.job_id);
            $('#editJobNameError').text(response.responseJSON.errors.name);
            $('#organizationError').text(response.responseJSON.errors.organization);
            $('#fromError').text(response.responseJSON.errors.from);
            $('#toError').text(response.responseJSON.errors.to);
            $('#noteError').text(response.responseJSON.errors.notes);
            $('#nameError').text(response.responseJSON.errors.name);
        }
    });
    /************************** Update Experience **********************/
    $('body').on('click', '.edit-btn', function (e)
    {
        e.preventDefault();
        var experience_id = $(this).data('id');
        var action = 'experiences/update/'+experience_id;
        $('#editExperienceForm').attr('action',action);
        $.get('experiences/edit/' + experience_id , function (data)
        {
            $('#id').val(data.id);
            $('#option'+data.job_id).attr('selected','selected');
            $('#organization').val(data.organization);
            $('#from').val(data.from);
            $('#to').val(data.to);
            $('#notes').val(data.notes);

            $('#editJobError').text('');
            $('#editOrganizationError').text('');
            $('#editFromError').text('');
            $('#editToError').text('');
            $('#editNoteError').text('');
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
            $('#editJobError').text('');
            $('#editJobNameError').text('');
            $('#editOrganizationError').text('');
            $('#editFromError').text('');
            $('#editToError').text('');
            $('#editNoteError').text('');

            $('#editJobError').text(response.responseJSON.errors.job_id);
            $('#editJobNameError').text(response.responseJSON.errors.name);
            $('#editOrganizationError').text(response.responseJSON.errors.organization);
            $('#editFromError').text(response.responseJSON.errors.from);
            $('#editToError').text(response.responseJSON.errors.to);
            $('#editNoteError').text(response.responseJSON.errors.notes);
        }
    });
    /************************* chasnge status *******************************/
    $('.experience-status').change(function() {
        var status = $(this).prop('checked') === true ? 1 : 0;
        var experience_id = $(this).data('id');
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

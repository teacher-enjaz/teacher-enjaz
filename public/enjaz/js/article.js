$(document).ready(function(){
    $('#summerNote').summernote();
    $('#edit-summernote').summernote();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('select[name="classification_id"]').on('change',function (e) {
        if($(this).val() === '-1')
            $('#classification_name').show();
        else
            $('#classification_name').hide();
    })
    /*$('select[id="job_id"]').on('change',function (e) {
        if($(this).val() === '-1')
            $('#edit_job_name').show();
        else
            $('#edit_job_name').hide();
    })*/
    $('body').on('click', '.create-btn', function (e)
    {
        e.preventDefault();
        $('#titleError').text('');
        $('#classificationIdError').text('');
        $('#nameError').text('');
        $('#detailsError').text('');
        $('#imageArticleError').text('');
    });
    /************************** store Experience **********************/
    $('#articleForm').ajaxForm({
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
                        $('#add-article-eModal').hide();
                        $('#add-article-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#titleError').text('');
            $('#classificationIdError').text('');
            $('#nameError').text('');
            $('#detailsError').text('');
            $('#imageArticleError').text('');

            $('#titleError').text(response.responseJSON.errors.title);
            $('#classificationIdError').text(response.responseJSON.errors.classification_id);
            $('#nameError').text(response.responseJSON.errors.name);
            $('#detailsError').text(response.responseJSON.errors.details);
            $('#imageArticleError').text(response.responseJSON.errors.image);
        }
    });
    /*/!************************** Update Experience **********************!/
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
    /!************************* chasnge status *******************************!/
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
    });*/
});

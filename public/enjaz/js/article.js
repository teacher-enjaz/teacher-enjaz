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
    $('select[name="classification_id"]').on('change',function (e) {
        if($(this).val() === '-1')
            $('#edit_classification_name').show();
        else
            $('#edit_classification_name').hide();
    })

    $('body').on('click', '.create-btn', function (e)
    {
        e.preventDefault();
        $('#titleError').text('');
        $('#classificationIdError').text('');
        $('#nameError').text('');
        $('#detailsError').text('');
        $('#imageArticleError').text('');
    });
    /************************** store article **********************/
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
    /************************** Update article **********************/
    $('body').on('click', '.edit-btn', function (e)
    {
        e.preventDefault();
        var content_id = $(this).data('id');
        var action = 'articles/update/'+content_id;
        $('#editArticleForm').attr('action',action);
        $.get('articles/edit/' + content_id , function (data)
        {
            $('#id').val(data.id);
            $('#title').val(data.title);
            $('#option'+data.classification_id).attr('selected','selected');
            $("#edit-summernote").summernote("code",data.article.details);

             if(data.allow_comments === 1 )
                 $('#allow_comments').attr('checked','checked')
             else
                 $('#allow_comments').removeAttr('checked')
            var image = document.getElementById('image-article');
            image.src = data.content_file[0].AttPath;
             $('#id').text('');
             $('#title').text('');
             $('#edit-summernote').text('');
        })
    });

    $('#editArticleForm').ajaxForm({
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
                        $('#edit-article-eModal').hide();
                        $('#edit-article-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#editTitleError').text('');
            $('#editClassificationIdError').text('');
            $('#editNameError').text('');
            $('#editDetailsError').text('');
            $('#editImageArticleError').text('');

            $('#editTitleError').text(response.responseJSON.errors.title);
            $('#editClassificationIdError').text(response.responseJSON.errors.classification_id);
            $('#editNameError').text(response.responseJSON.errors.name);
            $('#editDetailsError').text(response.responseJSON.errors.details);
            $('#editImageArticleError').text(response.responseJSON.errors.image);
        }
    });
    /************************* change status *******************************/

    $('.user-article-status').change(function() {
        var status = $(this).prop('checked') === true ? 'مسودة' : 'منشور';
        var content_id = $(this).data('id');
        const element = document.querySelector("#status-tag"+content_id);

        if(status === 'منشور'){
            element.style.background = "#ffc107";
            element.style.color = "rgb(70, 55, 55)";
            element.innerHTML = status;
        }
        if(status === 'مسودة'){
            element.style.background = "#ce3d4ee6";
            element.innerHTML = status;
        }

        $.ajax({
            type: "GET",
            dataType: "application/json",
            url: 'articles/status/'+status+'/'+content_id,
            success: function(data){
                console.log(data.success);


            }
        });
    });
});

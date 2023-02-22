$(document).ready(function(){
    $('#allow_comments').on('click',function () {
        var checkBox = document.getElementById('allow_comments');
        console.log(checkBox.checked);

        if(checkBox.checked === true)
        {
            $('#allow_comments').val("1")
            $('#allow_comments').attr('checked','checked')
        }
        else
        {
            $('#allow_comments').val("0")
            $('#allow_comments').removeAttr('checked')
        }
    })

    var imagesCounter=1;
    var filesCounter=1;
    var youtubeCounter=1;
    addImage();
    addFile();
    addYoutube();

    $('#add-image').on('click', addImage);
    $('#remove-image').on('click', removeImage);
    $('#add-file').on('click', addFile);
    $('#remove-file').on('click', removeFile);
    $('#add-youtube').on('click', addYoutube);
    $('#remove-youtube').on('click', removeYoutube);

    /**
     * add - remove images via script
     */
    function addImage()
    {
        var image = "<div class='col-6'> <input class='form-control my-1' type='file' name='new_image[]' id='new_image_" + imagesCounter + "'>" +
            "<div class='text-danger' id='imageError"+ (imagesCounter-1) + "'></div></div>"+
            "<div class='col-6'><input class='form-control mt-1' type='text' name='img_description[]' id='img-description-" + imagesCounter + "'>"+
            "<div class='text-danger' id='imageDescriptionError"+ (imagesCounter-1) + "'></div></div>";

        $('#images').append(image);
        imagesCounter ++;
    }
    function removeImage()
    {
        if (imagesCounter > 2)
        {
            imagesCounter --;
            $('#new_image_' + imagesCounter).remove();
            $('#img-description-' + imagesCounter).remove();
            $('#imageError' + (imagesCounter-1)).remove();
            $('#imageDescriptionError' + (imagesCounter-1)).remove();
        }
    }

    /**
     * add - remove files via script
     */
    function addFile()
    {
        var file = "<div class='col-6'> <input class='form-control my-1' type='file' name='new_file[]' id='new_file_" + filesCounter + "'>" +
            "<div class='text-danger' id='fileError"+ (filesCounter-1) + "'></div></div>"+
            "<div class='col-6'><input class='form-control mt-1' type='text' name='file_description[]' id='file-description-" + filesCounter + "'>"+
            "<div class='text-danger' id='fileDescriptionError"+ (filesCounter-1) + "'></div></div>";

        $('#files').append(file)
        filesCounter ++;
    }

    function removeFile()
    {
        if (filesCounter > 2)
        {
            filesCounter --;
            $('#new_file_' + filesCounter).remove();
            $('#file-description-' + filesCounter).remove();
            $('#fileError' + (filesCounter-1)).remove();
            $('#fileDescriptionError' + (filesCounter-1)).remove();
        }
    }

    function addYoutube()
    {
        var youtube = "<div class='col-6'> <input class='form-control my-1' type='text' name='new_youtube[]' id='new_youtube_" + youtubeCounter + "'>" +
            "<div class='text-danger' id='youtubeError"+ (youtubeCounter-1) + "'></div></div>"+
            "<div class='col-6'><input class='form-control mt-1' type='text' name='youtube_description[]' id='youtube-description-" + youtubeCounter + "'>"+
            "<div class='text-danger' id='youtubeDescriptionError"+ (youtubeCounter-1) + "'></div></div>";

        $('#youTubes').append(youtube)
        youtubeCounter ++;
    }

    function removeYoutube()
    {
        if (youtubeCounter > 2)
        {
            youtubeCounter --;
            $('#new_youtube_' + youtubeCounter).remove();
            $('#youtube-description-' + youtubeCounter).remove();
            $('#youtubeError' + (youtubeCounter-1)).remove();
            $('#youtubeDescriptionError' + (youtubeCounter-1)).remove();
        }
    }
    /***
     * ***************************************************************************************************************
     */
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
/*    $('select[name="classification_id"]').on('change',function (e) {
        if($(this).val() === '-1')
            $('#edit_classification_name').show();
        else
            $('#edit_classification_name').hide();
    })*/
    $('body').on('click', '.create-btn', function (e)
    {
        e.preventDefault();
        $('#achievementForm').find('input').val('');
        $('.text-danger').text('');
        console.log(imagesCounter +' ' +filesCounter + ' ' + youtubeCounter)
        for (let i=2; i<imagesCounter ; i++)
        {
            console.log('i = '+i)
            $('#new_image_' + i).remove();
            $('#img-description-' + i).remove();
        }

        for (let i=2; i<filesCounter ; i++)
        {
            $('#new_file_' + i).remove();
            $('#file-description-' + i).remove();
        }

        for (let i=2; i<youtubeCounter ; i++)
        {
            $('#new_youtube_' + i).remove();
            $('#youtube-description-' + i).remove();
        }
    });
    /************************** store article **********************/
    $('#achievementForm').ajaxForm({
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
                        $('#add-achievement-eModal').hide();
                        $('#add-achievement-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#titleError').text('');
            $('#classificationIdError').text('');
            $('#nameError').text('');
            $('#descriptionError').text('');
            $('#startDateError').text('');
            $('#endDateError').text('');

            for (var i=0; i<imagesCounter ; i++)
            {
                $('#imageError'+i).text('')
                $('#imageDescriptionError'+i).text('')
            }

            for (var i=0; i<filesCounter ; i++)
            {
                $('#fileError'+i).text('')
                $('#fileDescriptionError'+i).text('')
            }

            for (var i=0; i<youtubeCounter ; i++)
            {
                $('#youtubeError'+i).text('')
                $('#youtubeDescriptionError'+i).text('')
            }

            $('#titleError').text(response.responseJSON.errors.title);
            $('#classificationIdError').text(response.responseJSON.errors.classification_id);
            $('#nameError').text(response.responseJSON.errors.name);
            $('#descriptionError').text(response.responseJSON.errors.description);
            $('#startDateError').text(response.responseJSON.errors.start_date);
            $('#endDateError').text(response.responseJSON.errors.end_date);

            for (var i=0; i<imagesCounter ; i++)
            {
                console.log(imagesCounter);
                if(response.responseJSON.errors['new_image.'+i] != null)
                    $('#imageError'+i).text(response.responseJSON.errors['new_image.'+i])
                if(response.responseJSON.errors['img_description.'+i]!= null)
                    $('#imageDescriptionError'+i).text(response.responseJSON.errors['img_description.'+i])
            }

            for (var i=0; i<filesCounter ; i++)
            {
                if(response.responseJSON.errors['new_file.'+i] != null)
                    $('#fileError'+i).text(response.responseJSON.errors['new_file.'+i])
                if(response.responseJSON.errors['file_description.'+i]!= null)
                    $('#fileDescriptionError'+i).text(response.responseJSON.errors['file_description.'+i])
            }

            for (var i=0; i<youtubeCounter ; i++)
            {
                if(response.responseJSON.errors['new_youtube.'+i] != null)
                    $('#youtubeError'+i).text(response.responseJSON.errors['new_youtube.'+i])
                if(response.responseJSON.errors['youtube_description.'+i]!= null)
                    $('#youtubeDescriptionError'+i).text(response.responseJSON.errors['youtube_description.'+i])
            }
        }
    });
    /************************** Update article **********************/
    $('body').on('click', '.edit-btn', function (e)
    {
        e.preventDefault();
        var content_id = $(this).data('id');
        var action = 'achievements/update/'+content_id;
        $('#editArticleForm').attr('action',action);
        $.get('achievements/edit/' + content_id , function (data)
        {

            /*$('#id').val(data.id);
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
             $('#edit-summernote').text('');*/
        });
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
        error: function (response)
        {
            $('#titleError').text(response.responseJSON.errors.title);
            $('#classificationIdError').text(response.responseJSON.errors.classification_id);
            $('#nameError').text(response.responseJSON.errors.name);
            $('#descriptionError').text(response.responseJSON.errors.description);
            $('#startDateError').text(response.responseJSON.errors.start_date);
            $('#endDateError').text(response.responseJSON.errors.end_date);

            /*for (var i=0; i<imagesCounter ; i++)
            {
                console.log(imagesCounter);
                if(response.responseJSON.errors['new_image.'+i] != null)
                    $('#imageError'+i).text(response.responseJSON.errors['new_image.'+i])
                if(response.responseJSON.errors['img_description.'+i]!= null)
                    $('#imageDescriptionError'+i).text(response.responseJSON.errors['img_description.'+i])
            }

            for (var i=0; i<filesCounter ; i++)
            {
                if(response.responseJSON.errors['new_file.'+i] != null)
                    $('#fileError'+i).text(response.responseJSON.errors['new_file.'+i])
                if(response.responseJSON.errors['file_description.'+i]!= null)
                    $('#fileDescriptionError'+i).text(response.responseJSON.errors['file_description.'+i])
            }

            for (var i=0; i<youtubeCounter ; i++)
            {
                if(response.responseJSON.errors['new_youtube.'+i] != null)
                    $('#youtubeError'+i).text(response.responseJSON.errors['new_youtube.'+i])
                if(response.responseJSON.errors['youtube_description.'+i]!= null)
                    $('#youtubeDescriptionError'+i).text(response.responseJSON.errors['youtube_description.'+i])
            }*/
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
            url: 'achievements/status/'+status+'/'+content_id,
            success: function(data){
                console.log(data.success);


            }
        });
    });
});


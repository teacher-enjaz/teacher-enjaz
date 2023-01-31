$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('select[name="language_id"]').on('change',function (e) {
        if($(this).val() === '-1')
            $('#language_name').show();
        else
            $('#language_name').hide();
    })
    $('body').on('click', '.create-btn', function (e)
    {
        e.preventDefault();
        $('#languageError').text('');
        $('#nameError').text('');

    });

    /************************** store Skill **********************/
    $('#languageForm').ajaxForm({

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
                        $('#add-lang-eModal').hide();
                        $('#add-lang-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#languageError').text('');
            $('#nameError').text('');
            $('#editLanguageError').text('');

            $('#languageError').text(response.responseJSON.errors.language_id);
            $('#nameError').text(response.responseJSON.errors.name);
        }
    });
    /************************** Update Skill **********************/
    $('body').on('click', '.edit-btn', function (e)
    {
        e.preventDefault();
        var user_language_id= $(this).data('id');
        console.log(user_language_id)
        var action = 'user-languages/update/'+user_language_id;
        $('#editLanguageForm').attr('action',action);
        $.get('user-languages/edit/' + user_language_id , function (data)
        {
            console.log(data)

            $('#id').val(data.id);
            $('#option'+data.language_id).attr('selected','selected');
            if(data.is_native === 1 )
                $('#is_native').attr('checked','checked')
            else
                $('#is_native').removeAttr('checked')

            /**
             * Settings of writing custom range due to stored values in DB
             */
            document.getElementById("writing02").innerText=data.writing_level;
            if (data.writing_level >= 75)
                document.getElementById("gradeWritingEdit").innerText = "ممتاز"

            else if(data.writing_level >= 50)
                document.getElementById("gradeWritingEdit").innerText = "متوسط"

            else if(data.writing_level > 5)
                document.getElementById("gradeWritingEdit").innerText = "ضعيف"

            else if(data.writing_level < 5)
                document.getElementById("gradeWritingEdit").innerText = "ضعيف جدا"

            $('#customRange02').val(data.writing_level);

            /**
             * Settings of reading custom range due to stored values in DB
             */
            document.getElementById("reading03").innerText=data.reading_level;
            if (data.reading_level >= 75)
                document.getElementById("gradeReadingEdit").innerText = "ممتاز"

            else if(data.reading_level >= 50)
                document.getElementById("gradeReadingEdit").innerText = "متوسط"

            else if(data.reading_level > 5)
                document.getElementById("gradeReadingEdit").innerText = "ضعيف"

            else if(data.reading_level < 5)
                document.getElementById("gradeReadingEdit").innerText = "ضعيف جدا"

            $('#customRange03').val(data.reading_level);

            /**
             * Settings of speaking custom range due to stored values in DB
             */
            document.getElementById("speaking04").innerText=data.speaking_level;
            if (data.speaking_level >= 75)
                document.getElementById("gradeSpeakingEdit").innerText = "ممتاز"

            else if(data.speaking_level >= 50)
                document.getElementById("gradeSpeakingEdit").innerText = "متوسط"

            else if(data.speaking_level > 5)
                document.getElementById("gradeSpeakingEdit").innerText = "ضعيف"

            else if(data.speaking_level < 5)
                document.getElementById("gradeSpeakingEdit").innerText = "ضعيف جدا"

            $('#customRange04').val(data.speaking_level);


            $('#editLanguageError').text('');
        })
    });

    $('#editLanguageForm').ajaxForm({
        success:function(response)
        {
            console.log('in success')
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
                        $('#edit-lang-eModal').hide();
                        $('#edit-lang-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            console.log('in error')
            $('#editLanguageError').text('');
            $('#editLanguageError').text(response.responseJSON.errors.language_id);
        }
    });
    /************************* change status *******************************/
    $('.language-status').change(function() {
        var status = $(this).prop('checked') === true ? 1 : 0;
        var language_id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "application/json",
            url: 'user-languages/status/'+status+'/'+language_id,
            success: function(data){
                console.log(data.success)
            }
        });
    });
});

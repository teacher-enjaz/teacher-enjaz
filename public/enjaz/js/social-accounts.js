$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('body').on('click', '.create-btn', function (e)
    {
        e.preventDefault();
        $('#namePlatformError').text('');
        $('#linkError').text('');
    });
    /************************** store Experience **********************/
    $('#accountForm').ajaxForm({
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
                        $('#add-accounts-eModal').hide();
                        $('#add-accounts-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#namePlatformError').text('');
            $('#linkError').text('');
            $('#namePlatformError').text(response.responseJSON.errors.social_platform_id);
            $('#linkError').text(response.responseJSON.errors.link);//.link the name of field in Form
        }
    });
    /************************** Update Experience **********************/
    $('body').on('click', '.edit-btn', function (e)
    {
        e.preventDefault();
        var account_id = $(this).data('id'); //باخدها من data_id
        var action = 'social-accounts/update/'+account_id;
        $('#editSocialAccountForm').attr('action',action);//بضيف امكشن لفورم التعديل في المودال
        $.get('social-accounts/edit/' + account_id , function (data) //بروح للراوت الي موجو بملف الويب وبروح بعدها للفنكشن الي موجودة بالكونترولر بترجع بيانات بشكل جيسون باخدها عن طريق الباراميتر data الي بداخل الفنشكن هنا ووببدا اعبي البيانات بداخل المودال تبع الedit
        {
            $('#id').val(data.id);
            $('#option'+data.social_platform_id).attr('selected','selected');
            $('#link').val(data.link);//id لinput  بعطيه فاليو من الجيسون
            var image = document.getElementById('image-platform');
            image.src = '/storage/socialPlatforms/'+data.image;
        })
    });

    $('#editSocialAccountForm').ajaxForm({
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
                        $('#edit-account-eModal').hide();
                        $('#edit-account-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#editPlatformError').text('');
            $('#editLinkError').text('');
            $('#editPlatformError').text(response.responseJSON.errors.social_platform_id);
            $('#editLinkError').text(response.responseJSON.errors.link);
        }
    });
    /************************* chasnge status *******************************/
    $('.account-status').change(function() {
        var status = $(this).prop('checked') === true ? 1 : 0;
        var social_account_id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "application/json",
            url: 'social-accounts/status/'+status+'/'+social_account_id,
            success: function(data){
                console.log(data.success)
            }
        });
    });
});

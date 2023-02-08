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
        $('#imagePlatformError').text('');
        $('#editImageError').text('');
        $('#editNameError').text('');
    });
    /************************** store Experience **********************/
    $('#platformForm').ajaxForm({
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
                        $('#add-platforms-eModal').hide();
                        $('#add-platforms-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#namePlatformError').text('');
            $('#imagePlatformError').text('');
            $('#namePlatformError').text(response.responseJSON.errors.name);
            $('#imagePlatformError').text(response.responseJSON.errors.image);
        }
    });
    /************************** Update Experience **********************/
    $('body').on('click', '.edit-btn', function (e)
    {
        e.preventDefault();
        var platform_id = $(this).data('id'); //باخدها من data_id
        var action = 'social-platforms/update/'+platform_id;
        $('#editSocialPlatformForm').attr('action',action);//بضيف امكشن لفورم التعديل في المودال
        $.get('social-platforms/edit/' + platform_id , function (data) //بروح للراوت الي موجو بملف الويب وبروح بعدها للفنكشن الي موجودة بالكونترولر بترجع بيانات بشكل جيسون باخدها عن طريق الباراميتر data الي بداخل الفنشكن هنا ووببدا اعبي البيانات بداخل المودال تبع الedit
        {
            $('#id').val(data.id);
            $('#name').val(data.name); //id لinput  بعطيه فاليو من الجيسون
            var image = document.getElementById('image-platform');
            image.src = '/storage/socialPlatforms/'+data.image;

            $('#editImageError').text('');
            $('#editNameError').text('');
        })
    });

    $('#editSocialPlatformForm').ajaxForm({
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
                        $('#edit-platform-eModal').hide();
                        $('#edit-platform-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#editNameError').text('');
            $('#editImageError').text('');
            $('#editNameError').text(response.responseJSON.errors.name);
            $('#editImageError').text(response.responseJSON.errors.image);
        }
    });
    /************************* chasnge status *******************************/
    $('.platforms-status').change(function() {
        var status = $(this).prop('checked') === true ? 1 : 0;
        var socialPlatforms = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "application/json",
            url: 'social-platforms/status/'+status+'/'+socialPlatforms,
            success: function(data){
                console.log(data.success)
            }
        });
    });
});

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
    });
    /************************** store Experience **********************/
    $('#contentTypeForm').ajaxForm({
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
                        console.log('isconfirmed');
                        $('#add-content-types-eModal').hide();
                        $('#add-content-types-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#nameError').text('');
            $('#nameError').text(response.responseJSON.errors.name);
        }
    });
    /************************** Update Experience **********************/
    $('body').on('click', '.edit-btn', function (e)
    {
        e.preventDefault();
        var content_type_id = $(this).data('id');
        var action = 'content-types/update/'+content_type_id;
        $('#editContentTypeForm').attr('action',action);
        $.get('content-types/edit/' + content_type_id , function (data)
        {
            $('#name').val(data.name);
        })
    });

    $('#editContentTypeForm').ajaxForm({
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
                        $('#edit-content-types-eModal').hide();
                        $('#edit-content-types-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#editNameError').text('');
            $('#editNameError').text(response.responseJSON.errors.name);
        }
    });
    /************************* chasnge status *******************************/
    $('.content-type-status').change(function() {
        var status = $(this).prop('checked') === true ? 1 : 0;
        var content_type_id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "application/json",
            url: 'content-types/status/'+status+'/'+content_type_id,
            success: function(data){
                console.log(data.success)
            }
        });
    });
});

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '.create-btn', function (e)
    {
        e.preventDefault();
        $('#infoError').text('');
        $('#editInfoError').text('');
    });
    /************************** store Experience **********************/
    $('#bioForm').ajaxForm({
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
                        $('#add-bio-eModal').hide();
                        $('#add-bio-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#infoError').text('');

            $('#infoError').text(response.responseJSON.errors.info);
        }
    });
    /************************** Update Experience **********************/
    $('body').on('click', '.edit-btn', function (e)
    {
        e.preventDefault();
        var bio_id = $(this).data('id');
        var action = 'enjaz-cpanel/update/'+bio_id;
        $('#editBioForm').attr('action',action);

        //fill values in input fields
        $.get('enjaz-cpanel/edit/' + bio_id , function (data)
        {
            $('#id').val(data.id);
            document.getElementById('info').innerText= data.info;
            $('#editInfoError').text('');

        })
    });

    $('#editBioForm').ajaxForm({
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
                        $('#edit-bio-eModal').hide();
                        $('#edit-bio-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#editInfoError').text('');

            $('#editInfoError').text(response.responseJSON.errors.info);

        }
    });
});

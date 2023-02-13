$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //to show input of organization name if value = -1
    $('select[name="award_id"]').on('change',function (e) {
        if($(this).val() === '-1')
        {
            $('#award_name').show();
            $('#award_donor').show();
            $('#award_description').show();
        }
        else
        {
            $('#award_name').hide();
            $('#award_donor').hide();
            $('#award_description').hide();
        }
    })
    /*$('select[id="award_id"]').on('change',function (e) {
        if($(this).val() === '-1')
        {
            $('#edit_award_name').show();
            $('#edit_award_donor').show();
            $('#edit_award_description').show();
        }
        else
        {
            $('#edit_award_name').hide();
            $('#edit_award_donor').hide();
            $('#edit_award_description').hide();
        }
    })*/
    $('body').on('click', '.create-btn', function (e)
    {
        e.preventDefault();
        //$('#add-award-eModal').find('input').val('')
        $('#awardError').text('');
        $('#nameAwardError').text('');
        $('#donorAwardError').text('');
        $('#descriptionAwardError').text('');
        $('#obtainedDateError').text('');
        $('#imageError').text('');
        $('#youtubeLinkError').text('');
    });
    /************************** store Experience **********************/
    $('#awardForm').ajaxForm({
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
                        $('#add-award-eModal').hide();
                        $('#add-award-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#awardError').text('');
            $('#nameAwardError').text('');
            $('#donorAwardError').text('');
            $('#descriptionAwardError').text('');
            $('#obtainedDateError').text('');
            $('#imageError').text('');
            $('#youtubeLinkError').text('');

            $('#awardError').text(response.responseJSON.errors.award_id);
            $('#nameAwardError').text(response.responseJSON.errors.name);
            $('#donorAwardError').text(response.responseJSON.errors.donor);
            $('#descriptionAwardError').text(response.responseJSON.errors.description);
            $('#obtainedDateError').text(response.responseJSON.errors.obtained_date);
            $('#imageError').text(response.responseJSON.errors.image);
            $('#youtubeLinkError').text(response.responseJSON.errors.youtube_link);
        }
    });

    /************************** Update Experience **********************/
    $('body').on('click', '.edit-btn', function (e)
    {
        e.preventDefault();
        var userAward_id = $(this).data('id');
        var action = 'user-awards/update/'+userAward_id;
        $('#editAwardForm').attr('action',action);
        //fill values in input fields
        $.get('user-awards/edit/' + userAward_id , function (data)
        {

            $('#id').val(data.id);
            $('#obtained_date').val(data.obtained_date);
            $('#youtube_link').val(data.youtube_link);
            $('#option'+data.award_id).attr('selected','selected');
            var image = document.getElementById('image_view');
            image.src = '/storage/awards/'+data.image;

            $('#editAwardError').text('');
            $('#editNameAwardError').text('');
            $('#editDonorAwardError').text('');
            $('#editDescriptionAwardError').text('');
            $('#editObtainedDateError').text('');
            $('#editImageError').text('');
            $('#editYoutubeLinkError').text('');
        })
    });

    $('#editAwardForm').ajaxForm({
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
                        $('#edit-award-eModal').hide();
                        $('#edit-award-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#editAwardError').text('');
            $('#editNameAwardError').text('');
            $('#editDonorAwardError').text('');
            $('#editDescriptionAwardError').text('');
            $('#editObtainedDateError').text('');
            $('#editImageError').text('');
            $('#editYoutubeLinkError').text('');

            $('#editAwardError').text(response.responseJSON.errors.award_id);
            $('#editNameAwardError').text(response.responseJSON.errors.name);
            $('#editDonorAwardError').text(response.responseJSON.errors.donor);
            $('#editDescriptionAwardError').text(response.responseJSON.errors.description);
            $('#editObtainedDateError').text(response.responseJSON.errors.obtained_date);
            $('#editImageError').text(response.responseJSON.errors.image);
            $('#editYoutubeLinkError').text(response.responseJSON.errors.youtube_link);

        }
    });
    /************************* chasnge status *******************************/
    $('.user-award-status').change(function() {
        var status = $(this).prop('checked') === true ? 'مسودة' : 'منشور';
        var user_award_id = $(this).data('id');
        const element = document.querySelector("#status-tag"+user_award_id);

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
            url: 'user-awards/status/'+status+'/'+user_award_id,
            success: function(data){
                console.log(data.success);


            }
        });
    });
});

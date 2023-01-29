$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //to show input of organization name if value = -1
    $('select[name="organization_id"]').on('change',function (e) {
        if($(this).val() === '-1')
            $('#organization_name').show();
        else
            $('#organization_name').hide();
    })
    $('select[id="organization_id"]').on('change',function (e) {
        if($(this).val() === '-1')
            $('#edit_organization_name').show();
        else
            $('#edit_organization_name').hide();
    })
    $('body').on('click', '.create-btn', function (e)
    {
        e.preventDefault();
        $('#nameError').text('');
        $('#organizationError').text('');
        $('#organizationNameError').text('');
        $('#grantDateError').text('');
        $('#validityError').text('');
    });
    /************************** store Experience **********************/
    $('#membershipForm').ajaxForm({
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
                        $('#add-member-eModal').hide();
                        $('#add-member-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#nameError').text('');
            $('#organizationError').text('');
            $('#organizationNameError').text('');
            $('#grantDateError').text('');
            $('#validityError').text('');

            $('#nameError').text(response.responseJSON.errors.name);
            $('#organizationError').text(response.responseJSON.errors.organization_id);
            $('#organizationNameError').text(response.responseJSON.errors.organization_name);
            $('#grantDateError').text(response.responseJSON.errors.grant_date);
            $('#validityError').text(response.responseJSON.errors.validity);
        }
    });
    /************************** Update Experience **********************/
    $('body').on('click', '.edit-btn', function (e)
    {
        e.preventDefault();
        var membership_id = $(this).data('id');
        var action = 'memberships/update/'+membership_id;
        $('#editMembershipForm').attr('action',action);
        //fill values in input fields
        $.get('memberships/edit/' + membership_id , function (data)
        {
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#option'+data.organization_id).attr('selected','selected');
            $('#grant_date').val(data.grant_date);
            $('#opt'+data.validity).attr('selected','selected');

            $('#editNameError').text('');
            $('#editOrganizationError').text('');
            $('#editOrganizationNameError').text('');
            $('#editGrantDateError').text('');
            $('#editValidityError').text('');
        })
    });

    $('#editMembershipForm').ajaxForm({
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
                        $('#edit-member-eModal').hide();
                        $('#edit-member-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#editNameError').text('');
            $('#editOrganizationError').text('');
            $('#editOrganizationNameError').text('');
            $('#editGrantDateError').text('');
            $('#editValidityError').text('');

            $('#editNameError').text(response.responseJSON.errors.name);
            $('#editOrganizationError').text(response.responseJSON.errors.organization_id);
            $('#editOrganizationNameError').text(response.responseJSON.errors.organization_name);
            $('#editGrantDateError').text(response.responseJSON.errors.grant_date);
            $('#editValidityError').text(response.responseJSON.errors.validity);
        }
    });
    /************************* chasnge status *******************************/
    $('.membership-status').change(function() {
        var status = $(this).prop('checked') === true ? 1 : 0;
        var membership_id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "application/json",
            url: 'memberships/status/'+status+'/'+membership_id,
            success: function(data){
                console.log(data.success)
            }
        });
    });
});

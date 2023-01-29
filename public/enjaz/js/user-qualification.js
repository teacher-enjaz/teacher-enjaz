$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //To show add other value input in create function
    $('select[name="qualification_id"]').on('change',function (e) {
        if($(this).val() === '-1')
            $('#qualification_name').show();
        else
            $('#qualification_name').hide();
    })
    $('select[name="specialization_id"]').on('change',function (e) {
        if($(this).val() === '-1')
            $('#specialization_name').show();
        else
            $('#specialization_name').hide();
    })
    $('select[name="university_id"]').on('change',function (e) {
        if($(this).val() === '-1')
            $('#university_name').show();
        else
            $('#university_name').hide();
    })
    $('select[name="graduated_country_id"]').on('change',function (e) {
        if($(this).val() === '-1')
            $('#graduated_country_name').show();
        else
            $('#graduated_country_name').hide();
    })

    //To show add other value input in edit function
    $('select[id="qualification_id"]').on('change',function (e) {
        if($(this).val() === '-1')
            $('#edit_qualification_name').show();
        else
            $('#edit_qualification_name').hide();
    })
    $('select[id="specialization_id"]').on('change',function (e) {
        if($(this).val() === '-1')
            $('#edit_specialization_name').show();
        else
            $('#edit_specialization_name').hide();
    })
    $('select[id="university_id"]').on('change',function (e) {
        if($(this).val() === '-1')
            $('#edit_university_name').show();
        else
            $('#edit_university_name').hide();
    })
    $('select[id="graduated_country_id"]').on('change',function (e) {
        if($(this).val() === '-1')
            $('#edit_graduated_country_name').show();
        else
            $('#edit_graduated_country_name').hide();
    })

    $('body').on('click', '.create-btn', function (e)
    {
        e.preventDefault();
        $('#editQualificationError').text('');
        $('#qualificationError').text('');
        $('#editQualificationNameError').text('');

        $('#editSpecializationError').text('');
        $('#specializationError').text('');
        $('#editSpecializationNameError').text('');

        $('#editUniversityError').text('');
        $('#universityError').text('');
        $('#editUniversityNameError').text('');

        $('#editGraduatedCountryError').text('');
        $('#graduatedCountryError').text('');
        $('#editGraduatedCountryNameError').text('');

        $('#editGraduatedYearError').text('');
        $('#graduatedYearError').text('');
    });
    /************************** store Experience **********************/

    $('#userQualificationForm').ajaxForm({
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
                        $('#add-qualification-eModal').hide();
                        $('#add-qualification-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#qualificationError').text('');
            $('#qualificationNameError').text('');
            $('#specializationError').text('');
            $('#specializationNameError').text('');
            $('#universityError').text('');
            $('#universityNameError').text('');
            $('#graduatedCountryError').text('');
            $('#graduatedCountryNameError').text('');
            $('#graduatedYearError').text('');

            $('#qualificationError').text(response.responseJSON.errors.qualification_id);
            $('#qualificationNameError').text(response.responseJSON.errors.qualificationName);
            $('#specializationError').text(response.responseJSON.errors.specialization_id);
            $('#specializationNameError').text(response.responseJSON.errors.specializationName);
            $('#universityError').text(response.responseJSON.errors.university_id);
            $('#universityNameError').text(response.responseJSON.errors.universityName);
            $('#graduatedCountryError').text(response.responseJSON.errors.graduated_country_id);
            $('#graduatedCountryNameError').text(response.responseJSON.errors.graduatedCountryName);
            $('#graduatedYearError').text(response.responseJSON.errors.graduation_year);
        }
    });

    /************************** Update Experience **********************/

    $('body').on('click', '.edit-btn', function (e)
    {
        e.preventDefault();
        var user_qualification_id = $(this).data('id');
        var action = '/user-qualifications/update/'+user_qualification_id;
        $('#editUserQualificationForm').attr('action',action);
        $.get('user-qualifications/edit/' + user_qualification_id , function (data)
        {
            $('#id').val(data.id);
            $('#option1'+data.qualification_id).attr('selected','selected');
            $('#option2'+data.specialization_id).attr('selected','selected');
            $('#option3'+data.university_id).attr('selected','selected');
            $('#option4'+data.graduated_country_id).attr('selected','selected');
            $('#edit_graduation_year').val(data.graduation_year);

            $('#editQualificationError').text('');
            $('#editSpecializationError').text('');
            $('#editUniversityError').text('');
            $('#editGraduatedCountryError').text('');
            $('#editGraduatedYearError').text('');
        })
    });

    $('#editUserQualificationForm').ajaxForm({
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
                        $('#edit-qualification-eModal').hide();
                        $('#edit-qualification-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#editQualificationError').text('');
            $('#editSpecializationError').text('');
            $('#editUniversityError').text('');
            $('#editGraduatedCountryError').text('');
            $('#editGraduatedYearError').text('');

            $('#editQualificationError').text(response.responseJSON.errors.qualification_id);
            $('#editQualificationNameError').text(response.responseJSON.errors.qualificationName);
            $('#editSpecializationError').text(response.responseJSON.errors.specialization_id);
            $('#editSpecializationNameError').text(response.responseJSON.errors.specializationName);
            $('#editUniversityError').text(response.responseJSON.errors.university_id);
            $('#editUniversityNameError').text(response.responseJSON.errors.universityName);
            $('#editGraduatedCountryError').text(response.responseJSON.errors.graduated_country_id);
            $('#editGraduatedCountryNameError').text(response.responseJSON.errors.graduatedCountryName);
            $('#editGraduatedYearError').text(response.responseJSON.errors.graduation_year);
        }
    });
    /************************* chasnge status *******************************/
    $('.user-qualification-status').change(function() {
        var status = $(this).prop('checked') === true ? 1 : 0;
        var user_qualification_id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "application/json",
            url: 'user-qualification/status/'+status+'/'+user_qualification_id,
            success: function(data){
                console.log(data.success)
            }
        });
    });
});

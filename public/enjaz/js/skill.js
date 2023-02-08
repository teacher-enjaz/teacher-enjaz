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
        $('#editNameError').text('');
        $('#skillLevelError').text('');
        $('#editLevelError').text('');
    });
    /************************** store Skill **********************/
    $('#skillForm').ajaxForm({

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
                        $('#add-skill-eModal').hide();
                        $('#add-skill-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            $('#nameError').text('');
            $('#skillLevelError').text('');

            $('#nameError').text(response.responseJSON.errors.name);
            $('#skillLevelError').text(response.responseJSON.errors.skill_level);
        }
    });
    /************************** Update Skill **********************/
    $('body').on('click', '.edit-btn', function (e)
    {
        e.preventDefault();
        var skill_id = $(this).data('id');
        console.log(skill_id)
        var action = "skills/update/"+skill_id;
        $('#editSkillForm').attr('action',action);
        $.get('skills/edit/' + skill_id , function (data)
        {
            $('#id').val(data.id);
            $('#name').val(data.name);
            document.getElementById("demo2").innerText=data.skill_level;
            $('#customRange2').val(data.skill_level);
            $('#editNameError').text('');
            $('#editLevelError').text('');
        })
    });

    $('#editSkillForm').ajaxForm({
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
                        $('#edit-skill-eModal').hide();
                        $('#edit-skill-eModal').trigger('reset');
                        window.location.reload();
                    }
                });
            }
        },
        error: function (response) {
            console.log('in error')
            $('#editNameError').text('');
            $('#editLevelError').text('');
            $('#editNameError').text(response.responseJSON.errors.name);
            $('#editLevelError').text(response.responseJSON.errors.skill_level);
        }
    });
    /************************* change status *******************************/
    $('.skill-status').change(function() {
        var status = $(this).prop('checked') === true ? 1 : 0;
        var skill_id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "application/json",
            url: 'skills/status/'+status+'/'+skill_id,
            success: function(data){
                console.log(data.success)
            }
        });
    });
});
/**
 * custom ranges settings for Add and Edit
 * @type {HTMLElement}
 */

var slider = document.getElementById("customRange1");
var slider2 = document.getElementById("customRange2");
var output = document.getElementById("demo");
var output2 = document.getElementById("demo2");
var gradeadd= document.getElementById("grade");
var gradedit= document.getElementById("grade-edit");
output.innerHTML = slider.value;
output2.innerHTML = slider2.value;
slider.oninput = function() {
    output.innerHTML = this.value;
    if (this.value >= 75){
        gradeadd.innerHTML = "ممتاز"
    }
    else if(this.value >= 50){
        gradeadd.innerHTML = " متوسط"
    }
    else if(this.value > 5){
        gradeadd.innerHTML = "ضعيف "
    }
    else if(this.value < 5){
        gradeadd.innerHTML = " ضعيف جدا "
    }
}
slider2.oninput = function() {
    output2.innerHTML = this.value;
    if (this.value >= 75){
        gradedit.innerHTML = "ممتاز"
    }
    else if(this.value >= 50){
        gradedit.innerHTML = " متوسط"
    }
    else if(this.value > 5){
        gradedit.innerHTML = "ضعيف "
    }
    else if(this.value < 5){
        gradedit.innerHTML = " ضعيف جدا "
    }
}
jQuery(function($) {
    var path = window.location.href;
    console.log(path);
    // because the 'href' property of the DOM element is the absolute path
    $('.ul-aside a').each(function() {
        if (this.href === path) {
            $("a").removeClass("active")
            $(this).addClass('active');
        }
    });
});

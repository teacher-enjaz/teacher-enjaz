/* get subjects related to selected class */
$(document).ready(function () {
    $('select[name="grade_id"]').on('change',function (e) {
        var grade_id =$(this).val();
        var lang =$(this).data('lang');
        var option="";
        if(grade_id)
        {
            $.ajax({
                url: '/units/getSubjects/'+grade_id,
                type: 'GET',
                dataType: 'json',
                success: function (response)
                {
                    $('select[name="subject_id"]').empty();
                    $('select[name="subject_id"]').focus();
                    var len = 0;
                    if(response['data'] != null){
                        len = response['data'].length;
                    }

                    if(len > 0) {
                        if(lang == 'ar')
                        {
                            $('select[name="subject_id"]').append('<option label="اختر المبحث من فضلك"></option>');
                            // Read data and create <option >
                            subRecursionForObject(response['data'], 0, '-', lang);
                        }
                        else
                        {
                            $('select[name="subject_id"]').append('<option label="Select Subject Please"></option>');
                            // Read data and create <option >
                            subRecursionForObject(response['data'], 0, '-', lang);
                        }
                    }
                }
            });
        }
        else {
            $('select[name="subject_id"]').empty();
        }
    });
});

/****************************************************************************************************/
function subRecursionForObject(data,counter,char,lang)
{
    $.each(data, function(index, element){
        console.log(element);
        var space = "";
        var style= "";
        var temp=counter;
        while(temp>0)
        {
            space+="&nbsp&nbsp&nbsp";
            style+= char;
            temp--;
        }
        if(element.id && element.status === true)
        {
            if(element.parent_id == null)
            {
                if(lang === 'ar')
                {
                    $('select[name="subject_id"]').append(
                        "<option value='" + element.id + "' style='color: black;' >" + element.name_ar + "</option>"
                    );
                }
                else
                {
                    $('select[name="subject_id"]').append(
                        "<option value='" + element.id + "' style='color: black;' >" + element.name_en + "</option>"
                    );
                }
            }
            else
            {
                if(lang === 'ar')
                {
                    $('select[name="subject_id"]').append(
                        "<option value='" + element.id + "' >" + space + style + element.name_ar + "</option>"
                    );
                }
                else
                {
                    $('select[name="subject_id"]').append(
                        "<option value='" + element.id + "' >" + space + style + element.name_en + "</option>"
                    );
                }
            }
        }
        if(element.child)
        {
            subRecursionForObject(element.child, counter + 1, char);
        }

    });
}
/*****************************************************************************************************/
/* make class select 2 */
$(document).ready(function()
{
    $('#grades').select2();
});
$(document).ready(function () {
    $('select[name="grade_id"]').on('change',function (e) {
        var grade_id = $(this).val();
        var parent = $('#grade' + grade_id).data('parent');
        var lang = $(this).data('lang');
        var option = "";
        if (parent !== '')
        {
            $('#branches').show();
            if (grade_id) {
                $.ajax({
                    url: '/units/getBranches/' + grade_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        $('#grades').empty();
                        $('#grades').focus();

                        $('#grades').empty();
                        $('#grades').append('<optgroup label="اختر الفرع"></optgroup>');

                        $.each(response['data'], function (index, element) {
                            var newOptions = '';
                            if (lang === 'ar') {
                                newOptions += '<option value="' + element.id + '">' + element.name_ar + '</option>';
                                $('#grades').append(newOptions).select2();
                            } else {
                                newOptions += '<option value="' + element.id + '">' + element.name_en + '</option>';
                                $('#grades').append(newOptions).select2();
                            }

                        });
                    }
                });
            } else {
                $('#grades').empty();
            }
        }
        else {
            $('#grades').hide();
        }
    });
});

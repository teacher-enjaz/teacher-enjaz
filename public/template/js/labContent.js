$(document).ready(function ()
{
    $('select[name="grade_id"]').on('change',function (e) {
        var grade_id = $(this).val();
        var lang =$(this).data('lang');
        $('#subject_id').val('');
        $('#semester_id').val('');
        $('#unit_id').val('');
        $('#lesson_id').val('');
        if(grade_id)
        {
            $.ajax({
                url: '/lab-content/getScienceSubjects/'+grade_id,
                type: 'GET',
                dataType: 'json',
                success: function (response)
                {
                    $('select[name="subject_id"]').empty();
                    $('select[name="subject_id"]').focus();
                    var len = 0;
                    if(Object.keys(response['data']) != null)
                    {
                        len = Object.keys(response['data']).length;
                    }

                    if(len > 0) {

                        if(lang == 'ar')
                        {
                            $('select[name="subject_id"]').append('<option value=""><h6>اختر المبحث من فضلك</h6></option>');
                            // Read data and create <option >
                            subRecursionForObject(Object.values(response['data']), 0, '-', lang);
                        }
                        else
                        {
                            $('select[name="subject_id"]').append('<option value=""><h6>Select Subject Please</h6></option>');
                            // Read data and create <option >
                            subRecursionForObject(Object.values(response['data']), 0, '-', lang);
                        }
                    }
                    else
                        $('select[name="subject_id"]').append('<option value=""><h6>لا توجد مباحث مضافة لهذا الصف</h6></option>');

                }
            });
        }
        else {
            $('select[name="subject_id"]').empty();
        }
    });
});
/**************************************************************************************************/
/* get units related to selected subject and semester */
$(document).ready(function () {
    $('#semester_id').on('change',function(e) {
        var subject_id = $('select[name="subject_id"]').val();
        var grade_id = $('select[name="grade_id"]').val();
        var semester_id = $(this).val();
        var lang =$(this).data('lang');
        $('#unit_id').val('');
        $('#lesson_id').val('');
        $.ajax({
            url:"/file-materials/getUnits/"+grade_id+'/'+subject_id+'/'+semester_id,
            type:"get",
            success:function (response) {
                $('#unit_id').empty();
                var len = 0,name,option;

                if(response.unit != null)
                {
                    len = response.unit.length;
                    if(len > 0)
                    {
                        $('select[name="unit_id"]').append('<option value="">اختر الوحدة من فضلك</option>');
                        for (var i = 0; i < len; i++)
                        {
                            var id = response.unit[i].id;
                            if(lang == 'ar')
                            {
                                name = response.unit[i].name_ar;
                                option = "<option value='" + id + "'>" + name + "</option>";
                            }
                            else
                            {
                                name = response.unit[i].name_en;
                                option = "<option value='" + id + "'>" + name+ "</option>";
                            }
                            $('select[name="unit_id"]').append(option);
                        }
                    }
                    else {
                        $('select[name="unit_id"]').append('<option value="" >لا يوجد وحدات مضافة لهذا المبحث</option>');

                    }
                }
                else if(response.units != null)
                {
                    len = response.units.length;
                    if(len > 0)
                    {
                        $('select[name="unit_id"]').append('<option value="" > اختر الوحدة من فضلك</option>');
                        for (var i = 0; i < len; i++)
                        {
                            var id = response.units[i].unit_id;
                            if(lang == 'ar')
                            {
                                name = response.units[i].name_ar;
                                option = "<option value='" + id + "'>" + name + "</option>";
                            }
                            else
                            {
                                name = response.units[i].name_en;
                                option = "<option value='" + id + "'>" + name+ "</option>";
                            }
                            $('select[name="unit_id"]').append(option);
                        }
                    }
                    else {
                        $('select[name="unit_id"]').append('<option value="">لا يوجد وحدات مضافة لهذا المبحث</option>');

                    }
                }
            }
        })
    });
});
/**************************************************************************************************/
/* get lessons related to selected class */

$(document).ready(function ()
{
    $('#unit_id').on('change',function(e)
    {
        var unit_id = $(this).val();
        var lang =$(this).data('lang');
        $('#lesson_id').val('');
        if(unit_id)
        {
            $.ajax
            ({
                url: '/file-materials/getLessons/' + unit_id,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    $('#lesson_id').empty();
                    var len = 0, id, name, option;

                    if (response['data'] != null)
                    {
                        len = response['data'].length;
                    }
                    if (len > 0)
                    {
                        if(lang === 'ar')
                            $('select[name="lesson_id"]').append('<option value="">اختر الدرس من فضلك</option>');
                        else
                            $('select[name="lesson_id"]').append('<option value="">Select Lesson, Please</option>');

                        for (var i = 0; i < len; i++)
                        {
                            id = response['data'][i].id;

                            if (lang == 'ar')
                            {
                                name = response['data'][i].name_ar;
                                option = "<option value='" + id + "'>" + name + "</option>";
                            }
                            else
                            {
                                name = response['data'][i].name_en;
                                option = "<option value='" + id + "'>" + name + "</option>";
                            }
                            $('select[name="lesson_id"]').append(option);
                        }
                    }
                    else
                    {
                        $('select[name="lesson_id"]').append('<option value="">لا يوجد دروس مضافة</option>');
                    }
                }
            });
        }
        else
        {
            $('select[name="lesson_id"]').empty();
        }
    });
});

/****************************************************************************************************/
function subRecursionForObject(data,counter,char,lang)
{
    $.each(data, function(index, element){
        var space = "";
        var style= "";
        var temp=counter;
        while(temp>0)
        {
            space+="&nbsp&nbsp&nbsp";
            style+= char;
            temp--;
        }
        if(element.id && element.status == true)
        {
            if(element.parent_id == null)
            {
                if(lang == 'ar')
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
                if(lang == 'ar')
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



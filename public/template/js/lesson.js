/**************************************************************************************************/
/* get subjects related to selected class */
$(document).ready(function () {
    $('select[name="grade_id"]').on('change',function (e) {
        var grade_id = $(this).val();
        var lang =$(this).data('lang');
        if(grade_id)
        {
            $.ajax({
                url: '/lessons/getSubjects/'+grade_id,
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
                    if(len > 0)
                    {
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
                    else
                    {
                        $('select[name="subject_id"]').append('<option label="لا يوجد مباحث مضافة لهذا الصف"></option>');

                    }
                }
            });
        }
        else {
            $('select[name="subject_id"]').empty();
        }

    });

});
/**************************************************************************************************/

$(document).ready(function () {
    $('#semester_id').on('change',function(e) {
        var subject_id = $('select[name="subject_id"]').val();
        var grade_id = $('select[name="grade_id"]').val();
        var semester_id = $(this).val();
        var lang =$(this).data('lang');

        $.ajax({
            url:"/lessons/getUnits/"+grade_id+'/'+subject_id+'/'+semester_id,
            type:"get",
            success:function (response) {
                $('#unit_id').empty();
                var len = 0,name,option;
                if(response.unit != null)
                {
                    len = response.unit.length;
                    if(len > 0)
                    {
                        $('select[name="unit_id"]').append('<option label="اختر الوحدة من فضلك"></option>');
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
                        $('select[name="unit_id"]').append('<option label="لا يوجد وحدات مضافة لهذا المبحث"></option>');

                    }
                }
                else if(response.units != null)
                {
                    len = response.units.length;
                    if(len > 0)
                    {
                        $('select[name="unit_id"]').append('<option label="اختر الوحدة من فضلك"></option>');
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
                        $('select[name="unit_id"]').append('<option label="لا يوجد وحدات مضافة لهذا المبحث"></option>');

                    }
                }
            }
        })
    });
});

/**************************************************************************************************************/
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

function subRecursionForLesson(data)
{
    for(var i=0; i<data.length; i++)
    {
        var id = data[i].id;
        var name = data[i].name;
        var parent_id = data[i].parent_id;
        var option;
        if(parent_id == null)
        {
            option = "<option value='"+id+"' style='color: black;'>"+name+"</option>";
        }
        else{
            option = "<option value='"+id+"'>&nbsp&nbsp - "+name+"</option>";
        }

        $('select[name="parent_id"]').append(option);
    }
}


/**************************************************************************/
/*$(document).ready(function()
{
    $('#grades').select2();
});
$(document).ready(function () {
    $('select[name="grade_id"]').on('change',function (e) {
        var grade_id =$(this).val();
        //var parent =$('#grade'+grade_id).data('parent');
        var lang =$(this).data('lang');
        var option="";
        if(grade_id)
        {
            $.ajax({
                url: '/lessons/getBranches/' + grade_id,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    $('#grades').empty();
                    $('#grades').focus();

                    $('#grades').empty();
                    $('#grades').append('<optgroup label="اختر الفرع"></optgroup>');

                    $.each(response['data'], function (index, element) {
                        var newOptions = '';
                        if(lang === 'ar')
                        {
                            newOptions += '<option value="' + element.id + '">' + element.name_ar + '</option>';
                            $('#grades').append(newOptions).select2();
                        }
                        else
                        {
                            newOptions += '<option value="' + element.id + '">' + element.name_en + '</option>';
                            $('#grades').append(newOptions).select2();
                        }

                    });
                }
            });
        }
        else {
            $('#grades').empty();
        }
    });
});*/


/* get subjects related to selected class */

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
                url: '/file-materials/getSubjects/'+grade_id,
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
                            $('select[name="subject_id"]').append('<option value=""><h6>اختر المبحث من فضلك</h6></option>');
                            // Read data and create <option >
                            subRecursionForObject(response['data'], 0, '-', lang);
                        }
                        else
                        {
                            $('select[name="subject_id"]').append('<option value=""><h6>Select Subject Please</h6></option>');
                            // Read data and create <option >
                            subRecursionForObject(response['data'], 0, '-', lang);
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
/*********************************************************************************/

/*********************************************************************************/
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

/***************************************************************************************************/
/* choose file material type (link - file - youtube) */

$(document).ready(function ()
{
    $('input:radio[name="type"]').on('change',function ()
    {
        if(this.checked && this.value ==='1')
        {
            $('#device').show();
            $('.progress').show();
            $('#youtube').hide();
            $('#link').hide();
            $('#googleLink').hide();
        }
        else if(this.checked && this.value ==='2')
        {
            $('#device').hide();
            $('#youtube').show();
            $('#link').hide();
            $('#googleLink').hide();
        }
        else if(this.checked && this.value ==='3')
        {
            $('#link').show();
            $('#device').hide();
            $('#youtube').hide();
            $('#googleLink').hide();
        }
        else if(this.checked && this.value ==='4')
        {
            $('#link').hide();
            $('#device').hide();
            $('#youtube').hide();
            $('#googleLink').show();
        }
    });
});
/**************************************************************************************************/

/* **********************************     Progress Bar ********************************************/
var i = 0;
function move()
{
    $('#bar').show();
    if (i == 0) {
        i = 1;
        var elem = document.getElementById("myBar");
        var width = 10;
        var id = setInterval(frame,10);
        function frame()
        {
            if (width >= 100)
            {
                clearInterval(id);
                i = 0;
            }
            else
            {
                width++;
                elem.style.width = width + "%";
                elem.innerHTML = width  + "%";
            }
        }
    }
}
/***************************************************************************************************/
/* show / hide users list when prepared by user checked */

$(document).ready(function ()
{
    $('input:radio[name="prepared_by"]').on('change',function ()
    {

        var byOther = $('input[name="byOther"]').val();

        if(this.checked && this.value === byOther)
        {
            $('#users_list').show();
        }
        else
        {
            $('#users_list').hide();
        }
    });
});
/****************************************************************************************************/
/* show  directorates list related to geoPlaces */

$(document).ready(function ()
{
    $('#directorate_id').on('change',function(e)
    {
        var directorate_id = $('select[name="directorate_id"]').val();
        var lang =$(this).data('lang');
        $('#user_id').empty();
        $.ajax
        ({
            url:"/file-materials/getUsers/"+directorate_id,
            type:"get",
            success:function (response)
            {
                $('#user_id').empty();
                var len = 0,name,option;
                if(response['data'] != null)
                {
                    len = response['data'].length;
                }

                if(len > 0)
                {
                    if(lang == 'ar')
                    {
                        $('select[name="user_id"]').append('<option value="">اختر المستخدم من فضلك</option>');
                        for (var i = 0; i < len; i++)
                        {
                            id = response['data'][i].id;
                            name = response['data'][i].name_ar;
                            option = "<option value='" + id + "'>" + name + "</option>";

                            $('select[name="user_id"]').append(option);
                        }
                    }
                    else
                    {
                        $('select[name="user_id"]').append('<option value="">select User, Please</option>');
                        for (var i = 0; i < len; i++)
                        {
                            id = response['data'][i].id;
                            name = response['data'][i].name_en;
                            option = "<option value='" + id + "'>" + name + "</option>";

                            $('select[name="user_id"]').append(option);
                        }
                    }
                }
                else
                {
                    if(lang == 'ar')
                        $('select[name="user_id"]').append('<option value="">لا يوجد مستخدمين مضافين</option>');

                    else
                        $('select[name="user_id"]').append('<option value="">No Users Added </option>');
                }
            }
        })
    });
});
/****************************************************************************************************/
/* show geoPlaces list */

$(document).ready(function ()
{
    $('select[name="geoPlace_id"]').on('change',function (e)
    {
        var geoPlace_id = $(this).val();
        var lang =$(this).data('lang');

        if(geoPlace_id)
        {
            $.ajax
            ({
                url: '/getDirectorates/'+geoPlace_id,
                type: 'GET',
                dataType: 'json',
                success: function (response)
                {
                    var len = 0,id,name,option;
                    $('select[name="directorate_id"]').empty();
                    $('select[name="directorate_id"]').focus();

                    if(response['data'] != null)
                    {
                        len = response['data'].length;
                    }

                    if(len > 0)
                    {
                        if(lang == 'ar')
                        {
                            $('select[name="directorate_id"]').append('<option value="">اختر المديرية من فضلك</option>');
                            // Read data and create <option >
                            for(var i=0; i<len; i++){

                                id = response['data'][i].id;
                                name = response['data'][i].name_ar;
                                option = "<option value='"+id+"'>"+name+"</option>";

                                $('select[name="directorate_id"]').append(option);
                            }
                        }
                        else
                        {
                            $('select[name="directorate_id"]').append('<option value="">Select Directorate, Please</option>');
                            // Read data and create <option >
                            for(var i=0; i<len; i++){

                                id = response['data'][i].id;
                                name = response['data'][i].name_en;
                                option = "<option value='"+id+"'>"+name+"</option>";

                                $('select[name="directorate_id"]').append(option);
                            }
                        }

                    }
                    else
                    {
                        if(lang == 'ar')
                            $('select[name="directorate_id"]').append('<option value="">لا توجد مديريات مضافة</option>');

                        else
                            $('select[name="directorate_id"]').append('<option value=""> No Directorates Added </option>');
                    }
                }
            });
        }
        else
        {
            $('select[name="directorate_id"]').empty();
        }
    });
});

/****************************************************************************************************/
/* change file material status */


/********************************************************************/
function subRecursionForSubjects(data,counter,char)
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
                $('select[name="subject"]').append(
                    "<option value='" + element.id + "' style='color: black;' >" +element.name + "</option>"
                );
            }
            else
            {
                $('select[name="subject"]').append(
                    "<option value='" + element.id + "' >" + space + style + element.name + "</option>"
                );
            }
        }
        if(element.child)
        {
            subRecursionForSubjects(element.child, counter + 1, char);
        }

    });
}

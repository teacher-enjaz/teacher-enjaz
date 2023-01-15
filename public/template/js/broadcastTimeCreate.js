$(document).ready(function ()
{
    $('select[name="grade_id"]').on('change',function (e) {
        var grade_id = $(this).val();
        if(grade_id)
        {
            $.ajax({
                url: '/broadcast-times/getSubjects/'+grade_id,
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
                        $('select[name="subject_id"]').append('<option label="اختر المبحث من فضلك"></option>');
                        // Read data and create <option >
                        subRecursionForObject(response['data'], 0, '-');
                    }
                }
            });
        }
        else {
            $('select[name="subject_id"]').empty();
        }
    });
});
/*********************************************************************************/

function subRecursionForObject(data,counter,char)
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
                $('select[name="subject_id"]').append(
                    "<option value='" + element.id + "' style='color: black;' >" + element.name_ar + "</option>"
                );
            }
            else
            {
                $('select[name="subject_id"]').append(
                    "<option value='" + element.id + "' >" + space + style + element.name_ar + "</option>");
            }
        }
        if(element.child)
        {
            subRecursionForObject(element.child, counter + 1, char);
        }
    });
}
/*********************************************************************************/
$(document).ready(function()
{
    var select = document.getElementById('program_category_id');
    select.onchange = function()
    {
        var text = select.options[select.selectedIndex].text;
        if(text === 'الدروس المصورة')
        {
            $("#grade").show();
            $("#subject").show();
            $("#program").hide();
        }
        else if(text === 'البرامج')
        {
            $("#grade").hide();
            $("#subject").hide();
            $("#program").show();
        }
        else
        {
            $("#grade").hide();
            $("#subject").hide();
            $("#program").hide();
        }
    }
});

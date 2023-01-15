/***
 * script to get Directorate related to GeoPlace
 */
$(document).ready(function () {
    $('select[name="geoPlace_id"]').on('change',function (e)
    {
        var lang = $(this).data('lang');
        //var locale =  config('app.locale');
        var geoPlace_id = $(this).val();
        if(geoPlace_id)
        {
            $.ajax({
                url: '/getDirectorates/'+geoPlace_id,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    /*console.log(data);*/
                    $('select[name="directorate_id"]').empty();
                    $('select[name="directorate_id"]').focus();
                    var len = 0;
                    if(response['data'] != null){
                        len = response['data'].length;
                    }

                    if(len > 0){
                        var name_ar,name_en,option;

                        if(lang == 'ar')
                        {
                            $('select[name="directorate_id"]').append('<option label="اختر المديرية من فضلك"></option>');
                        }
                        else
                        {
                            $('select[name="directorate_id"]').append('<option label="Select Directorate Please"></option>');

                        }
                        // Read data and create <option >
                        for(var i=0; i<len; i++){

                            var id = response['data'][i].id;
                            if(lang == 'ar')
                            {
                                name_ar = response['data'][i].name_ar;
                                option = "<option value='"+id+"'>"+name_ar+"</option>";
                            }
                            else
                            {
                                name_en = response['data'][i].name_en;
                                option = "<option value='"+id+"'>"+name_en+"</option>";
                            }
                            $('select[name="directorate_id"]').append(option);

                        }
                    }
                }
            });
        }
        else {
            $('select[name="directorate_id"]').empty();
        }
    });
});

/***
 * script to get School related to directorate
 */
/*$(document).ready(function () {
    $('select[name="directorate_id"]').on('change',function (e)
    {
        var lang = $(this).data('lang');
        //var locale =  config('app.locale');
        var directorate_id = $(this).val();
        if(directorate_id)
        {
            $.ajax({
                url: '/getSchools/'+directorate_id,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    /!*console.log(data);*!/
                    $('select[name="school_id1"]').empty();
                    $('select[name="school_id1"]').focus();
                    var len = 0;
                    if(response['data'] != null){
                        len = response['data'].length;
                    }

                    if(len > 0){
                        var name_ar,name_en,option;

                        if(lang == 'ar')
                        {
                            $('select[name="school_id1"]').append('<option label="اختر المدرسة من فضلك"></option>');
                        }
                        else
                        {
                            $('select[name="school_id1"]').append('<option label="Select School Please"></option>');

                        }
                        // Read data and create <option >
                        for(var i=0; i<len; i++){

                            var id = response['data'][i].id;
                            if(lang == 'ar')
                            {
                                name_ar = response['data'][i].name_ar;
                                option = "<option value='"+id+"'>"+name_ar+"</option>";
                            }
                            else
                            {
                                name_en = response['data'][i].name_en;
                                option = "<option value='"+id+"'>"+name_en+"</option>";
                            }
                            $('select[name="school_id1"]').append(option);

                        }
                    }
                }
            });
        }
        else {
            $('select[name="school_id1"]').empty();
        }
    });
});*/

/***************************************************************************************/
$(document).ready(function () {
    $('select[name="directorate_id"]').on('change',function (e)
    {
        var lang = $(this).data('lang');
        //var locale =  config('app.locale');
        var directorate_id = $(this).val();
        if(directorate_id)
        {
            $.ajax({
                url: '/getSchools/'+directorate_id,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    /*console.log(data);*/
                    $('select[name="school_id"]').empty();
                    $('select[name="school_id"]').focus();
                    var len = 0;
                    if(response['data'] != null){
                        len = response['data'].length;
                    }

                    if(len > 0){
                        var name_ar,name_en,option;

                        if(lang == 'ar')
                        {
                            $('select[name="school_id"]').append('<option label="اختر المدرسة من فضلك"></option>');
                        }
                        else
                        {
                            $('select[name="school_id"]').append('<option label="Select School Please"></option>');

                        }
                        // Read data and create <option >
                        for(var i=0; i<len; i++){

                            var id = response['data'][i].id;
                            if(lang == 'ar')
                            {
                                name_ar = response['data'][i].name_ar;
                                option = "<option value='"+id+"'>"+name_ar+"</option>";
                            }
                            else
                            {
                                name_en = response['data'][i].name_en;
                                option = "<option value='"+id+"'>"+name_en+"</option>";
                            }
                            $('select[name="school_id"]').append(option);

                        }
                    }
                }
            });
        }
        else {
            $('select[name="school_id"]').empty();
        }
    });
});

/**********************************************************************************************************************/
$(document).ready(function ()
{
    $('input:radio[name="userType"]').on('change',function () {
        if(this.checked && this.value =='1')
        {
            $('#teacher').hide();
            $('#supervisor').show();
        }
        else if(this.checked && this.value =='2')
        {
            $('#supervisor').hide();
            $('#teacher').show();
        }
    });
});

/********************************************************************************************************/
$(document).ready(function()
{
    $('#permissionsList').hide();
    $('select[name="role"]').on('change',function (e)
    {
        var role = $(this).find(':selected')
        var role_slug = role.data('role-slug');
        if(role_slug =='supervisor')
        {
            $('#teacher').hide();
            $('#supervisor').show();
        }
        else if(role_slug =='teacher')
        {
            $('#supervisor').hide();
            $('#teacher').show();
        }
        else
        {
            $('#supervisor').hide();
            $('#teacher').hide();
        }
    });
});
/************************************************************/



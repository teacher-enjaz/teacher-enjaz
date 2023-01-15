/******************************************************************************************/
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
                    else
                    {
                        if(lang == 'ar')
                        {
                            $('select[name="directorate_id"]').append('<option label="لا توجد مديريات مضافة"></option>');
                        }
                        else
                        {
                            $('select[name="directorate_id"]').append('<option label="No Directorates Added"></option>');
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

/***********************************************************************/
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

                    if(len > 0)
                    {
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
                    else
                    {
                        if(lang == 'ar')
                        {
                            $('select[name="school_id"]').append('<option label="لا توجد مدارس مضافة"></option>');
                        }
                        else
                        {
                            $('select[name="school_id"]').append('<option label="No Schools Added"></option>');
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


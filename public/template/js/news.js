/***
 * script to get School related to directorate
 */
$(document).ready(function () {
    $('select[name="directorate_id"]').on('change',function (e) {
        var dir_id = $(this).val();
        if(dir_id)
        {
            $.ajax({
                url: 'getSchools/'+dir_id,
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
                        $('select[name="school_id"]').append('<option label="اختر المدرسة من فضلك"></option>');
                        // Read data and create <option >
                        for(var i=0; i<len; i++){

                            var id = response['data'][i].id;
                            var name = response['data'][i].name;
                            var option = "<option value='"+id+"'>"+name+"</option>";

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

$(document).ready(function(){
    $('#title').keyup(function(e){
        var str = $('#title').val();
        str = str.replace(/\s+/g, '-');//rplace stapces with dash
        $('#slug').val(str);
        $('#slug').attr('placeholder', str);
    });
});

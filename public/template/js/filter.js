/**
 * ************************************************ on loading show all resources ************************************************
 */
    $(document).ready(function ()
    {
        $('.all').addClass('active')
        $('.all-resource').show();
        $('.resource').show();
        $('#all-lesson-resource').hide();
        const url = new URL(window.location.href);
        var hash_value = url.hash;
        if(hash_value == '#cards')
        {
            $('.link').removeClass('active');
            $('.cards').addClass('active')
            $('.resource').hide();
            $('.all-resource').show();
            $('#all-lesson-resource').hide();
            $('#cards').show();
        }
        else if(hash_value == '#videos')
        {
            $('.link').removeClass('active');
            $('.videos').addClass('active');
            $('.resource').hide();
            $('.all-resource').show();
            $('#all-lesson-resource').hide();
            $('#videos').show();
        }
        else if(hash_value == '#books')
        {
            $('.link').removeClass('active');
            $('.books').addClass('active')
            $('.resource').hide();
            $('.all-resource').show();
            $('#all-lesson-resource').hide();
            $('#books').show();
        }
        else if(hash_value == '#files')
        {
            $('.link').removeClass('active');
            $('.files').addClass('active')
            $('.resource').hide();
            $('.all-resource').show();
            $('#all-lesson-resource').hide();
            $('#files').show();
        }
        else if(hash_value == '#all')
        {
            $('.link').removeClass('active');
            $('.link').show();
            $('.all').addClass('active')
            $('#all-lesson-resource').hide();
            $('.all-resource').show();
            $('.resource').show();
            /*$('#grade_data').show();
            console.log(document.querySelector('#files').getAttribute('data-count'))


            if(document.querySelector('#files').getAttribute('data-count') === 1)
                $('.resource#files').show();
            else
                $('.resource#files').hide();
            if(document.querySelector('#cards').getAttribute('data-count') === 1)
                $('#cards').show();
            else
                $('#cards').hide();
            if(document.querySelector('#videos').getAttribute('data-count') === 1)
                $('#videos').show();
            else
                $('#videos').hide();
            if(document.querySelector('#books').getAttribute('data-count') === 1)
                $('#books').show();
            else
                $('#books').hide();*/
        }
    });
/**
 * *****************************************  show/hide resource section on link click ********************************
 */
    $('[func=btnLink]').click(function () {
        //var count = document.querySelector('#cards').getAttribute('data-count')
        $('.link').removeClass('active');
        var type = $(this).data('type')

    if (type == "all")
    {
        $('.link').removeClass('active');
        $('.link').show();
        $('.all').addClass('active')
        $('#all-lesson-resource').hide();
        $('.all-resource').show();
        /*$('.resource').show();*/

        console.log(document.querySelector('#files').getAttribute('data-count'))
        if(document.querySelector('#files').getAttribute('data-count') == 1)
            $('#files').show();
        else {
            $('#files').hide();
            $('.files').hide();
        }
        if(document.querySelector('#cards').getAttribute('data-count') == 1)
            $('#cards').show();
        else {
            $('#cards').hide();
            $('.cards').hide();
        }
        if(document.querySelector('#videos').getAttribute('data-count') == 1)
            $('#videos').show();
        else {
            $('#videos').hide();
            $('.videos').hide();
        }
        if(document.querySelector('#books').getAttribute('data-count') == 1)
            $('#books').show();
        else {
            $('#books').hide();
            $('.books').hide();
        }
    }
    else if (type == "cards")
    {
        $('.link').removeClass('active');
        $('.cards').addClass('active')
        $('.resource').hide();
        $('.all-resource').show();
        $('#all-lesson-resource').hide();
        $('#cards').show();
    }
    else if (type == "files")
    {
        $('.link').removeClass('active');
        $('.files').addClass('active')
        $('.resource').hide();
        $('.all-resource').show();
        $('#all-lesson-resource').hide();
        $('#files').show();
    }
    else if (type == "videos")
    {
        $('.link').removeClass('active');
        $('.videos').addClass('active');
        $('.resource').hide();
        $('.all-resource').show();
        $('#all-lesson-resource').hide();
        $('#videos').show();
    }
    else if (type == "books")
    {
        $('.link').removeClass('active');
        $('.books').addClass('active')
        $('.resource').hide();
        $('.all-resource').show();
        $('#all-lesson-resource').hide();
        $('#books').show();
    }
});
/**
 * ***************************************** show all resources for selected lesson ************************************
 */
    function lessonLink(id)
    {
        $('.all-resource').hide();
        $('#all-lesson-resource').show();

        $('.link').hide();
        $('.all').show();

        var grade= $('#title'+id).data('grade')
       // $('.link').removeClass('active');
        $('.lesson-label').removeClass('active');
        $('#less-title').addClass('active');
        $.ajax({
            url: '/getResources/'+id+'/'+grade,
            type: 'GET',
            dataType: 'json',
            success: function (data)
            {
                $('#all-lesson-resource').empty();
                $('#all-lesson-resource').html(data.html);
            }
        });
    }

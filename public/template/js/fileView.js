
/**********************************************************************************************************************/
/**
 * create history for file
 */
$('[func=reportFile]').click(function ()
{
    var note= $(this).data('note');
    var type= $(this).data('type');
    var id= $(this).data('id');

    if(type === 'message')
    {
        $.ajax({
            url: "createResourceReport/"+note+'/'+id,
            type: "GET",
            dataType: 'application/json',
            statusCode:
                {
                    200: function (success)
                    {
                        swal
                        ({
                            text: "تم الإبلاغ عن الملف بنجاح",
                            icon: "success",
                            buttons:{confirm:'موافق'},
                            closeModal: true,
                        });
                    }
                }
        });
    }
    else if(type === 'input')
    {
        swal("سجل ملاحظتك على الملف:", {
            content: "input",
            buttons:{confirm:'موافق'},
        })
        .then((inputValue) =>
        {
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal("الملاحظة مطلوبة");
                return false
            }
            $.ajax({
                type: "GET",
                dataType: "application/json",
                url: "/createResourceReportInput/"+inputValue+'/'+id,
                statusCode:
                {
                    200: function (success) {
                        swal
                        ({
                            text: "تم الإبلاغ عن الملف بنجاح",
                            icon: "success",
                            buttons:{confirm:'موافق'},
                            closeModal: true,
                        });
                    }
                }
            });
        });
    }
});
/**
 **** show videoLesson Youtube link  in iframe for video-file page
 */


$('[func=showFile]').click(function ()
{
    var file_id = $(this).data('id');
    $('.item-eCard-video').removeClass('active');
    $('.file-view'+file_id).addClass('active');
    var url = $(this).data('url');
    var description = $(this).data('description');
    var iframe = document.getElementById("fileFrame");
    iframe.src = url+'#toolbar=0';
    var html='<h4 class="my-auto color_home size-18  " >' +
        '<span class="size-16">' +description +'</span>' +
        '</h4>' +
        '<div class="rounded float-right d-flex me-2 my-auto">' +
        '<span class="bk_home_color rounded  d-flex"  ></span>' +
        '<span class="green rounded  d-flex" ></span>' +
        '</div>';
    $('#showFirstFile').hide();
    $('#audio').hide();
    $('#imageDiv').hide();
    $('#rarDiv').hide();
    $('#office').hide();
    $('#showFiles').show();
    $('#file').show();
    $('#fileDescription').empty();
    $('#fileDescription').append(html);
});

$('[func=showAudio]').click(function ()
{
    var file_id = $(this).data('id');
    $('.item-eCard-video').removeClass('active');
    $('.file-view'+file_id).addClass('active');
    var url = $(this).data('url');
    var description = $(this).data('description');
    var audio = document.getElementById("audioFrame");
    audio.src = url+'#toolbar=0';
    var html='<h4 class="my-auto color_home size-18  " >' +
        '<span class="size-16">' +description +'</span>' +
        '</h4>' +
        '<div class="rounded float-right d-flex me-2 my-auto">' +
        '<span class="bk_home_color rounded  d-flex"  ></span>' +
        '<span class="green rounded  d-flex" ></span>' +
        '</div>';
    $('#showFirstFile').hide();
    $('#imageDiv').hide();
    $('#rarDiv').hide();
    $('#file').hide();
    $('#office').hide();
    $('#showFiles').show();
    $('#audio').show();
    $('#audioDescription').empty();
    $('#audioDescription').append(html);
});

$('[func=showImage]').click(function ()
{
    var file_id = $(this).data('id');
    $('.item-eCard-video').removeClass('active');
    $('.file-view'+file_id).addClass('active');
    var url = $(this).data('url');
    var description = $(this).data('description');
    var image = document.getElementById("imageFrame");
    image.src = url;
    var html='<h4 class="my-auto color_home size-18  " >' +
        '<span class="size-16">' +description +'</span>' +
        '</h4>' +
        '<div class="rounded float-right d-flex me-2 my-auto">' +
        '<span class="bk_home_color rounded  d-flex"  ></span>' +
        '<span class="green rounded  d-flex" ></span>' +
        '</div>';
    $('#showFirstFile').hide();
    $('#audio').hide();
    $('#rarDiv').hide();
    $('#file').hide();
    $('#office').hide();
    $('#showFiles').show();
    $('#imageDiv').show();
    $('#imageDescription').empty();
    $('#imageDescription').append(html);
});
$('[func=showRar]').click(function ()
{

    var file_id = $(this).data('id');
    $('.item-eCard-video').removeClass('active');
    $('.file-view'+file_id).addClass('active');
    var url = $(this).data('url');
    var description = $(this).data('description');
    var html='<h4 class="my-auto color_home size-18  " >' +
        '<span class="size-16">' +description +'</span>' +
        '</h4>' +
        '<div class="rounded float-right d-flex me-2 my-auto">' +
        '<span class="bk_home_color rounded  d-flex"  ></span>' +
        '<span class="green rounded  d-flex" ></span>' +
        '</div>';
    $('#showFirstFile').hide();
    $('#imageDiv').hide();
    $('#audio').hide();
    $('#file').hide();
    $('#office').hide();
    $('#showFiles').show();
    $('#rarDiv').show();
    $('#rarDescription').empty();
    $('#rarDescription').append(html);
});

$('[func=showVideo]').click(function () {

    var file_id = $(this).data('id');
    $('.item-eCard-video').removeClass('active');
    $('.file-video'+file_id).addClass('active');
    var url = $(this).data('url');
    var description = $(this).data('description');
    var type = $(this).data('type');
    if(type ==='google' || type ==='youtube')
    {
        var iframe = document.getElementById("videoFrame");
        iframe.src = url;
        $('#linkList').hide();
        $('#videoFrame').show();
    }
    else if(type ==='link')
    {
        $("#linkDiv").prop("href", url);
        $("#linkLabel").text(description);
        $('#videoFrame').hide();
        $('#linkList').show();
    }
    var html='<h4 class="my-auto color_home size-18  " >' +
        '<span class="size-16">' +description +'</span>' +
        '</h4>' +
        '<div class="rounded float-right d-flex me-2 my-auto">' +
        '<span class="bk_home_color rounded  d-flex"  ></span>' +
        '<span class="green rounded  d-flex" ></span>' +
        '</div>';

    $('#videos').show();
    $('#files').hide();
    $('#office').hide();
    $('#videoDescription').empty();
    $('#videoDescription').append(html);
});

$('[func=showOffice]').click(function ()
{
    var file_id = $(this).data('id');
    $('.item-eCard-video').removeClass('active');
    $('.file-view'+file_id).addClass('active');
    var url = $(this).data('url');
    var description = $(this).data('description');
    var iframe = document.getElementById("officeFrame");
    iframe.src = 'https://view.officeapps.live.com/op/embed.aspx?src='+url;
    var html='<h4 class="my-auto color_home size-18  " >' +
        '<span class="size-16">' +description +'</span>' +
        '</h4>' +
        '<div class="rounded float-right d-flex me-2 my-auto">' +
        '<span class="bk_home_color rounded  d-flex"  ></span>' +
        '<span class="green rounded  d-flex" ></span>' +
        '</div>';
    $('#showFirstFile').hide();
    $('#audio').hide();
    $('#imageDiv').hide();
    $('#rarDiv').hide();
    $('#file').hide();
    $('#showFiles').show();
    $('#office').show();
    $('#officeDescription').empty();
    $('#officeDescription').append(html);
});

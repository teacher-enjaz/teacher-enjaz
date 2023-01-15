/**
 * show card-side-view for first card on loading
 */
$(document).ready(function ()
{
    var card_id = $('.card-side-view').data('cardid');
    $('#side-view'+card_id).show();
});

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
            url: "/createResourceReport/"+note+'/'+id,
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

$('[func=showVideo]').click(function () {

    var file_id = $(this).data('id');
    $('.item-eCard-video').removeClass('active');
    $('.file-video'+file_id).addClass('active');
    var url = $(this).data('url');
    var description = $(this).data('description');
    var iframe = document.getElementById("videoFrame");
    iframe.src = url;

    var html='<h4 class="my-auto color_home size-18  " >' +
        '<span class="size-16">' +description +'</span>' +
        '</h4>' +
        '<div class="rounded float-right d-flex me-2 my-auto">' +
        '<span class="bk_home_color rounded  d-flex"  ></span>' +
        '<span class="green rounded  d-flex" ></span>' +
        '</div>';

    $('#videos').show();
    $('#files').hide();
    $('#links').hide();
    $('#goals').hide();
    $('#videoDescription').empty();
    $('#videoDescription').append(html);
});


$('[func=showGoals]').click(function () {

    var card_id = $(this).data('id');
    $('.item-eCard-video').removeClass('active');
    $('.card-goal'+card_id).addClass('active');
    var goals = $(this).data('goals');
    var title = $(this).data('title');

    var html='<div class=" d-flex justify-content-start mb-3"><h4 class="my-auto color_home size-18  " >'+ title +'</h4>'+
        '<div class="rounded float-right d-flex me-2 my-auto">'+
        '<span class="bk_home_color rounded  d-flex"  ></span>'+
        '<span class="green rounded  d-flex" ></span>'+
        '</div></div><h3 class="size-14 text-gr">'+goals+'</h3>';

    $('#videos').hide();
    $('#files').hide();
    $('#links').hide();
    $('.card-side-view').hide();
    $('#side-view'+card_id).show();
    $('#goals').show();
    $('#goals').empty();
    $('#goals').append(html);
});

$('[func=showLinks]').click(function () {

    var card_id = $(this).data('id');
    $('.item-eCard-video').removeClass('active');
    $('.card-link'+card_id).addClass('active');
    var links = $(this).data('links');
    var title = $(this).data('title');
    var html1,html2;
    console.log(links)
    if(links.length != 0)
    {
        html1='<div class=" d-flex justify-content-start ">'+
            '<h4 class="my-auto color_home size-18  " >'+title+'</h4>'+
            '<div class="rounded float-right d-flex me-2 my-auto">'+
            '<span class="bk_home_color rounded  d-flex"  ></span>'+
            '<span class="green rounded  d-flex" ></span>'+
            '</div></div><ul class="list-group links_lib pe-3 mt-2 ">';

        $.each(links, function(index, element)
        {
            if(element != null)
            {
                html1+=
                    '<li class="d-flex justify-content-start my-2">' +
                    '<a href = "'+element.name+'" class="size-14 text-gr" target="_blank"><i class="fa fa-chevron-left color_home size-11 ms-2"></i>'+element.description+'</a>' +
                    '</li>';
            }
        });
        html1 +='</ul>';
    }
    else
    {
        html1='<div class=" d-flex justify-content-start ">'+
            '<h4 class="my-auto color_home size-18  " >لا توجد روابط مضافة</h4>'+
            '<div class="rounded float-right d-flex me-2 my-auto">'+
            '<span class="bk_home_color rounded  d-flex"  ></span>'+
            '<span class="green rounded  d-flex" ></span>'+
            '</div></div>';
    }

    $('#goals').hide();
    $('#videos').hide();
    $('#files').hide();
    $('#links').show();
    $('#links').empty();
    $('#links').append(html1);
});

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

    $('#files').show();
    $('#videos').hide();
    $('#links').hide();
    $('#goals').hide();
    $('#fileDescription').empty();
    $('#fileDescription').append(html);
});

function LikeCard(x,resource_id)
{
    var status = $('#likeFile'+resource_id).data('sfile');
    var count = $('#likeFile'+resource_id).data('count');
    var total = $('#totalLike').data('total');
    var span = '<span class="size-12"> إعجاب </span>';
    var newStatus;
    if(status === '')
    {
        $('#likeFile'+resource_id).removeClass("fa-heart-o");
        x.classList.toggle("fa-heart");
        $('#likeFile'+resource_id).data('sfile',1);
        $('#likeFile'+resource_id).data('count',count + 1);
        $('#totalLike').data('total',total + 1);
        newStatus = $('#likeFile'+resource_id).data('sfile');

        $.ajax({
            url: "like-file/"+resource_id,
            type: "GET",
            success: function(success){
                $('#likesCount'+resource_id).empty();
                $('#totalLike').empty();
                $('#likesCount'+resource_id).text(count + 1);
                $('#likesCount'+resource_id).append(span);
                $('#totalLike').text(total + 1);
                $('#totalLike').append(span);
            }
        });
    }
    else if(status === 1)
    {
        $('#likeFile'+resource_id).removeClass("fa-heart");
        x.classList.toggle("fa-heart-o");
        $('#likeFile'+resource_id).data('sfile','');
        $('#likeFile'+resource_id).data('count',count - 1);
        $('#totalLike').data('total',total - 1);
        console.log($('#likeFile'+resource_id).data('sfile'))

        $.ajax({
            type: "GET",
            url: 'disLike-file/'+resource_id,
            success: function(success){
                $('#likesCount'+resource_id).empty();
                $('#totalLike').empty();
                $('#likesCount'+resource_id).text(count -1);
                $('#likesCount'+resource_id).append(span);
                $('#totalLike').text(total - 1);
                $('#totalLike').append(span);
            }
        });
    }
}

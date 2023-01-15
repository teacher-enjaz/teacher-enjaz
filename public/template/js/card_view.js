$('.play-icon').click(function () {

    var id =$(this).attr('data-id');
    var cardid =$(this).attr('data-cardid');

    $('.title').removeClass('active');
    $('#video-title'+cardid+id).addClass('active');
    $('.show'+cardid).removeClass('active');
    $(this).addClass('active');
    var video ='<iframe class="iframe-content'+cardid+' my-1" id=""  src="' + $(this).attr('data-video')+ '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
    $('.iframe-content'+cardid).replaceWith(video);
});
window.onload=icrementView(window.location.href);

function icrementView(url)
{
    var path = new URL(url);
    path=path.toString();
    var id =path[path.length-1];

}


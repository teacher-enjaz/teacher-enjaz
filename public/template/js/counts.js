let data_count = 0;
/** count book download **/
function downloadCard(file_id)
{
    var a = document.createElement("a");
    //var fileName = $('#download-btn'+file_id).data('name');
    var fileName = $('#download-btn').data('name');
    //var fileUrl = $('#download-btn').data('path');
    var fileUrl = $('#download-btn').data('path');
    var span = '<span class="size-12">تنزيل</span>';
    var session = $('#download-btn').data('session');
    var resource_id = $('#download-btn').data('resourceid');
    var total = $('#totalCount').data('total');
    var count = $('#downloadCount'+resource_id).data('count');
    console.log(fileUrl)
    a.href = fileUrl;
    a.setAttribute("download", fileName);
    a.click();
    if(file_id)
    {
        $.ajax({
            url: "/ResourceCardDownload/"+file_id,
            type: "GET",
            dataType: 'application/json',
            statusCode:
                {
                    200: function (success)
                    {
                        if(session === '')
                        {
                            /*$('#download-btn').attr('data-session', 1);
                            $('#downloadCount'+resource_id).data('count', count+1);
                            $('#totalCount').data('total', total+1);
                            $('#downloadCount'+resource_id).empty();
                            $('#downloadCount'+resource_id).text(count+1);
                            $('#downloadCount'+resource_id).append(span);
                            $('#totalCount').empty();
                            $('#totalCount').text(total+1);
                            $('#totalCount').append(span);*/
                            console.log('hello')
                        }
                        else if(session === 1)
                        {

                        }

                    }
                }
        });
    }
}
function downloadBook(resource_id)
{
    var a = document.createElement("a");
    var fileName = $('#download-btn'+resource_id).data('name');
    var id = $('#download-btn'+resource_id).data('id');
    var fileUrl = $('#download-btn'+resource_id).data('path');
    var count = $('#download-btn'+resource_id).data('count');
    var session = $('#download-btn'+id).data('session');
    var span = '<span class="size-12">تنزيلات</span>';
    a.href = fileUrl;
    a.setAttribute("download", fileName);
    a.click();
    if(id)
    {
        $.ajax({
            url: "/ResourceBookDownload/"+resource_id,
            type: "GET",
            dataType: 'application/json',
            statusCode:
            {
                200: function (success)
                {
                    if(!session)
                    {
                        $('#bookDownload'+resource_id).empty();
                        $('#bookDownload'+resource_id).text(count+1);
                        $('#downloadCount'+resource_id).append(span);
                    }
                }
            }
        });
    }
}
/** count File Material download **/
function downloadFile(file_id)
{
    var a = document.createElement("a");
    var fileName = $('#download-btn'+file_id).data('name');
    var fileUrl = $('#download-btn'+file_id).data('path');
    var span = '<span class="size-12">تنزيل</span>';
    var session = $('#download-btn'+file_id).data('session');
    var total = $('#downloadCount').data('total');
    console.log(session)
    a.href = fileUrl;
    a.setAttribute("download", fileName);
    a.click();
    if(file_id)
    {
        $.ajax({
            url: "/ResourceFileDownload/"+file_id,
            type: "GET",
            dataType: 'application/json',
            statusCode:
            {
                200: function (success)
                {
                    if(session === '')
                    {
                        $('#download-btn'+file_id).data('session', 1);
                        $('#downloadCount').data('total', total+1);
                        $('#downloadCount').empty();
                        $('#downloadCount').text(total+1);
                        $('#downloadCount').append(span);
                        console.log('hello')
                    }
                    else if(session === 1)
                    {

                    }

                }
            }
        });
    }
}

function LikeFile(x,resource_id) {
    var status = $('#likeFile').data('sfile');
    var count = $('#likeFile').data('count');
    var span = '<span class="size-12"> إعجاب </span>';
    var newStatus;
    if(status === '')
    {
        $('#likeFile').removeClass("fa-heart-o");
        x.classList.toggle("fa-heart");
        $('#likeFile').data('sfile',1);
        $('#likeFile').data('count',count + 1);
        newStatus = $('#likeFile').data('sfile');
        $.ajax({
            url: "/fileView/like-file/"+resource_id,
            type: "GET",
            success: function(success){
                $('#likeCount').empty();
                $('#likeCount').text(count + 1);
                $('#likeCount').append(span);
            }
        });
    }
    else if(status === 1)
    {
        $('#likeFile').removeClass("fa-heart");
        x.classList.toggle("fa-heart-o");
        $('#likeFile').data('sfile','');
        $('#likeFile').data('count',count - 1);
        $.ajax({
            type: "GET",
            url: '/fileView/disLike-file/'+resource_id,
            success: function(success){
                $('#likeCount').empty();
                $('#likeCount').text(count - 1);
                //$('#likeCount').append(span);
            }
        });
    }
}

function FollowUser(x,user_id) {
    var status = $('#likeUser').data('suser');
    var count = $('#likeUser').data('count');
    var followers = '<small class="size-12" > متابع </small>'
    var newStatus;
    if(status === '')
    {
        $.ajax({
            url: "/user-profile/follow-user/"+user_id,
            type: "GET",
            success: function(success){
               // count2++;
                $('#likeUser').removeClass("fa-heart-o");
                x.classList.toggle("fa-heart");
                $('#likeUser').data('suser',1);
                newStatus = $('#likeUser').data('suser');
                $('#likeCount').empty();
                $('#likeCount').text(count +1);
                $('#likeCount').append(followers);
            }
        });
    }
    else if(status === 1)
    {
        $.ajax({
            type: "GET",
            url: '/user-profile/unFollow-user/'+user_id,
            success: function(success){
                //count2--;
                $('#likeUser').removeClass("fa-heart");
                x.classList.toggle("fa-heart-o");
                $('#likeUser').data('suser','');
                $('#likeCount').empty();
                $('#likeCount').text(count - 1);
                $('#likeCount').append(followers);
            }
        });
    }
}








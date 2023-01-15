/**
 * show file modal with control buttons
 */

$('[func=btnShow]').click(function ()
{
    $('#contentModal').empty();
    $('.modal-header').empty();
    var modalInfo = $('#exampleModal');
    modalInfo.modal();
    var fileURL= $(this).data('fileurl');
    var fileID= $(this).data('id');
    var resource= $(this).data('resource');
    var type= $(this).data('type');
    var drive= $(this).data('drive');
    var fileUser= $(this).data('fileuser');
    var userID= $(this).data('userid');
    var slug= $(this).data('slug');
    var mime= $(this).data('mime');
    var editURL,deleteURL;
    var control,html;

    if(drive === 'google')
    {
        html = '<div class="row h-480px embed-responsive embed-responsive-16by9 py-2 ">'+
            '<iframe class="col-12 embed-responsive-item mx-auto" src="'+fileURL+'"></iframe>'+
            '</div>';
    }
    else if(mime === 'docx' || mime === 'pptx' || mime === 'xlsx' || mime === 'doc' || mime === 'ppt' || mime === 'xls')
    {
        html = '<div class="row h-480px embed-responsive embed-responsive-16by9 py-2 ">'+
            '<iframe class="col-12 embed-responsive-item mx-auto" src="https://view.officeapps.live.com/op/embed.aspx?src='+fileURL+'"></iframe>'+
            '</div>';
    }
    else if(mime === 'zip' || mime === 'rar')
    {
        html = '<div class="row embed-responsive embed-responsive-16by9 py-2">'+
            '<img class="w-25 h-50 col-5 embed-responsive-item mx-auto align-content-center"  src="/rawafed/assent/imgs/nofound.png">' +
            '<div class="row justify-content-center mt-3">'+
            '<span class="col-5 badge link_subject my-auto rounded-pill py-1 px-2 me-1" style="height:25px;line-height: 13px;' +
            'font-size: 15px;">لا تتوفر معاينة لهذا الملف</span>' +
            '</div>'+
            '</div>';
    }
    else if(mime === 'link')
    {
        html = '<div class="row embed-responsive embed-responsive-16by9 py-2 ">'+
            '<ul class="list-group links_lib " >'+
            '<li class="d-flex justify-content-start my-2">' +
            '<a href ="'+fileURL+'" class="size-10 text-gr" target="_blank" >'+
            '<i class="fa fa-chevron-left color_home "></i> لا تتوفر معاينة لهذا الرابط .. انقر لفتحه</a></li></ul>'+
            '</div>';
    }
    else
    {
        html = '<div class="row h-480px embed-responsive embed-responsive-16by9 py-2 ">'+
            '<iframe class="col-12 embed-responsive-item mx-auto" src="'+fileURL+'#toolbar=0"></iframe>'+
            '</div>';
    }

    $('#contentModal').empty();
    $('#contentModal').append(html);

    if(type === 'file-materials')
    {
        editURL=window.location.origin+"/file-materials/edit/"+fileID;
        deleteURL=window.location.origin+"/file-materials/trash";
    }
    if(type === 'video-lessons')
    {
        editURL= window.location.origin+"/video-lessons/edit/"+fileID;
        deleteURL=window.location.origin+"/video-lessons/trash/"+resource;
    }
    if(type === 'e-cards')
    {
        editURL= window.location.origin+"/e-cards/editStep1/"+fileID;
        deleteURL=window.location.origin+"/e-cards/trash/"+resource;
    }
    if(type === 'books')
    {
        editURL= window.location.origin+"/books/edit/"+fileID;
        deleteURL=window.location.origin+"/books/trash/"+resource;
    }
    if(fileUser === userID || slug === 'super-admin')
    {
        control=
            '<a target="_blank" href="'+editURL+'" class=" btn_icon rounded-circle d-flex  justify-content-center ">'+
            '<i class="fa fa-edit m-auto"></i></a>'+
            '<a href="#" class="btn_icon rounded-circle d-flex justify-content-center" id="btnDelete" data-id="'+resource+'" ' +
            'onclick="deleteFun(\''+deleteURL+'\',\''+type+'\');" type="button">'+
            '<i class="fa fa-trash-o m-auto"></i>' +
            '</a>'+
            '<a onclick="closeModal()" class="btn_icon rounded-circle d-flex  justify-content-center">'+
            '<i class="fa fa-times-circle m-auto"></i>'+
            '</a>';
    }
    else
    {
        control=
            '<a onclick="closeModal()" class="btn_icon rounded-circle d-flex  justify-content-center">'+
            '<i class="fa fa-times-circle m-auto"></i>'+
            '</a>';
    }
    $('.modal-header').append(control);
});
function closeModal()
{
    $('#exampleModal').modal('hide');
}
function deleteFun(deleteURL,type)
{
    $('#exampleModal').modal('hide');
    var id = $('#btnDelete').data('id');
    if(type === 'file-materials')
    {
        swal("أدخل سبب الحذف:", {
            content: "input",
        })
            .then((inputValue) =>
            {
                if (inputValue === false) return false;
                if (inputValue === "") {
                    swal("سبب الحذف مطلوب");
                    return false
                }
                $.ajax({
                    type: "GET",
                    dataType: "application/json",
                    url: deleteURL+'/' + id + "/" + inputValue,
                    statusCode:
                        {
                            200: function (success) {
                                swal
                                ({
                                    text: "تم حذف الملف بنجاح",
                                    icon: "success",
                                    buttons:{confirm:'موافق'},
                                    closeModal: true,
                                });
                                window.setTimeout(function(){
                                    location.reload();
                                } ,2000);
                            }
                        }
                });
            });
    }
    else
    {
        swal({
            text: "هل تريد الحذف بالتأكيد؟.",
            icon: "warning",
            buttons: ['إلغاء','موافق'],
            dangerMode: true,
        })
            .then((isConfirm) =>
            {
                if (isConfirm) {
                    $.ajax({
                        type: "GET",
                        dataType: "application/json",
                        url: deleteURL,
                        statusCode:
                            {
                                200: function (success) {
                                    swal
                                    ({
                                        text: "تم حذف الملف بنجاح",
                                        icon: "success",
                                        buttons:{confirm:'موافق'},
                                        dangerMode:true
                                    });
                                    window.setTimeout(function(){
                                        location.reload();
                                    } ,2000);
                                }
                            }
                    });
                }
                else
                {
                    swal({
                        text: "تم إلغاء حذف الملف بنجاح",
                        icon:'error',
                        confirmButtonText: "موافق",
                        dangerMode:true
                    });
                }
            });
    }
}



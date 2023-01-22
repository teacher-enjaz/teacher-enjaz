/************************************************************************************************************/
/**
 * data table script
 */
$(document).ready( function () {
    const table = $('#sampleTable').DataTable(
        {
            searching: true,
            responsive: true,
            paging: true,
            //scrollY: 400,
            info: false,
            processing: true,
            //serverSide: true,
            ordering: true,
            lengthMenu: [
                [5, 10, 15, -1],
                ['5', '10', '15', 'الكل']
            ],
            language: {
                "search": "بحث : ",
                "lengthMenu": "مشاهدة _MENU_ السجلات",
                "zeroRecords": "نأسف! لا يوجد أي نتائج للبحث",
                "info": "عدد النتائج _TOTAL_",
                "infoEmpty": "لا توجد سجلات متاحة",
                "infoFiltered": "",
                "decimal": "",
                "emptyTable": "لا توجد بيانات متاحة في الجدول",
                "infoPostFix": "",
                "thousands": ",",
                "loadingRecords": "انتظار...",
                "processing": "عمليات...",
                "paginate": {
                    "first": "بداية",
                    "last": "نهاية",
                    "next": "التالي",
                    "previous": "السابق"
                },
            }
        });
    table.on('draw', function() {
        /**
         * script to change Class status
         */
        $('.grade-status').change(function() {
            var status = $(this).prop('checked') === true ? 1 : 0;
            var grade_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "application/json",
                url: 'grades/Status/'+status+'/'+grade_id,
                success: function(data){
                    console.log(data.success)
                }
            });
        })
        /******************************************************/
        /**
         * script to change subject status
         */
        $('.subject-status').change(function() {
            var status = $(this).prop('checked') === true ? 1 : 0;
            var subject_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "application/json",
                url: 'subjects/Status/'+status+'/'+subject_id,
                data: {status:status, subject_id:subject_id},
                success: function(data){
                    console.log(data.success)
                }
            });
        });
        /******************************************************/
        /**
         * script to change Book status
         */
        $('.book-status').change(function() {
            var status = $(this).prop('checked') === true ? 1 : 0;
            var book_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "application/json",
                url: 'books/Status/'+status+'/'+book_id,
                success: function(data){
                    console.log(data.success)
                }
            });
        });
        /******************************************************/
        /**
         * script to change InteractiveBook status
         */
        $('.ibook-status').change(function() {
            var status = $(this).prop('checked') === true ? 1 : 0;
            var book_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "application/json",
                url: 'interactive-books/Status/'+status+'/'+book_id,
                success: function(data){
                    console.log(data.success)
                }
            });
        });
        /******************************************************/
        /**
         * script to change Unit status
         */
        $('.unit-status').change(function() {
            var status = $(this).prop('checked') === true ? 1 : 0;
            var unit_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "application/json",
                url: 'units/Status/' + status + '/' + unit_id,
                success: function (data) {
                    console.log(data.success)
                }
            });
        });
        /******************************************************/
        /**
         * script to change Lesson status
         */
        $('.lesson-status').change(function() {
            var status = $(this).prop('checked') === true ? 1 : 0;
            var lesson_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "application/json",
                url: 'lessons/Status/'+status+'/'+lesson_id,
                success: function(data){
                    console.log(data.success)
                }
            });
        });
        /******************************************************/
        /**
         * script to change Video Lesson status
         */
        $('.video-status').change(function() {
            var status = $(this).prop('checked') === true ? 1 : 0;
            var video_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "application/json",
                url: 'video-lessons/Status/'+status+'/'+video_id,
                success: function(data){
                    console.log(data.success)
                }
            });
        });
        /*********************************************************/
        $('.file-status').change(function()
        {
            var status = $(this).prop('checked') === true ? 1 : 0;
            var file_id = $(this).data('id');
            var user_id = $(this).data('userid');
            console.log('in general script'+status+"-"+file_id+'-'+user_id);
            $.ajax
            ({
                type: "GET",
                dataType: "application/json",
                url: '/file-materials/Status/'+status+'/'+file_id+'/'+user_id,
                success: function(data){
                    console.log(data.success)
                }
            });
        });
        /****************************************************/
        $('.program-status').change(function() {
            var status = $(this).prop('checked') === true ? 1 : 0;
            var program_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "application/json",
                url: '/programs/status/' + status + '/' + program_id,
                success: function(data) {
                    console.log(data.success)
                }
            });
        })
        /****************************************************/
        /**
         * script to change Class status
         */
        $('.episode-status').change(function() {
            var status = $(this).prop('checked') === true ? 1 : 0;
            var episode_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "application/json",
                url: 'episodes/status/'+ status + '/' + episode_id,
                success: function(data){
                    console.log(data.success)
                }
            });
        })
        /*************************************************/
        /**
         * script to change Class status
         */
        $('.broadcast-times-status').change(function() {
            var status = $(this).prop('checked') === true ? 1 : 0;
            var broadcast_time_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "application/json",
                url: 'broadcast-times/status/'+ status + '/' + broadcast_time_id,
                success: function(data){
                    console.log(data.success)
                }
            });
        })
        /*******************************************************/
        $('.experience-status').change(function() {
            var status = $(this).prop('checked') === true ? 1 : 0;
            var experience_id = $(this).data('id');
            console.log(experience_id)
            $.ajax({
                type: "GET",
                dataType: "application/json",
                url: 'experiences/status/'+status+'/'+experience_id,
                success: function(data){
                    console.log(data.success)
                }
            });
        });
        /*************************************************/
        $('.return-file').click(function (event) {
            event.preventDefault();
            var status = "{{__('fileStatus.file_status.returned')}}";
            var id = $(this).data('id');
            swal
            ({
                    title: "إرجاع مادة تعليمية",
                    text: "سبب إرجاع المادة التعليمية",
                    type: "input",
                    closeOnConfirm: true,
                    showCancelButton: true,
                    confirmButtonText: "إرجاع",
                    cancelButtonText: "إلغاء",
                    animation: "slide-from-top",
                    inputPlaceholder: ""
                },
                function (inputValue)
                {
                    if (inputValue === false) return false;

                    if (inputValue === "") {
                        swal.showInputError("الرجاء إدخال سبب ارجاع المادة التعليمية");
                        return false
                    }

                    $.ajax({
                        type: "GET",
                        dataType: "application/json",
                        url: 'file-materials/returnFile/' + id + "/" + inputValue,
                        statusCode:
                        {
                            200: function (success)
                            {
                                swal({
                                        title: "تم إرجاع الملف",
                                        text: "تم إرجاع الملف",
                                        type: "success",
                                        showCancelButton: true,
                                        showConfirmButton: true,
                                        confirmButtonText: "موافق",
                                        cancelButtonText: "إلغاء",
                                        closeOnConfirm: false,
                                        closeOnCancel: false
                                    },
                                    function(isConfirm) {
                                        if (isConfirm)
                                        {
                                            window.location.href = 'file-materials/published-files';
                                        }
                                    });
                            }
                        }
                    });
                });
        });
    });
});
/************************************************************************************************************/

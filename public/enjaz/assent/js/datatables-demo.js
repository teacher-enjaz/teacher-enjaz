
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
})
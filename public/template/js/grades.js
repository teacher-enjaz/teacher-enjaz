/***********************************************************************************************************/
/**
 * show/hide class list by selecting class type (parent-child)
 */
$(document).ready(function () {
    $('input:radio[name="type"]').on('change',function () {
        if(this.checked && this.value === '2')
        {
            $('#grades_list').show();
        }
        else
        {
            $('#grades_list').hide();
        }
    });
});
/***********************************************************************************************************/
/**
 * script to change class status
 */
$(document).ready(function (){
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
})


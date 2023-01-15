/************************************************************************************************/
/* make class select 2 */
$(document).ready(function()
{
    $('#grades').select2();
});
/************************************************************************************************/
/**
 * script yo show/hide subjects list by selecting subject type (parent-child)
 */
$(document).ready(function()
{
    $('input:radio[name="type"]').on('change',function(){
        if(this.checked && this.value === '2')
        {
            $("#subject_list").show();
        }else
        {
            $("#subject_list").hide();
        }
    });
});

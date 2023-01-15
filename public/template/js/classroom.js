$(document).ready(function ()
{
    $('input:radio[name="type1"]').on('change',function () {
        if(this.checked && this.value === '1')
        {
            $('#receiveAccount').show();
            $('#div2').hide();
            $('#div3').hide();
            $('#describeProblem').hide();
        }
        else if(this.checked && this.value === '2')
        {
            $('#receiveAccount').hide();
            $('#div2').show();
            $('#div3').show();
            $('#describeProblem').hide();
            $('#form').hide();
        }
        else if(this.checked && this.value === '3')
        {
            $('#receiveAccount').show();
            $('#div2').hide();
            $('#div3').hide();
            $('#describeProblem').show();
            $('#form').hide();
        }
        else if(this.checked && this.value === '4')
        {
            $('#receiveAccount').show();
            $('#div2').hide();
            $('#div3').hide();
            $('#describeProblem').hide();
            $('#form').show();
        }
    });
});


var pageLink = '';
$(document).ready(function() {
    $('#shareWithFacebook').click(function () {
        pageLink = $(this).data('url');
        console.log(pageLink)
        var win = window.open("https://www.facebook.com/sharer/sharer.php?u=" + pageLink, 'facebook-share-dialog', "width=626, height=436");
        win.focus();
    });
    $('#shareWithWhatsApp').click(function () {
        pageLink = $(this).data('url');
        var win = window.open('https://api.whatsapp.com/send?text=' + pageLink);
        win.focus();
    });
    $('#shareWithTwitter').click(function () {
        pageLink = $(this).data('url');
        window.open("https://twitter.com/intent/tweet?url=" + pageLink);
    });
});

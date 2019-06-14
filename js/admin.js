$ = jQuery.noConflict();

/*  upload a picture wp_enqueue_media()   */
$(function () {
    var mediaUploader;
    $('#upload_button').on('click', function (e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose your picture',
            button: {
                text: 'Choose picture'
            },
            multiple: true
        });
        mediaUploader.on('select', function () {
            attachement = mediaUploader.state().get('selection').first().toJSON();
            console.log(attachement.url);
            $('#profile').val(attachement.url);
            /* change the picture without save  */
            $('#picture_profile_preview').css('background-image', 'url(' + attachement.url + ')');
        });
        mediaUploader.open();
    });
});

/* remove the picture profile  */
$(function () {
    $('#remove_button').on('click', function (e) {
        e.preventDefault();
        var answer = confirm("Are you sure to romove your picture profile ?");
        if (answer == true) {
            $('#profile').val('');
            $('.sunset_general_form').submit();
        }
    });
});
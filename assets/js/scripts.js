$(function () {

    $('#content_container .post').on('click', '.likes', function () {
        //alert('yeap');
        var like = $(this),
            post = $(this).parents(),
            state = like.hasClass();

        if (post.hasClass('disabled')) {
            return;

        }
        if (!like.hasClass('disabled')) {
            like.addClass('disabled');
            $(this).text(Number($(this).text()) + 1);
        }
        
        $.ajax({
            url: '',
            data: {
                act: 'like',
                post_id: post.data('post_id'),
                state: !state,
            },
            type: 'post',
            dataType: 'json',
            success: function (responce) {
                like.toggleClass('active', !state)
                        .removeClass('disable');

            },
            error: function (responce) {
                like.removeClass('disable');
            }
        });
    });
});



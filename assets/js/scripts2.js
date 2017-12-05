$(function () {

    $('#content_container .post').on('click', '.likes', function () {
        alert('yeap');
        var like = $(this),
                post = $(this).parents(),
                state = like.hasClass();

        if (like.hasClass('disabled')) {
            return;
        } else {

            like.addClass('disabled');
        }
        $.ajax({
            url: '',
            data: {
                act: 'like',
                post_id: post.data('post_id'),
                state: !state
                        //count: $('.count_like').text()
            },
            type: 'post',
            dataType: 'json',
            success: function (responce) {
                like.toggleClass('active', !state)
                        .removeClass('disabled')
                        .find('span').text(response.count);

            },
            error: function (responce) {
                like.removeClass('disabled');
            }
        });
    });
});



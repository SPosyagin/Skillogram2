$(function () {
    'use strict';
    $('#content_container .post').on('click', '.like', function () {
//alert('yeap');
        var like = $(this),
                post = $(this).parents(),
                state = like.hasClass();
        if (like.hasClass('disabled')) {
            return;
        }

        like.addClass('disabled');
        $.ajax({
            url: 'index.php',
            data: {
                act: 'like',
                post_id: post.data('post_id'),
                state: !state,
            },
            type: 'post',
            dataType: 'json',
            success: function (response) {
                like.toggleClass('active')
                        .removeClass('disabled')
                        .next('.count_like').text(response.count);
            },
            error: function (response) {
                like.removeClass('disabled');
            }
        });
    });

    $('#load').on('click', '.load_button', function () {
        alert('yeap'); //Выполняем если по кнопке кликнули
        var num = 5;
        $.ajax({
            url: "action/load_post.php",
            type: "post",
            data: {"num": num},
            cache: false,
            success: function (response) {
                if (response == 0) {  // смотрим ответ от сервера и выполняем соответствующее действие
                    alert("Больше нет записей");
                } else {
                    $("#content_container").append(response);
                    num = num + 5;
                }
            }
        });
    });


    $('.post_comment_add').submit(function (e) {
        var form = $(this);

        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
        
            success: function (response) {
                
            },
            error: function (response) {
               
            },  
        });
        e.preventDefault();
    });
});


            
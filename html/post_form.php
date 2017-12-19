<div id="content_container">
    <div class = "post" data-post_id = "<?= $post['post_id']; ?>">
        <div class="avatar">
            <img src=<?php echo $post['avatar']; ?> /> 
        </div>
        <div class="username">
            <?php echo $post['login']; ?>
        </div>
        <div class="time">
            <?php echo $post['added_at']; ?>
        </div>
        <div class="content">
            <img src=<?php echo $post['content']; ?> />
        </div>
        <div class='<?php echo 'like ' . $like_status; ?>'></div>
        <div class="count_like">
            <?php echo $post['count_like']; ?>
        </div>
        <div class="comment">
            <?php echo $post['comment']; ?>
        </div>

        <div class="hash_tag">
            <?php echo $post['hash_tag']; ?>
        </div>
        <div class="add_comment" data-post_id = "<?= $post['post_id']; ?>">
            <form class='post_comment_add' action="" method="post">
                <input type='hidden' name='act' value='post_comment_add'>
                <input type="hidden" name='post_id' value="<?=$post['post_id'];?>">
                <textarea class='text_area' name='comment'></textarea>
                <center><input class="send_post_comment" type="submit" name="submit" value="Отправить!"></center>
            </form>
        </div>
        <?php if(!empty($post['comments'])): ?>
        <hr>
        <div class="post_comment">
            
            <?php $count = 0; ?>
            <?php foreach ($post['comments'] as $comment): ?>
                <?php 
                
                $user_data = Comment::getUserDataCommented($comment);
                
                if($count++ >=3) {
                    break;
                }
                ?>
            <div class='post_comment_one'>
                <div class="avatar_comm">
                    <img src=<?php echo $user_data['avatar']; ?> /> 
                </div>
                <div class="username_comm">
                    <?php echo $user_data['login'];?>
                </div>
                <div class="time_comm">
                    <?php echo $comment['added_at'];?>
                </div>
                <div class="text_comm">
                    <?php echo $comment['text'];?>
                </div>
            <hr>
            </div>
                <?php endforeach; ?>
        </div> 
        <?php endif; ?>
        
    </div>
</div>

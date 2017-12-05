<div id="content_container">
    <div class = "post" data-post_id = "<?=$post['post_id'];?>">
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
	<div class=<?php echo $like_status ;?>></div>
        <div class="count_like">
                <span><?php echo $post['count_like']; ?></span>
	</div>
	<div class="comment">
		<?php echo $post['comment']; ?>
	</div>
	<div class="hash_tag">
		<?php echo $post['hash_tag']; ?>
	</div>
    </div>
</div>
  
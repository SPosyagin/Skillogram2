<div id="content_container">
    <div class = "post" data-post_id = "<?=$adv['id'];?>">
	<div class="avatar">
		<img src=<?php echo $adv['logo']; ?> /> 
	</div>
	<div class="username">
		<?php echo $adv['title']; ?>
	</div>
	<div class="time">
		<?php echo $adv['price']; ?>
	</div>
	<div class="content">
		<img src=<?php echo $adv['content']; ?> />
	</div>
	<div class="comment_adv">
		<?php echo $adv['text']; ?>
	</div>
    </div>
</div>

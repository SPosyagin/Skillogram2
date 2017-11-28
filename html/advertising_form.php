<div id="content_container" data-post_id = "<?=$adv['id'];?>">
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
	<div class="likes">
		<img src="assets/img/like.png"/> 
		<?php echo $adv['likes']; ?>
	</div>
	<div class="comment">
		<?php echo $adv['text']; ?>
	</div>
    	<div class="hash_tag">
		<?php echo 'Потому что могу'; ?>
	</div>
</div>

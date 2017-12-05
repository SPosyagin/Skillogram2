<?php

$post = new Post;
$post->getPost();

echo json_encode(['status' => 'success', 
    'post_id' => '']);

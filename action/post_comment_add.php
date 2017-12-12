<?php

$add_comment = new Comment;
$add_comment->addComment();

echo json_encode(['status' => 'success']);

exit;
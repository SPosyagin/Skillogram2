<?php

$add_comment = new Comment;
$add_comment->addComment();

echo json_encode(['status' => 'success',
    'avatar' => $_SESSION['user']['avatar'],
    'username' => $_SESSION['user']['login'],
    'post_id' => $_POST['post_id'],
    'added_at' => date('Y-m-d H:i:s'),
    'text' => $_POST['comment']
]);

exit;

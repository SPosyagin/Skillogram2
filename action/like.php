<?php

$addlikes = new Likes();
$likes = $addlikes->addLike();

echo json_encode(['status' => 'success', 'count' => $likes]);

exit;





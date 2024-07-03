<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Review;

class CommentService
{
    public static function createComment($user_id, $review_id, $data)
    {
        return Comment::create([
            'comment' => $data['comment'],
            'review_id' => $review_id,
            'user_id' => $user_id,
        ]);
    }
}
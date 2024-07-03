<?php

namespace App\Services;

use App\Models\Review;

class ReviewService
{
    public static function createReview($user_id, $data)
    {
        return Review::create([
            'text' => $data['text'],
            'user_id' => $user_id,
        ]);
    }

    public static function getReviews()
    {
        return Review::orderBy('created_at', 'desc')->orderBy('id')->with('user')->with('comments')->paginate(10);
    }

}
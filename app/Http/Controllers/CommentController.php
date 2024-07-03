<?php

namespace App\Http\Controllers;

use App\Events\CommentEvent;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\Comment\CreateCommentResource;
use App\Models\Review;
use App\Services\CommentService;

class CommentController extends Controller
{
    public function store(CommentRequest $request, int $review_id)
    {
        $data = $request->validated();
        $comment = CommentService::createComment(auth()->id(), $review_id, $data);
        $review = Review::find($review_id);
        event(new CommentEvent($comment, $review));
        return new CreateCommentResource($comment);
    }
}

<?php

namespace App\Http\Controllers;

use App\Events\ReviewEvent;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\Review\ShowReviewResource;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = ReviewService::getReviews();
        return ShowReviewResource::collection($reviews);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewRequest $request)
    {
        $data = $request->validated();
        $review = ReviewService::createReview(auth()->id(), $data);
        event(new ReviewEvent($review));
        return new ShowReviewResource($review);
    }



}

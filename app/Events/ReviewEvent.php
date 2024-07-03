<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReviewEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $review;

    /**
     * Create a new event instance.
     */
    public function __construct($review)
    {
        $this->review = $review;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('reviews'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'review.created';
    }

    public function broadcastWith(): array
    {
        return [
            'text' => $this->review->text,
            'login' => $this->review->user->login,
            'created_at' => $this->review->created_at,
        ];
    }
}

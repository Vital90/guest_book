<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['id'],
            'user' => ['id' => $this['user']->id, 'login' => $this['user']->login],
            'text' => $this['text'],
            'created_at' => $this['created_at'],
            'comments'=>  $this['comments'],
        ];
    }
}

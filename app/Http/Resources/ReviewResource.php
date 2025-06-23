<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'rating' => $this->rating,
            'comment' => $this->comment,
            'created_at' => $this->created_at,
            'user' => [
                'name' => $this->user->name,
                'job' => $this->user->job_title,
                'profile_image' => $this->user->profile_image ??null,


            ],
        ];
    }
}

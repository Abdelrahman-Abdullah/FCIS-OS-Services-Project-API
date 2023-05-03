<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

            return [
                'id'        => $this->id,
                'name'      => $this->name,
                'email'     => $this->email,
                'jobName'   => $this->job_name,
                'thumbnail' => $this->thumbnail,
                'phone'     => $this->phone,
                'address'   => $this->address,
                'bio'       => $this->bio,
                'orders'    => OrderResource::collection($this->whenLoaded('workerOrders')),
                'jobPhotos' => jopPhotoResource::collection($this->whenLoaded('jobPhotos'))
            ];

    }
}

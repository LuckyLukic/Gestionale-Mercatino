<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' => $this->category,
            'quanity' => $this->quantity,
            'price' => $this->price,
            'description' => $this->description,
            'userId' => $this->user->id,
        ];
    }

    protected function prepareForValidation()  // we switched in our json user_id to userID so not to have errors we reconvert weather we use userId in creation.
    {
        $this->merge(['user_id' => $this->userID]);
    }
}

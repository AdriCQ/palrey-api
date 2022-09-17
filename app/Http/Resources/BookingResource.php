<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'passport' => $this->passport,
            'date' => [
                'from' => $this->date_from,
                'to' => $this->date_to,
            ],
            'currency' => $this->currency,
            'price' => $this->price,
            'airline_name' => $this->airline_name,
            'airline_fly' => $this->airline_fly,
            'room_type' => $this->room_type,
            'comments' => $this->comments,
            'room' => new RoomResource($this->room),
            'room_id' => $this->room_id,
            'report_code' => $this->id . '|' . bcrypt($this->id),
        ];
    }
}

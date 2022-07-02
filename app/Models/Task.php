<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $guarded = ['id'];
    protected $casts = ['completed' => 'boolean'];

    public $timestamps = false;

    /**
     * From Booking
     */
    public static function getFromBooking(Booking $booking)
    {
        return new Task([
            'message' => $booking->first_name . ' ' . $booking->first_name . '. ' . $booking->comments,
            'type' => 'Reserva #' . $booking->id,
            'date' => $booking->date_from,
            'completed' => false
        ]);
    }
}

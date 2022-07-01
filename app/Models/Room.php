<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';
    protected $guarded = ['id'];
    protected $casts = ['open' => 'boolean'];

    public static $TYPES = ['Sencilla', 'Doble', 'Triple', 'Cuadruple'];

    public function isAvailable(string $from, string $to)
    {
        if (!$this->open) return false;

        $fromCount =  $this->bookings()
            ->whereDate('date_from', '<=', $from)
            ->whereDate('date_to', '>=', $from)->count();
        $toCount =  $this->bookings()
            ->whereDate('date_from', '<=', $to)
            ->whereDate('date_to', '>=', $to)->count();
        $betweenCount = $this->bookings()
            ->whereDate('date_from', '>=', $from)
            ->whereDate('date_to', '<=', $to)->count();
        return $betweenCount + $toCount + $fromCount > 0 ? false : true;
    }

    /**
     * bookings
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

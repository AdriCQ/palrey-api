<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateTasksFromBookings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [];
        foreach (Booking::all() as $booking) {
            array_push($tasks, [
                'type' => 'Reserva #' . $booking->id,
                'message' => Task::messageFromBooking($booking),
                'date' => $booking->date_from,
                'completed' => false
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Task;
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
        foreach (Booking::all() as $booking) {
            Task::getFromBooking($booking)->save();
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Room;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class MysqlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = json_decode(Storage::get('users.json'), true);
        $data = [];
        foreach ($users as $user) {
            array_push($data, [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);
        }
        User::query()->insert($data);

        $rooms = json_decode(Storage::get('rooms.json'), true);

        foreach ($rooms as $m) {
            array_push($data, [
                'id' => $m['id'],
                'type' => $m['type'],
                'capacity' => $m['capacity'],
                'title' => $m['title'],
                'address' => $m['address'],
                'open' => $m['open'],
            ]);
        }
        Room::query()->insert($data);

        $bookings = json_decode(Storage::get('bookings.json'), true);

        foreach ($bookings as $m) {
            array_push($data, [
                'id' => $m['id'],
                'first_name' => $m['first_name'],
                'last_name' => $m['last_name'],
                'email' => $m['email'],
                'phone' => $m['phone'],
                'address' => $m['address'],
                'passport' => $m['passport'],
                'date_from' => $m['date_from'],
                'date_to' => $m['date_to'],
                'currency' => $m['currency'],
                'price' => $m['price'],
                'airline_name' => $m['airline_name'],
                'airline_fly' => $m['airline_fly'],
                'room_type' => $m['room_type'],
                'comments' => $m['comments'],
            ]);
        }
        Booking::query()->insert($data);

        $tasks = json_decode(Storage::get('tasks.json'), true);

        foreach ($tasks as $m) {
            array_push($data, [
                'id' => $m['id'],
                'type' => $m['type'],
                'message' => $m['message'],
                'completed' => $m['completed'],
                'date' => $m['date'],
            ]);
        }
        Task::query()->insert($data);
    }
}

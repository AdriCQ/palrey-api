<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * create
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:64'],
            'last_name' => ['required', 'string', 'max:64'],
            'email' => ['nullable', 'email'],
            'phone' => ['required', 'string', 'max:16'],
            'address' => ['required', 'string'],
            'passport' => ['required', 'string', 'max:32'],
            'date' => ['required', 'array'],
            'date.from' => ['required', 'string'],
            'date.to' => ['required', 'string'],
            'currency' => ['required', 'in:MXN,CUP,USD,EUR'],
            'price' => ['required', 'numeric'],
            'airline_name' => ['required', 'string', 'max:64'],
            'airline_fly' => ['required', 'string', 'max:32'],
            'room_id' => ['required', 'integer'],
            'comments' => ['nullable', 'string'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 400, [], JSON_NUMERIC_CHECK);
        }
        $validator = $validator->validate();
        $validator['date_from'] = Carbon::make($validator['date']['from']);
        $validator['date_to'] = Carbon::make($validator['date']['to']);
        unset($validator['date']);
        $room = Room::find($validator['room_id']);
        if (!$room) return response()->json(['Habitacion no encontrada'], 400, [], JSON_NUMERIC_CHECK);
        $validator['room_type'] = $room->type;

        $model = new Booking($validator);
        if ($model->save()) {
            $task = Task::getFromBooking($model);
            if (!$task->save()) return response()->json(['No se pudo guardar'], 502, [], JSON_NUMERIC_CHECK);
            return new BookingResource($model);
        }
        return response()->json(['No se pudo guardar la reserva'], 502, [], JSON_NUMERIC_CHECK);
    }

    /**
     * list
     * @return Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return BookingResource::collection(Booking::query()->orderByDesc('id')->get());
    }

    /**
     * Find By Report Code
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function findByReportCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => ['required', 'string']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 400, [], JSON_NUMERIC_CHECK);
        }
        $validator = $validator->validate();
        $explode = explode('|', $validator['code']);
        if (!\count($explode))
            return response()->json(['Codigo incorrecto'], 400, [], JSON_NUMERIC_CHECK);
        if (!is_numeric($explode[0]) && is_int($explode[0] * 1))
            return response()->json(['No se pudo encontrar el codigo'], 400, [], JSON_NUMERIC_CHECK);
        $model = Booking::find($explode[0]);
        if (!$model) return response()->json(['No se pudo encontrar'], 400, [], JSON_NUMERIC_CHECK);
        if (!Hash::check($model->id, $explode[1])) return response()->json(['Codigo no coincide'], 400, [], JSON_NUMERIC_CHECK);
        return new BookingResource($model);
    }

    /**
     * show
     * @param int $id
     * @return Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        return new BookingResource(Booking::find($id));
    }

    /**
     * Update
     * @param int $id
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function update(int $id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['nullable', 'string', 'max:64'],
            'last_name' => ['nullable', 'string', 'max:64'],
            'email' => ['nullable', 'email'],
            'phone' => ['required', 'string', 'max:16'],
            'address' => ['nullable', 'string'],
            'passport' => ['nullable', 'string', 'max:32'],
            'date' => ['nullable', 'array'],
            'date.from' => ['nullable', 'string'],
            'date.to' => ['nullable', 'string'],
            'currency' => ['nullable', 'in:MXN,CUP,USD,EUR'],
            'price' => ['nullable', 'numeric'],
            'airline_name' => ['nullable', 'string', 'max:64'],
            'airline_fly' => ['nullable', 'string', 'max:32'],
            'room_id' => ['nullable', 'integer'],
            'comments' => ['nullable', 'string'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 400, [], JSON_NUMERIC_CHECK);
        }
        $validator = $validator->validate();
        $model = Booking::find($id);
        if (!$model) return response()->json(['No se pudo encontrar'], 400, [], JSON_NUMERIC_CHECK);
        if (isset($validator['date'])) {
            $validator['date_from'] = Carbon::make($validator['date']['from']);
            $validator['date_to'] = Carbon::make($validator['date']['to']);
            unset($validator['date']);
        }
        if(isset($validator['room_id']) && ! Room::find($validator['room_id']))
            return response()->json(['Habitacion no encontrada'], 400, [], JSON_NUMERIC_CHECK);
        if ($model->update($validator)) {
            $generatedTask = Task::getFromBooking($model);
            $task = Task::query()->where('type', 'Reserva #' . $model->id)->first();
            if (!$task && !$generatedTask->save()) {
                return response()->json(['No se pudo guardar'], 502, [], JSON_NUMERIC_CHECK);
            } else if (!$task->update($generatedTask->toArray())) {
                return response()->json(['No se pudo guardar'], 502, [], JSON_NUMERIC_CHECK);
            }
            return new BookingResource($model);
        }
        return response()->json(['No se pudo guardar la reserva'], 502, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Remove
     * @param int $id
     * @return Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        return Booking::find($id) && Booking::find($id)->delete()
            ? response()->json(null, 200, [], JSON_NUMERIC_CHECK)
            : response()->json(['No se pudo eliminar la reserva'], 502, [], JSON_NUMERIC_CHECK);
    }
}

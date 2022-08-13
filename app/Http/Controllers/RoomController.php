<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{

    /**
     * Available
     * @param int $id
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function available(int $id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => ['required', 'array'],
            'date.from' => ['required', 'string'],
            'date.to' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 400, [], JSON_NUMERIC_CHECK);
        }
        $validator = $validator->validate();
        $model = Room::find($id);
        if (!$model) return response()->json(['No encontrado'], 400, [], JSON_NUMERIC_CHECK);
        return response()->json($model->isAvailable($validator['date']['from'], $validator['date']['to']));
    }
    /**
     * create
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string'],
            'type' => ['required', 'in:' . implode(',', Room::$TYPES)],
            'capacity' => ['required', 'integer'],
            'open' => ['required', 'boolean'],
            'address' => ['required', 'string'],
            'link' => ['nullable', 'string']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 400, [], JSON_NUMERIC_CHECK);
        }
        $validator = $validator->validate();
        $model = new Room($validator);
        return $model->save()
            ? new RoomResource($model)
            : response()->json(['No se pudo guardar'], 502, [], JSON_NUMERIC_CHECK);
    }

    /**
     * find
     * @param int $id
     * @return Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $model = Room::find($id);
        $model->calendars;
        return new RoomResource($model);
    }
    /**
     * list
     * @return Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return RoomResource::collection(Room::all());
    }

    /**
     * List Available
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function listAvailable(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => ['required', 'array'],
            'date.from' => ['required', 'string'],
            'date.to' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 400, [], JSON_NUMERIC_CHECK);
        }
        $validator = $validator->validate();
        $rooms = [];
        foreach (Room::query()->where('open', true)->get() as $room) {
            if ($room->isAvailable($validator['date']['from'], $validator['date']['to']))
                array_push($rooms, $room);
        }
        $roomsCollection = collect($rooms);
        return RoomResource::collection($roomsCollection);
    }

    /**
     * Remove
     * @param int  $id
     * @return Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $model = Room::find($id);
        if (!$model) return response()->json(['No encontrado'], 400, [], JSON_NUMERIC_CHECK);
        return $model->delete()
            ? response()->json(true, 200, [], JSON_NUMERIC_CHECK)
            : response()->json(['No se pudo eliminar'], 502, [], JSON_NUMERIC_CHECK);
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
            'title' => ['nullable', 'string'],
            'type' => ['nullable', 'in:' . implode(',', Room::$TYPES)],
            'capacity' => ['nullable', 'integer'],
            'open' => ['nullable', 'boolean'],
            'address' => ['nullable', 'string'],
            'link' => ['nullable', 'string']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 400, [], JSON_NUMERIC_CHECK);
        }
        $validator = $validator->validate();
        $model = Room::find($id);
        if (!$model) return response()->json(['No encontrado'], 400, [], JSON_NUMERIC_CHECK);
        return $model->update($validator)
            ? new RoomResource($model)
            : response()->json(['No se pudo actualizar'], 502, [], JSON_NUMERIC_CHECK);
    }
}

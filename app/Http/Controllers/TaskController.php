<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * All
     * @return Illuminate\Http\JsonResponse
     */
    public function all()
    {
        return TaskResource::collection(Task::query()->orderBy('date')->get());
    }
    /**
     * destroy
     * @param int $id
     * @return Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $model = Task::find($id);
        if (!$model) return response()->json(['No encontrado'], 400, [], JSON_NUMERIC_CHECK);
        return $model->delete()
            ? response()->json(['Eliminado correctamente'], 200, [], JSON_NUMERIC_CHECK)
            :  response()->json(['No se pudo eliminar'], 502, [], JSON_NUMERIC_CHECK);
    }

    /**
     * index
     * @return Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return TaskResource::collection(
            Task::query()->whereDate('date',  '>=', Carbon::yesterday())
                ->where('completed', false)
                ->orderBy('date')
                ->get()
        );
    }

    /**
     * Show
     * @param int $id
     * @return Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        return new TaskResource(Task::find($id));
    }

    /**
     * store
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => ['required', 'string', 'max:32'],
            'message' => ['required', 'string'],
            'date' => ['required', 'string']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 400, [], JSON_NUMERIC_CHECK);
        }
        $validator = $validator->validate();
        $model = new Task($validator);
        return $model->save()
            ? new TaskResource($model)
            : response()->json(['No se pudo guardar'], 502, [], JSON_NUMERIC_CHECK);
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
            'type' => ['nullable', 'string', 'max:32'],
            'message' => ['nullable', 'string'],
            'date' => ['nullable', 'string'],
            'completed' => ['nullable', 'boolean']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 400, [], JSON_NUMERIC_CHECK);
        }
        $validator = $validator->validate();
        $model = Task::find($id);
        if (!$model) return response()->json(['No encontrado'], 400, [], JSON_NUMERIC_CHECK);
        return $model->update($validator)
            ? new TaskResource($model)
            : response()->json(['No se pudo guardar'], 502, [], JSON_NUMERIC_CHECK);
    }
}

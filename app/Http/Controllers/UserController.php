<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * Auth Login
     *
     * @param Request $request
     * @return Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 400, [], JSON_NUMERIC_CHECK);
        }
        $validator = $validator->validate();
        // try auth
        if (!Auth::attempt(['email' => $validator['email'], 'password' => $validator['password']]))
            return response()->json(null, 401);
        $user = User::find(auth()->id());
        $user->tokens()->delete();
        $token = $user->createToken('mis-rentas.palrey.com')->plainTextToken;
        return (new UserResource($user))->additional(['api_token' => $token]);
    }
}

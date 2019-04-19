<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')
            ->only('logout');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|between:6,25|confirmed'
        ]);

        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'success' => true
        ]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|between:6,25'
        ]);

        $user = User::whereEmail($request->email)->first();

        if ($user && Hash::check($request->password, $user->password)){
            $user->api_token = Str::random(60);
            $user->save();

            return response()->json([
                'success' => true,
                'user_id' => $user->id,
                'api_token' => $user->api_token,
                'name' => $user->name,
                'role' => $user->role
            ]);
        }

        return response()->json([
            'errors' => [
                'email' => 'Incorrect credentials'
            ]
        ], 422);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->api_token = null;
        $user->save();

        return response()->json([
            'success' => true
        ]);

    }
}

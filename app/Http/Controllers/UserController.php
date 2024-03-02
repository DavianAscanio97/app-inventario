<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{

    public function authenticate(Request $request)
    {

        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return response()->json(['user_not_found'], 404);
            }
            } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                    return response()->json(['token_expired'], $e->getStatusCode());
            } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                    return response()->json(['token_invalid'], $e->getStatusCode());
            } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
                    return response()->json(['token_absent'], $e->getStatusCode());
            }
            return response()->json(compact('user'));
    }

    public function index() {
        $user = DB::table('user')->get();
        return $user;
    }

    public function show($id) {
        $user = DB::table('user')->select('id', 'name')->where('id', $id)->get();
        return $user;
    }

    public function update($id, Request $request) {
        $user = DB::table('user')->where('id', $id)->update([
            'name'  => $request->name
        ]);

        return [
            'message' => 'Usuario actualizado correctamente'
        ];
    }

    public function delete($id) {
        $user = DB::table('user')->where('id', $id)->delete();
        return [
            'message' => 'Usuario eliminado correctamente'
        ];
    }

    public function store(Request $request) {
       $user = DB::table('user')->insert([
           'name' => $request->name,
           'password' => Hash::make($request->password),
           'email' => $request->email,
           'age' => $request->age
       ]);
       return [
            'message' => 'Usuario creado correctamente'
        ];
    }
}

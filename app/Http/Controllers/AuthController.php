<?php

use Tymon\JWTAuth\Exceptions\JWTException;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use JWTAuth;


class AuthController extends Controller
{
    public function signup(Request $request)
    {
       $this->validate($request, [
        'username' => ['required', 'string', 'max:50', 'unique:users'],
        'name'     => ['required', 'string', 'max:50'],
        'email'    => ['required', 'string', 'email', 'max:50', 'unique:users'],
        'password' => ['required', 'string', 'min:6'],
       ]);

       return User::create([
        'username' => $request->json('username'),
        'name'     => $request->json('name'),
        'email'    => $request->json('email'),
        'password' => bcrypt($request->json('password'))
       ]);
    }

    public function signin(Request $request)
    {
      $this->validate($request, [
        'username' => 'required',
        'password' => 'required'
      ]);

      // grab credentials from the request
      $credentials = $request->only('username', 'password');

      try {
          // attempt to verify the credentials and create a token for the user
          if (! $token = JWTAuth::attempt($credentials)) {
              return response()->json(['error' => 'invalid_credentials'], 401);
          }
      } catch (JWTException $e) {
          // something went wrong whilst attempting to encode the token
          return response()->json(['error' => 'could_not_create_token'], 500);
      }

      // all good so return the token and user data saved
      return response()->json([
        'user_id' => $request->user()->id,
        'token'   => $token
      ]);
    }

    public function checktoken(Request $request)
    {
      return $request->user();
    }

    public function signout()
    {
      JWTAuth::invalidate(JWTAuth::getToken());
      return response()->json([
        'message' => "Logout Success"
      ])->withSuccess();
    }
}

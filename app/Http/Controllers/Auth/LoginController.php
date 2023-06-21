<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @vapathr string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'apiLogout');
        $this->middleware('auth:sanctum')->only('apiLogout');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        if ($request->wantsJson()) {
            return response("Invalid login credentials", 400);
        } else return $this->sendFailedLoginResponse($request);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response('Validator Failed'($validator), 400);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response('The provided credentials are incorrect', 401);
        }

        // Created At
        DB::table('users')->where('id', $user->id)->update([
            'created_at' => now()
        ]);

        // $user->load('department');
        // $user->profile = $user->avatar;
        // $user->last_seen = $user->lastSeen;
        $token = $user->createToken($request->getClientIp())->plainTextToken;
        return response(['token' => $token, 'user' => $user]);
    }

    public function apiLogout(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->user()->currentAccessToken()->delete();

            // if ($request->user()->phone_verified_at && env('APP_OPT')) {
            //     DB::table('users')->where('id', $request->user()->id)->update([
            //         'phone_verified_at' => null
            //     ]);
            // }

            DB::commit();
            return response("success");

        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }
    }
}

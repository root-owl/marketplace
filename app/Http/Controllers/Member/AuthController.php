<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Member\Auth \{
    RegisterRequest,
        LoginRequest
};
use App\Http\Resources\UserResource;
use App\Models \{
    User,
        Token
};
use App\Http\Traits \{
    Encrypter,
        AuthHelper
};
use \Illuminate\Encryption\Encrypter as Encrypterr;
use DB;
use Auth;

class AuthController extends Controller
{
    use Encrypter, AuthHelper;

    /**
     * Show the login form to the user
     */
    public function showLoginForm()
    {
        return view('marketplace.auth.login');
    }

    /**
     * Register the user
     */
    public function register(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();
            // create the keys
            $data = self::generateKeys();

            // generate the salt
            $data['salt'] = self::generateSalt();//uniqid(mt_rand(), true);

            // Create the Argon2 Hash
            $combined_string = $request->input('email') . $data['salt'] . $request->input('password');
            $hashed_key = self::generateHash($combined_string);

            // encrypt the public and private keys
            $encrypter = new Encrypterr($hashed_key, config('app.cipher'));
            $data['private_key'] = $encrypter->encrypt($data['private_key']);
            $data['public_key'] = $encrypter->encrypt($data['public_key']);

            // save the data
            $user = new User;
            $user->email = $request->input('email');
            $user->fill($data);
            $user->save();

            auth()->login($user);
            // create the token and login the user to the system
            $token = auth('api')->login($user);
            // update the token
            self::updateToken($user, $token);
            // hit the sdk api's
            DB::commit();
            return response()->json(['message' => 'Signup successfull!', 'redirectTo' => route('member.dashboard')], 200);
        } catch(Exception $e) {
            DB::rollback();
            return response()->json(['message' => __('something went wrong')], 500);
        }
    }

    /**
     * Login the user
     */
    public function login(LoginRequest $request)
    {
        // get the user and check if it exists then get the details and match
        $user = User::where('email', $request->input('email'))->latest()->first();

        if (!$user) {
            return response()->json(['errors' => ['email' => ['Please enter valid email / password.']]]);
        }

        // Create the Argon2 Hash
        $combined_string = $user->email . $user->salt . $request->input('password');
        $hashed_key = self::generateHash($combined_string);

        // decrypt the public  and private keys
        $encrypter = new Encrypterr($hashed_key, config('app.cipher'));
        $private_key = $encrypter->decrypt($user->private_key);
        $public_key = $encrypter->decrypt($user->public_key);

        // encrypt the data with public key and decrypt it with private key
        $encrypted_data = self::encrypt($user->email, $public_key);
        $decypted_data = self::decrypt($encrypted_data, $private_key);

        // check data is same or not
        if ($user->email == $decypted_data) {
            // login the user and create the session for laravel
            auth()->login($user);
            // create the token and login the user to the system
            $token = auth('api')->login($user);
            // update the token
            self::updateToken($user, $token);
            return response()->json(['message' => 'Logn successfull!', 'redirectTo' => route('member.dashboard')], 200);
        }
        return response()->json(['message' => 'Please enter valid credentails.'], 500);
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthAPIController extends Controller
{
    //Register

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'level' => 'required',
        ]);
        
        if($validator->fails())

        {
            return response()->json(['status_code'=>400, 'message'=>'Bad Reqest']);
        
        }
        
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->save();

        return response()->json([
            'status_code'=>200,
            'message'=> 'User created successfully'
        ]);

    }

    //login

    public function login_token(Request $request){
      
            $validator = Validator::make($request->all(),[
                'email' => 'required',
                'password' => 'required'

            ]);
            
            if($validator->fails())
            {
                return response()->json(['status_code' => 400, 'message' => 'Bad Request']);
            }

            $credentials = request(['email', 'password']);

            if (!Auth::attempt($credentials)){
                return response()->json([
                    'status_code' => 500,
                    'message' => 'Unauthorized'
                ]);
            }

            $user = User::where('email', $request->email)->first();
            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'status_code' => 200,
                'token' => $tokenResult
            ]);

    }

    public function proses_login_api(Request $request)
    {

        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]);

            $kredensil = $request->only('email','password');

            if(Auth::attempt($kredensil))
            {
                
                $user = Auth::user();
                if($user->level == 'admin'){
                    return response()->json([
                        'status_code'=>200,
                        'message'=>'login admin successfully'
                    ]);
                } elseif ($user->level == 'owner'){
                    return response()->json([
                        'status_code'=>200,
                        'message'=>'login owner successfully'
                    ]);
                }
                return redirect()->intended('/');
            }
            return redirect('login') -> withInput() -> withErrors(['login_gagal' => 'These credentials do not match our records.']);
        }


        public function logout(Request $request)
        {
            $request->user()->currentAccessToken()->delete();
            return response()->json([
                'status_code'=>200,
                'message'=> 'Token deleted successfully'
            ]);
        }
}

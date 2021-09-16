<?php

namespace App\Http\Controllers;

use App\models\User;
use Illuminate\support\facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    //Register
    public function register()
    {
        return view('register');
    }


    public function registerProses(Request $request)
    {
        $validator = Validator::make($request->all(), 
        // $request->validate([
        [
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'level' => 'required',
        ],
        [
            'username.required' => 'Username kosong nih isi dong',
            'name.required' => 'Name Kosong nih isi dong',
            'email.required' => 'email Kosong nih isi dong',
            'password.required' => 'password Kosong nih isi dong',
            'level.required' => 'password Kosong nih isi dong',

        ]
        );
             
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->save();



        return redirect('login')->with('status', 'Successfully register for yout account');

    }

        public function proses_login(Request $request)
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
                            return redirect()->intended('/home');
                        } elseif ($user->level == 'owner'){
                            return redirect()->intended('/home');
                        }
                        return redirect()->intended('/');
                    }
                    return redirect('login') -> withInput() -> withErrors(['login_gagal' => 'These credentials do not match our records.']);  
                   
                }

        public function logout(Request $request)

        {

            $request->session()->flush();
            Auth::logout();
            return Redirect('login');
    }

    //untuk index

    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->level == 'admin') {
                return redirect()->intended('/home');
                } elseif ($user->level == 'owner') {
                return redirect()->intended('/home');
                }
            }
        return view('login');
    }
}

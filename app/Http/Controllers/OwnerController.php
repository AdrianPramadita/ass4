<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;

class OwnerController extends Controller
{
    //
    public function index()
    {
        //
        return view('owner/index');
    }

    public function UpdateAkun(Request $request){
        $data = DB::table('user')->where('id',$request->id)->update ([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'level' => $request->level,
            
        ]);

        $res['message'] = "Success!";
        $res['values'] = $data;
        return response($res);

    }
}

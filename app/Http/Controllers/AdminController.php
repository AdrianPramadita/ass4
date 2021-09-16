<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        return view('admin.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add()
    {
        return view('admin.add');
    }

    public function addProses(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'username' => 'required',
            'email'    => 'required',
            'password' => 'required',
        ],
        [
            'name.required' => 'nama kosong nih isi dong',
            'username.required' => 'username Kosong nih isi dong',
            'email.required' => 'email Kosong nih isi dong',
            'password.required' => 'password Kosong nih isi dong'

        ]
                );

        DB::table('users')->insert([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'Level' => $request->level
        ]);
        return redirect('admin')->with('status', 'Successfully added admin account');
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = DB::table('users')->where('id', $id)->first();
        return view('admin.edit', compact('users'));
    }

    public function editProses(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required',
            'username' => 'required',
            'email'    => 'required',
            'password' => 'required',
        ]);

        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'Level' => $request->level
        ]);
        return redirect('admin')->with('status', 'Successfully update admin account');
    }

    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('admin')->with('status', 'Successfully delete admin account');
    }


}

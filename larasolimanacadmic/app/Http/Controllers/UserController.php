<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('superAdmin');
    }

    public function index()
    {
        $admins = User::all();
        return view('incu.admin.index',compact('admins'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            //required Admin Information
            'name' => 'required | max:30 | string',
            'email' => 'required | max:80 | email | unique:users',
            'password' => 'required | max:16 | min:6',
        ]);
        $user = new User();
        if ($request->ajax()) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->admin = 'admin';
            if ($request->password != null) {
                $user->password = \Hash::make($request->password);
                $user->save();
            }
        }
        return Response($user);
    }

    public function show($id)
    {
        //
    }


    public function edit($id, Request $request)
    {
        $user = new User();
        if($request->ajax()) {
            $user = User::find($id);
        }
        return Response($user);
    }
    public function update($id, Request $request){

    }
    public function UpdateAdmin(Request $request)
    {
        $this->validate($request, [
            //required Admin Information
            'name' => 'required | max:30 | string',
            'email' => 'required | max:80 | email | unique:users,email,' . $request->id,
            'password' => 'nullable |max:16 | min:6',
        ]);
        $user = User::find($request->id);
        if ($request->ajax()){
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password != null && $request->password !== '' && strlen($request->password) != 0) {
                $user->password = \Hash::make($request->password);
            }
            $user->save();
        }
        return Response($user);
    }

    public function destroy($id, Request $request)
    {
        if ($request->ajax()) {
            $user = User::find($id);
            User::destroy($id);
            return Response($user);
        }
    }
}

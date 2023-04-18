<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userView()
    {
        $allUsers = User::all();
        // $data['allUsers'] = User::all();
        return view('backend.user.view_user', compact('allUsers'));
    }

    public function userAdd()
    {
        return view('backend.user.add_user');
    }

    public function userRegister(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|unique:users',
                'name' => 'required',
                'usertype' => 'required',
                'password' => 'required',
            ],
            [
                'email.unique' => 'The email address is already in use'
            ]
        );

        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'User Registered Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function userEdit($id)
    {
        $user = User::find($id);
        return view('backend.user.edit_user', compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'email' => 'required',
                'name' => 'required',
                'usertype' => 'required',
            ],
        );

        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function userDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}

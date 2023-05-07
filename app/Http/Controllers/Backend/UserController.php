<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userView()
    {
        $allUsers = User::where('usertype', 'Admin')->get();
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
            ],
            [
                'email.unique' => 'The email address is already in use'
            ]
        );

        $data = new User();
        $code = rand(0000, 9999);
        $data->usertype = 'Admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($code);
        $data->code = $code;
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

        $data = User::find($id);

        $request->validate(
            [
                'email' => 'required|unique:users,email,' . $data->id,
                'name' => 'required',
                'usertype' => 'required',
            ],
        );

        $data->role = $request->role;
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

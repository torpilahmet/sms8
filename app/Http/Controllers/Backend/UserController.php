<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function UserView()
    {
        $users = User::all();

        return view('admin.users.view_user', compact('users'));
    }

    public function UserAdd()
    {

        return view('admin.users.add_user');
    }

    public function UserStore(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required'
        ]);

        $data = new User();
        $data->usertype  =$request->usertype;
        $data->name  =$request->name;
        $data->email  =$request->email;
        $data->password  =bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'User Created Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.users.view')->with($notification);

    }

    public function UserEdit($id)
    {
        $data = User::findorFail($id);

        return view('admin.users.edit_user', compact('data'));
    }

    public function UserUpdate(Request $request, $id)
    {
        $validateData = $request->validate([
            'email' => 'required|unique:users,email,'.$id,
            'name' => 'required',
        ]);

        $data = User::find($id);
        $data->usertype  =$request->usertype;
        $data->name  =$request->name;
        $data->email  =$request->email;
        $data->password  = empty($request->password) ? $data->password : bcrypt($request->password) ;
        $data->save();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.users.edit', $data->id)->with($notification);
    }

    public function UserDestroy($id)
    {
        $deleteUser = User::find($id);

        $deleteUser->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.users.view')->with($notification);

    }

}

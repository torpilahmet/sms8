<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function ProfileView()
    {
        $profileID = Auth::user()->id;
        $profile = User::find($profileID);

        return view('admin.users.view_profile', compact('profile'));
    }

    public function ProfileEdit()
    {
        $profileID = Auth::user()->id;
        $editData = User::find($profileID);

        return view('admin.users.edit_profile', compact('editData'));
    }
}

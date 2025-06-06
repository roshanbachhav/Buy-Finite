<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $users = User::orderByRaw("role = 'admin' DESC")->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.users.users', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('getAllUsers')->with('success', 'user deleted successfully!');
    }
}
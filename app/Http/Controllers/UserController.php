<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
 public function index()
    {
        // Get all users except the one currently logged in 
        $users = User::where('id', '!=', auth()->id())->get();
        return view('users.index', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,admin',
        ]);

        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', "Role for {$user->name} updated successfully!");
    }
}

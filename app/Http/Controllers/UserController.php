<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        $users = User::all();
        $roles = Role::all();
        return view('users.list', compact('users', 'roles'));
    }

    public function assignRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|string|exists:roles,name',
        ]);

        $user->assignRole($request->input('role'));

        return response()->json(['message' => 'Role assigned successfully'], 200);
    }

    public function assignRoles(Request $request)
    {
        $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
            'role' => 'required|string|exists:roles,name',
        ]);

        $users = User::whereIn('id', $request->input('user_ids'))->get();
        foreach ($users as $user) {
            $user->assignRole($request->input('role'));
        }

        return response()->json(['message' => 'Roles assigned successfully'], 200);
    }
}

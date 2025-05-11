<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function toggleRole(User $user)
    {
        $user->role = $user->role === 'ADMIN' ? 'USER' : 'ADMIN';
        $user->save();
        return back()->with('success', 'Rôle mis à jour.');
    }

    public function toggleActive(User $user)
    {
        $user->active = !$user->active;
        $user->save();
        return back()->with('success', 'Statut de l’utilisateur mis à jour.');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_roles' => Role::count(),
            'active_ships' => 12, // Mock data
            'pending_reports' => 5, // Mock data
        ];

        return view('dashboard', compact('stats'));
    }
}

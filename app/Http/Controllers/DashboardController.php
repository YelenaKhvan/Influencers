<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Dashboard;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Dashboard::class, 'dashboard');
    }

    public function inDash()
    {
        return view('dash.dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render("home");
    }
    public function dashboard()
    {
        return Inertia::render("inventory");
    }
}

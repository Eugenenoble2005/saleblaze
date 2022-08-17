<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render("home");
    }
    public function inventory()
    {
        return Inertia::render("inventory");
    }
    public function staff()
    {
        return Inertia::render("staff");
    }
}

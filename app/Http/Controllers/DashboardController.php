<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render("home");
    }
    public function staff()
    {
        return Inertia::render("staff");
    }
    public function credit()
    {
        return Inertia::render("credit");
    }
}

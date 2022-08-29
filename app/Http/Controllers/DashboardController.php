<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render("home",["sales"=>\Auth::user()->purchase()->latest()->get()]);
    }
    public function credit()
    {
        return Inertia::render("credit");
    }
}

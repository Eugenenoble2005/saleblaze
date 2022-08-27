<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function index()
    {
        return inertia("purchases",["purchases"=>\Auth::user()->purchase()->latest()->get()]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Purchase $purchase)
    {
    }

    public function edit(Purchase $purchase)
    {
    }

    public function update(Request $request, Purchase $purchase)
    {
    }

    public function destroy(Purchase $purchase)
    {
    }
}

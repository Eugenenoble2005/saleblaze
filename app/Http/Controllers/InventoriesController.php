<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use Illuminate\Http\Request;

class InventoriesController extends Controller
{
    public function index()
    {
        return inertia("inventory",["goods"=>\Auth::user()->inventory()->latest()->get()]);
    }

    public function create(Request $request)
    {
        if(\Auth::user()->inventory()->create(["name" => $request->name,"cost" => $request->cost,"price" => $request->price,"units" =>$request->units])){
            return response(["state"=>true,"message"=>"Inventory updated successfully "]);
        }
        return response(["state"=>false,"message"=>"Could not update inventory"]);
    }

    public function store(Request $request)
    {
    }

    public function show(inventory $inventory)
    {
    }

    public function edit(inventory $inventory)
    {
    }

    public function update(Request $request, inventory $inventory)
    {
    }

    public function destroy(inventory $inventory)
    {
    }
}

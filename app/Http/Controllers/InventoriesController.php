<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use http\Env\Response;
use Illuminate\Http\Request;

class InventoriesController extends Controller
{
    public function index()
    {
        return inertia("inventory",["goods"=>\Auth::user()->inventory()->latest()->get()]);
    }

    public function create(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            "name"=>"required",
            "cost"=>"required|numeric",
            "price"=>"required|numeric|min:5",
            "units"=>"required|numeric|min:5",
        ]);
        if($validator->fails()){
            return response(["state"=>false,"message"=>$validator->errors()->all()]);
        }
        if(\Auth::user()->inventory()->create(["name" => $request->name,"cost" => $request->cost,"price" => $request->price,"units" =>$request->units])){
            return response(["state"=>true,"message"=>"Inventory updated successfully "]);
        }
        return response(["state"=>false,"message"=>"Could not update inventory"]);
    }
    public function recordPurchase(inventory $inventory,Request $request)
    {
        $validator = \Validator::make($request->all(),[
            "units"=>["min:1"]
        ]);
        if($validator->fails()){
            return response(["state"=>false,"message"=>$validator->errors()->all()[0]]);
        }
        if($inventory->units_left < $request->units){
            return response(["state"=>false,"message"=>"You dont have enough of this good in your inventory to ship this unit. Please add more"]);
        }
        if($inventory->purchase()->create([
            "customer_name" => $request->customer_name,
            "units" => $request->units,
            "amount" => $inventory->price * $request->units,
            "merchant_id" => \Auth::id()
        ])) {
            return response()->json(["state" => true, "message" => "Sale Recorded Successfully. Please check your purchases page for more info"]);
        }
        return response(["state"=>false,"message"=>"Sale could not be recorded"]);
    }
    public function addUnit(Inventory $inventory,Request $request)
    {
        if($inventory->increment("units",$request->units))
        {
            return response(["state"=>true,"message"=>"Inventory increased for this good successfully"]);
        }
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

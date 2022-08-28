<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        return inertia("staff",["staffs"=>\Auth::user()->staff()->latest()->get()]);
    }

    public function create(Request $request)
    {
       if( \Auth::user()->staff()->create(["name"=>$request->name,"role"=>$request->role])):
           return response(["state"=>true,"message"=>"Staff list updated succesfully"]);
       endif;
       return response(["state"=>false,"message"=>"Staff List could not be updates"]);

    }
    public function paySalary(Request $request)
    {
        $url = "https://fsi.ng/api/v1/wema/alatpay-pc/api/v1/paymentCard/mc/initialize";
        $response = \Http::withoutVerifying()->withHeaders(["sandbox-key"=>env("FSI_KEY")])->post($url,["cardNumber"=>$request->card]);
        return response($response);
    }
    public function store(Request $request)
    {
    }

    public function show(staff $staff)
    {
    }

    public function edit(staff $staff)
    {
    }

    public function update(Request $request, staff $staff)
    {
    }

    public function destroy(staff $staff)
    {
    }
}

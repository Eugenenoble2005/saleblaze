<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    public function index()
    {
        return inertia("credit",["loans"=>\Auth::user()->loans()->latest()->get()]);
    }

    public function create(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            "creditor"=>["required","min:3"],
            "amount"=>["numeric","required","min:100"],
            "interest"=>["required","numeric","min:5"],
            "duration"=>["required","numeric"]
        ]);
        if($validator->fails()){
            return response(["state"=>false,"message"=>$validator->errors()->all()[0]]);
        }
        if(\Auth::user()->loans()->create(["creditor_name" => $request->creditor,"amount"=>$request->amount,"interest" => $request->interest,"duration" =>$request->duration ])){
            return response(["state"=>true,"message"=>"Loan recorded succesfully"]);
        }

    }
    public function markAsPaid(Loan $loan)
    {
        $loan->repaid = true;
        $loan->date_repaid = now();
        $loan->save();
        return response(["state"=>true]);
    }
    public function show(Loan $loan)
    {
    }

    public function edit(Loan $loan)
    {
    }

    public function update(Request $request, Loan $loan)
    {
    }

    public function destroy(Loan $loan)
    {
    }
}

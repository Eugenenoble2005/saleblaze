<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthenticationController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            "email"=>["required","email","unique:merchants"],
            "shop_name"=>["required","min:7","unique:merchants"],
            "password"=>["min:7","required"]
        ]);
        $user = new Merchant();
        $user->shop_name = $request->shop_name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        if($user->save()):
            return Inertia::location(route("dashboard.index"));
        endif;
    }
    public function signin(Request  $request)
    {
        if( \Auth::attempt(["email"=>$request->email,"password"=>$request->password])):
            return Inertia::location(route("dashboard.index"));
        endif;
        return inertia("Authentication/signin",["error"=>"These Credentials are incorrect","logo"=>asset("images/saleblaze-logo.png")]);
    }
}

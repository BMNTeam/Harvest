<?php

namespace App\Http\Controllers;

use App\Stock;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Farms extends Controller
{
    public function getAllCultures() {
        $users = User::all();
        $user_id = Auth::User()->id;
        $in_all_stocks = Stock::where([
            ['user_id', '!=', $user_id],
            ['corns', '>', '0']
        ])->get();
        foreach ($in_all_stocks as $stock ){
            $current_user_id = $stock->user_id;
            $stock->farm_name = $users->where('id', $current_user_id)->first();
        }

        return view('default_farms', [
            'stocks' => $in_all_stocks
        ]);
    }
}

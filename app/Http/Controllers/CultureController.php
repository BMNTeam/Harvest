<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Culture;

class CultureController extends Controller
{
    public function addCulture($culture_name) {
         $culture = new Culture();

         $culture->culture_name = $culture_name;
         $culture->save();

        return redirect()->back();
    }

    public function removeCulture($culture_name) {
       $culture_to_remove =  Culture::where('culture_name', $culture_name);
       $culture_to_remove->delete();

       return redirect()->back();
    }
}

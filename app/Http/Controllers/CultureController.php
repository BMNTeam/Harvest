<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Culture;

class CultureController extends Controller
{
    public function addCulture(Request $request) {

        if( ! empty( $request['culture']) )
        {
            $this->validate($request,[
                'culture' => 'required'
            ]);

            $culture = new Culture();

            $culture->culture_name = $request['culture'];
            $culture->save();
            return redirect()->back();
        }





    }


    public function getCulture(Request $request) {

        if( ! empty( $request['select-culture-name']) )
        {

            $cultures = Culture::all();


            return view('cultures', [
                'cultures' => $cultures
            ]);
        }





    }



    public function removeCulture($culture_name) {
       $culture_to_remove =  Culture::where('culture_name', $culture_name);
       $culture_to_remove->delete();

       return redirect()->back();
    }

    public function getCultures(){
        $cultures = Culture::all();


        return view('cultures', [
            'cultures' => $cultures
        ]);
    }

    public function postCultures(Request $request){

    }
}

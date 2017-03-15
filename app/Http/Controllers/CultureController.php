<?php

namespace App\Http\Controllers;

use App\Sort;
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




        if( ! empty( $request['sort']) )
        {
            $this->validate($request,[
                'sort' => 'required'
            ]);


            $sort = new Sort();

            $sort->sort_name =      $request['sort'];
            $sort->culture_id =     $request['select-culture-name'];
            $sort->save();

            return redirect()->back();
        }






    }

    //Get cultures according GET request

    public function getCulture(Request $request) {

        if( ! empty( $request['select-culture-name']) )
        {
            $culture_id = $request[ 'select-culture-name' ];
            $cultures = Culture::all();
            $sort = Sort::all();

            $sorts = $sort->where( 'culture_id', $culture_id)->all();

            return view( 'cultures', [
                'cultures' => $cultures,
                'sorts'    => $sorts
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

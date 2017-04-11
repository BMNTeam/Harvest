<?php

namespace App\Http\Controllers;

use App\Reproduction;
use App\Sort;
use App\Stock;
use Illuminate\Http\Request;
use App\Culture;

class CultureController extends Controller
{
    public function addCulture(Request $request) {

        if( ! empty( $request['culture']) && ! isset( $request['create-element-in-stock']) )
        {
            $this->validate($request,[
                'culture' => 'required'
            ]);

            $culture = new Culture();

            $culture->culture_name = $request['culture'];
            $culture->save();
            return redirect()->back();
        }




        if( ! empty( $request['sort']) && empty($request['reproduction'])  )
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

        if (empty( $request['select-culture-name']))
        {
            return redirect()->back();
        }

        if( ! empty( $request['select-culture-name']) && empty( $request['select-sort-name']) )
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

        if( ! empty( $request['select-sort-name']) )
        {
            $default_reproduction_name = 'ЭС';
            $sort_id = $request[ 'select-sort-name' ];
            $cultures  = Culture::all();
            $sorts = Sort::all()->where('culture_id', $request['select-culture-name']);
            $reproductions = Reproduction::all();

            foreach ($reproductions as $reproduction){
                if( $reproduction->reproduction_name === $default_reproduction_name){
                    $reproduction->checked_by_default = true;
                }else{
                    $reproduction->checked_by_default = false;
                }
            }


            return view( 'cultures', [
                'cultures' => $cultures,
                'sorts'    => $sorts,
                'reproductions' => $reproductions
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

    public function addElementToStock (Request $request)
    {
            $stocks = Stock::where(  'reproduction_id', $request['reproduction'])->first();
            $stock = new Stock();

            $stock->reproduction_id = intval($request['reproduction']);
            $stock->sort_id = intval($request['select-sort-name']);
            $stock->culture_id = intval($request['select-culture-name']);
            $stock->vall  = 0;
            $stock->corns = 0;

            if($stocks !== null ) {
                return redirect()->back()->withErrors(['msg' => 'Данная репродукция есть на складе']);
            }else {
                $stock->save();
                return redirect()->route('applications');
            }



    }

    public function test(){

    }


}

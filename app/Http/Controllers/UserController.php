<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function postSignUp(Request $request)
    {
        // Google reCaptcha part
        $recaptcha = $request['g-recaptcha-response'];
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $query_fields = [
            'secret' => '6LdoDSAUAAAAAKdIku4akxFyqQ5AsiQyREwakmFr',
            'response' => $recaptcha
        ];
        $http_query = http_build_query($query_fields);

        //cURL
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$http_query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        $result = json_decode($result);
        /*End cUrl*/

        if( $result->success === true ){

            $this->validate( $request, [
                'email'         => 'required|email|unique:users',
                'name'          => 'required|max:120',
                'password'      => 'required|min:4'
            ]);

            $email          = $request['email'];
            $name     = $request['name'];
            $password       = bcrypt($request['password']);

            $user = new User();
            $user->email                = $email;
            $user->name                 = $name;
            $user->password             = $password;

            $user->save();

            Auth::login($user);

            return redirect()->route('users');
        }else{

            return redirect()->back()->withErrors(['reCaptcha' => 'А вы точно не робот?']);
        }






    }

    public function postSignIn(Request $request)
    {
        $this->validate( $request, [
            'name'         => 'required',
            'password'      => 'required'
        ]);

        if( Auth::attempt([
                'name' => $request['name'],
                'password' => $request['password']
            ], true
        ) ) {
            return redirect( route( 'users') );
        }
        return redirect()->back();
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('login');
    }
}

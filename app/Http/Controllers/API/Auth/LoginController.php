<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function processLogin(ProcessLoginRequest $request){
        $remember= $request->input('remember')? true : false ;
        $data =[
            'email'=>$request->email,
            'password'=>$request->password

        ];
    
        if(Auth::attempt($data,$remember))
        {
            $user = Auth::user();
            
            return response()->json([
                'success' => 'success',
                'user' => $user
            ]);

        }else{
            return response()->json(
                [
                    'error' => 'Unauthorised'
                ], 401);
        }
    }

    public function Logout(){

        session()->flush();
        auth()->Logout();
        return response()->json([

            'success' => 'success !!'

        ]);
        
    }
}  

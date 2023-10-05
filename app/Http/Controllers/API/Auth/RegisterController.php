<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function processRegister(ProcessRegisterRequest $request)
    {

        $data = $request->all();

        if ($data['password'] === $data['retype-password']) {

            $data['password'] = Hash::make($request->password);
            $user =  User::create($data);
            return response()->json(
                [
                    'success' => 'success!'
                ],200
               
            ); 
        } else {
            return response()->json(
                [
                    'error' => 'error!'
                ],
               
            ); 
        }
    }
}

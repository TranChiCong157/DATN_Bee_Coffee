<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use Stevebauman\Location\Facades\Location;


class testController extends Controller
{
    public function index(Request $request){
        
         // Lấy địa chỉ IP của người dùng
    $ipAddress = $request->ip();
 
    // Sử dụng thư viện GeoIP để xác định vị trí vật lý
    $location = Location::get('14.248.94.63');

    dd( $location);

    }
}

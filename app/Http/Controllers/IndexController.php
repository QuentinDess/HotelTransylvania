<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Room;

class IndexController extends Controller
{
    public function showIndex()
    {
        $staffs= User::where('role', 'personnel')
        ->orWhere('role', 'manager')
        ->orWhere('role','proprietaire')
        ->get();
        $rooms=Room::all();
      
        
        return view('welcome', compact('staffs','rooms'));
    }
}

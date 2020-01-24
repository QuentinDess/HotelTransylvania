<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Room;
use App\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //controller pour montrer les membres du staff
    public function showStaff()
    {
        $users= User::all();
        $rooms=Room::all();
        return view('espaceStaff', compact('users','rooms'));
    }
    //controller pour montrer les clients
    public function showAllClient()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeClient(Request $request)
    {
        
    }
    public function storeStaff(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showClient($id)
    {
        $rooms=Room::all();
        $user=User::find($id);
        $bookings= Booking::all()->where('user_id',$id);
        
       
       return view('espaceClient', compact('user','bookings','rooms'));
    }
    
    
    public function showAdmin()
    {
        $users= User::all();
        $rooms=Room::all();
        return view('espaceAdmin', compact('users','rooms'));
    }
    public function showRegister()
    {
        return view('addUser');
    }
    public function addUser(Request $request)
    {
        $user = new User([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=>$request->role,
            'wage'=>$request->wage,
            'avatar'=>$request->avatar,
            'postalCode'=>$request->postalCode,
            'phoneNumber'=>$request->phoneNumber
            ]);
            $user->save();
            return redirect('/homeAdmin');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request,$id)
    {
        $user = User::find($id);    
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role=$request->role;
        $user->wage=$request->wage;
        $user->avatar=$request->avatar;
        $user->postalCode=$request->postalCode;
        $user->phoneNumber=$request->phoneNumber;   
        $user->save();
        return redirect('/');
    }
    public function editUser($id)
    {
        $user=User::find($id);
        return view('editUser',compact('user'));
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteUser($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('/');
    }
}

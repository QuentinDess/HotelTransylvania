<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms=Room::all();
        return view('showRoom', compact('rooms'));
    }
    public function showOneRoom($id)
    {
        $room=Room::find($id);
        return view('booking',compact('room'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRoom()
    {
        return view('createRoom');
    }
    public function postRoom(Request $request)
    {
        $room = new Room([
            'name' => $request->name,
            'price' => $request->price,
            'avatar' => $request->avatar,
            'size' => $request->size,
            'description'=>$request->description,
            'doorNumber'=>$request->doorNumber
            
            ]);
        
            $room->save();
    
            return redirect('/homeAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editRoom($id)
    {
        $room=Room::find($id);
        return view('editRoom',compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRoom(Request $request, $id)
    {
        $room = Room::find($id);    
        $room->name = $request->name;
        $room->price = $request->price;
        $room->doorNumber = $request->doorNumber;
        $room->avatar = $request->avatar;
        $room->size=$request->size;
        $room->description=$request->description;   
        $room->save();
        return redirect('/homeAdmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteRoom($id)
    {
        $room=Room::find($id);
        $room->delete();
        return redirect('/homeAdmin');
    }
}

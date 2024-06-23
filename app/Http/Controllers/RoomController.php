<?php

namespace App\Http\Controllers;


use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return Room::where('is_available', true)->get();
    }
}

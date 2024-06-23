<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Room;
use App\Models\RoomLog;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function checkIn(Request $request)
    {
        $room = Room::findOrFail($request->room_id);
        if ($room->is_available) {
            $patient = Patient::create([
                'name' => $request->name,
                'room_id' => $room->id,
            ]);

            $room->update(['is_available' => false]);

            RoomLog::create([
                'room_id' => $room->id,
                'status' => 'checkin',
                'timestamp' => now(),
            ]);

            return response()->json($patient, 201);
        } else {
            return response()->json(['error' => 'Room is not available'], 400);
        }
    }

    public function checkOut(Request $request)
    {
        $patient = Patient::findOrFail($request->patient_id);
        $room = $patient->room;

        $patient->delete();
        $room->update(['is_available' => true]);

        RoomLog::create([
            'room_id' => $room->id,
            'status' => 'checkout',
            'timestamp' => now(),
        ]);

        return response()->json(['message' => 'Patient checked out successfully'], 200);
    }
}

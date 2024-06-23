<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomLog extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'status', 'timestamp'];

    public function room()
    {
        return $this->belongTo(room::class);
    }    
}

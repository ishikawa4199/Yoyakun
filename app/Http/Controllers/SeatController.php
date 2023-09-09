<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seat;

class SeatController extends Controller
{
    public function createSeat(){
        $seat = new Seat;
        $seat->createSeat();

    }
}

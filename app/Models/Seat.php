<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Slip;


class Seat extends Model
{
    use HasFactory;

    protected $table = "seats";
    protected $fillable = [
        'seat_id',
        'seat_num',
        'status',
    

    ];
    public function slips(){
        return $this->hasMany('App\Models\Slip','seat_num','seat_num');

    }

    public function createSeat(){
        return $this->create([
            'seat_id' => (string)Str::uuid(),
            'seat_num' => mt_rand(101,500)

        ]);
    }

    public function getSeat($seat_num){
        return $this->where('seat_num',$seat_num)->first();
    }



    


}

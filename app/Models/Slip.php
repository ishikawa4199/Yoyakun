<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Slip extends Model
{
    use HasFactory;
    protected $table = "slips";
    protected $fillable = [
        'slip_id',
        'slip_num',
        'seat_num',
        

    ];
    
    public function seats(){
        return $this->belongsTo('App\Models\Seat','seat_num','seat_num');

    }


    public function orders(){
        return $this->hasMany('App\Models\Order','slip_num','slip_num');
        
    }

    public function createSlip($seat_num){
        return $this->create([
            'slip_id' => (string)Str::uuid(),
            'slip_num' => mt_rand(10001,99999),
            'seat_num' => $seat_num



        ]);
    }

    public function getSlipBySeat($seat_num){
        //status = 1 : お支払い未完了伝票
        //status = 2 : お支払い完了伝票
        $slips = $this->where('seat_num',$seat_num)->where('status',1)->get();
        return $slips;

    }


    public function getSlipNumBySeat($seat_num){
        $slip_num = []; 
        $slips =  $this->getSlipBySeat($seat_num);
        
    
        foreach($slips as $slip){
            array_push($slip_num,$slip->slip_num);
        }
        
        return $slip_num;

        
    }

    public function accountComplete($seat_num){
        $slip_nums = $this->getSlipNumBySeat($seat_num);
        foreach($slip_nums as $slip_num){
            $this->updateSlipStatus($slip_num);
        }
        
    }


    public function updateSlipStatus($slip_num){
        return $this->where('slip_num',$slip_num)->update(['status' => 2]);
    }
    

    public function getSlipNum($slip_num,$status){
        return $this->where('slip_num','=',$slip_num)->where('status','=',$status)->get();

    }

    public function getSlipNumsByStatus($status){
        return $this->where('status',$status)->get();
        
    }

}

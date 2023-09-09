<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        'orders_id',
        'slip_num',
        'product_id',
        'quantity'

        

    ];


    


    public function slips(){
        return $this->belongsTo('App\Models\Slip','slip_num','slip_num');

    }
    
    public function products(){
        return $this->belongsTo('App\Models\Product','product_id','product_id');

    }


    public function createOrder($product_id,$quantity){
        return $this->create([
            'orders_id' => (string)Str::uuid(),
            'slip_num' => mt_rand(10001,99999),
            'product_id' => $product_id,
            'quantity' => $quantity


        ]);
    }

    public function findOrderBySlip($slip_num){
        $orders = $this->where('slip_num',$slip_num)->get();
        $products = [];
        foreach($orders as $order){
            array_push($products, [
                'product_id' => $order->product_id,
                'quantity' => $order->quantity
            
            ]);

        }
    
        return $products;


    }












}

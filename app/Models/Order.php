<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Slip;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        'orders_id',
        'slip_num',
        'product_id',
        'quantity',
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
        $product = new Product;
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


    public function getOrdersInfo($slip_num){
        $product = new Product;
        $slip = new Slip;
        
        $orders = $this->where('slip_num',$slip_num)->orderBy('created_at','desc')->get();
        
        $ordersInfo = [];
        foreach($orders as $order){
            
            $productInfo = $product->getProductInfo($order->product_id);
            $seat_num = $order->slips->seat_num;


            array_push($ordersInfo,[
                'product_id' => $order->product_id,
                'name' => $productInfo['name'],
                'quantity' => $order->quantity,
                'price' => $productInfo['price'],
                'slip_num' => $order->slip_num,
                'seat_num' => $seat_num,

                
            ]);
        }
        return $ordersInfo;





    }



    public function getOrders(){
        $ordersList = [];
        $slip = new Slip;
        $status = 1;

        $slips = $slip->getSlipNumsByStatus($status);
        
        
        
        

        foreach($slips as $sl){
            
            $infos = $this->where('slip_num','=',$sl->slip_num)->get();
            foreach($infos as $index=>$info){
                $ordersInfo = $info->getOrdersInfo($info->slip_num);
                array_push($ordersList,$ordersInfo[$index]);
            }
        }
        return $ordersList;
        
    }



    











}

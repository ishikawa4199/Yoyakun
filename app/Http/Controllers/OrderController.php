<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Slip;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use function Ramsey\Uuid\v1;

class OrderController extends Controller
{


    private $seat_num = 155;



    public function store(Request $request){
        
        $order = new Order;
        $slip = new Slip;
        $order_products = [];
        $sessionCartData = $request->session()->get('cartData');
        $memory = $slip->createSlip($this->seat_num);

        foreach($sessionCartData as $data){
            $order->create([
                'orders_id' => (string)Str::uuid(),
                'slip_num' => $memory->slip_num,
                'product_id' => $data['session_product_id'],
                'quantity' => $data['session_quantity'],     
            ]);
        }
    
        
        $slip_nums = $slip->getSlipNumBySeat($this->seat_num);
        foreach($slip_nums as $num){
            array_push($order_products,$order->findOrderBySlip($num));
                
        }

        $request->session()->forget('cartData');
        return redirect(route('product.list'));

    }

    public function addCart(Request $request){
        $cartData = [

            'session_product_id' => $request->product_id,
            'session_quantity' => $request->quantity
        ];
        
   
        

        
        if(!$request->session()->has('cartData')){
            $request->session()->push('cartData',$cartData);
        }else{
            $sessionCartData = $request->session()->get('cartData');
            $isSameProductId = false;
            foreach($sessionCartData as $index => $sessionData){
                if($sessionData['session_product_id'] === $cartData['session_product_id']){
                    $isSameProductId = true;
                    $quantity = $sessionData['session_quantity'] + $cartData['session_quantity'];
                    $request->session()->put('cartData.'.$index.'.session_quantity',$quantity);
                    break;

                }
            }

            if ($isSameProductId === false) {
                $request->session()->push('cartData', $cartData);
            }

            
        }
        
        
        return redirect(route('product.list'));

    }


    public function remove(Request $request,$index){
    
              
        $cartData = $request->session()->get("cartData");
        $split = array_splice($cartData,$index,1);
        $request->session()->put('cartData',$cartData);

        return redirect(route('cart.list'));
        
        
        
    }



    public function cartList(Request $request){
        
        $cartData = $request->session()->get('cartData');
        if($cartData){
            $cartData = array_values($request->session()->get('cartData'));     
        }

        if(!empty($cartData)){
            
            foreach($cartData as $index => &$data){
                $model = Product::where('product_id',$data['session_product_id'])->first();
                $data['product_id'] = $model->product_id;
                $data['name'] =  $model->name;
                $data['quantity'] = $data['session_quantity'];
                $data['price'] = $model->price;
                $data['itemPrice'] = $data['price']*$data['session_quantity'];
    
     
                
            }
            
            return view('admin.cart.list',['cartData' => $cartData]);

        }else{
            return view('admin.cart.noCart');
        }




    }


    public function accountList($seat_num){
        $slip = new Slip;
        $order = new Order;
        $product = new Product;
        $slip_nums = $slip->getSlipNumBySeat($seat_num);
     
        if(!empty($slip_nums)){

            
            $orders_data = [];
            foreach($slip_nums as $slip_num){
                $orders = $order->findOrderBySlip($slip_num);
                foreach($orders as $index => $or){
                    $products = $product->getProductInfo($or['product_id']);
                    
                    array_push($orders_data,[
                        'seat_num' => $seat_num,
                        'name'=>$products['name'],
                        'price'=>$products['price'],
                        'quantity'=>$or['quantity'],
                        'itemPrice'=>$products['price'] * $or['quantity']
                    ]);
                }
                
                
            }
            
            return view('admin.account.accountList',['data'=>$orders_data]);
        }else{
            return redirect(route('product.list'));
        }

    }

    public function accountComplete(Request $request){
        $slip = new Slip;
        $slip->accountComplete($request->seat_num);
        return view('admin.account.complete');

    }
    
    public function ordersList(){
        return view('admin.order.ordersList');

    }

    public function getOrdersList(){
        $order = new Order;
       return response()->json($order->getOrders());
    }


}

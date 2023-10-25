<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        'product_id',
        'name',
        'price',
        'status',
        'category'


    ];

    public function orders(){
        return $this->hasMany('App\Models\Order','product_id','product_id');

    }


    public function getName(){
        return $this->name;

    }

    public function productImage(){
        return $this->hasMany('App\Models\ProductImage','product_id','product_id');
    }

    


    public function createProduct(Request $request){
        

        
        return $this->create([
            'product_id' => (string)Str::uuid(),
            'name' => $request->name,
            'price' => $request->price,
            


        ]);

        
    }

    public function getProductInfo($product_id){
        $product = $this->where('product_id',$product_id)->first();

        $product_list = [
            'name' => $product->name,
            'price' => $product->price
        ];
        return $product_list;

        
        
    }
  

    

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    private $dir = "ProductImage";
    public function register(){
        return view('admin.product.register');
    }

    public function list(){
        $products = Product::get();
        
        return view('admin.product.list',['products' => $products]);
    }

    public function store(ProductRequest $request){
        try{
            DB::beginTransaction();
            $file_name = $request->file('product_image')->getClientOriginalName();
            $request->file('product_image')->storeAs('public/'.$this->dir,$file_name);
            $product = new Product;
            $model = $product->createProduct($request);
     

            $model->productImage()->create([
                'image_id' => (string)Str::uuid(),
                'product_id' => $model->product_id,
                'path' => '/'.$this->dir.'/'.$file_name,
                'name' => $file_name,
                'status' => 1,


            ]);
            DB::commit();
            
            return redirect(route('product.register'));

        }catch(\Throwable $e){
            abort(500);
            DB::rollBack();

        }
    }

    public function update(){

    }

    public function detail($id){
        $product = Product::where('product_id',$id)->first();
        return view('admin.product.detail',['product'=>$product]);
        


    }

    



    public function delete($id){

    }


}

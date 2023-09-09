<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory;
    private $dir;
    
    protected $table = "product_images";
    protected $fillable = [
        'image_id',
        'product_id',
        'path',
        'name',
        'status',

    ];


    public function __construct()
    {
        $this->dir = "ProductImage";
    }


    public function product(){
        return $this->belongsTo('App\Models\Product','product_id','product_id');
        
    }


/* 
    public function createImage($product_id,$file_name){

        return $this->create([
            'image_id' => (string)Str::uuid(),
            'product_id' => $product_id,
            'path' => '/'.$this->dir.'/'.$file_name,
            'name' => $file_name,
            'status' => 1,
            
        ]);

    } */
    

    public function deleteImage($id){
        $image = Product::where('image_id',$id)->first();
        Storage::disk('public')->delete($image->path);
        
    }



}

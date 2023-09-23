<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;


class AjaxController extends Controller
{
    public function index(): View
    {
        $products = Test::latest()->paginate(5);

        return view('ajaxcrud.ajaxindex',compact('products'));
    }

   
   public function addproduct( Request $request )
   {
    $request->validate(
        [
            'name'=>'required|unique:products|',
            'price'=>'required',

        ],
        [
            'name.required'=>'Name is required',
            'name.unique'=>'Product already Exists',
            'price.required'=>'Price is required'
        ]
             );

        $product = new  Test();  
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return response()->json(
            [
                'status'=>'success',

            ]
        );
        
   }

   // update product
   public function updateProduct( Request $request )
   {
     $request->validate(
         [
             'up_name'=>'required|unique:products,name',         //update validation different
             'up_price'=>'required',
 
         ],
         [
             'up_name.required'=>'Name is required',
             'up_name.unique'=>'Product already Exists',
             'up_price.required'=>'Price is required'
         ]
 );
 
 Test::where('id',$request->up_id)->update([
             'name'=>$request->up_name,
             'price'=>$request->up_price,
         ]);
         return response()->json(
             [
                 'status'=>'success',
 
             ]
         );
         
    }
    
    public function deleteproduct(Request $request){
         Test::find($request->product_id)->delete();
         return response()->json(
            [
                'status'=>'success',

            ]
        );
    }

  
   public function pagination(Request $request)
   {//dd($request);
       $products = Test::latest()->paginate(5);
       
       return view('ajaxcrud.pagination_products', compact('products'))->render();

   }
   public function searchproduct(Request $request)
   {
       $products = Test::where('name','like', '%' .$request->search_string. '%')->
           orWhere('price','like', '%'.$request->search_string.'%')->orderBy('id','desc')
           ->paginate(5);
       if($products->count() >= 1){
           return view('ajaxcrud.pagination_products', compact('products'))->render();
       }
       else{
           return response()->json([
               'status'=>'nothing_found',
           ]);
       }
   }
    
}

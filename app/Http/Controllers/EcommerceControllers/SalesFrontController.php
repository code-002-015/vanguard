<?php

namespace App\Http\Controllers\EcommerceControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\EcommerceModel\SalesHeader;
use App\EcommerceModel\SalesDetail;
use App\EcommerceModel\Product;
use App\EcommerceModel\Cart;
use App\Page;


class SalesFrontController extends Controller
{
    public function sales_list(){

        $sales = SalesHeader::where('user_id',Auth::id())->orderBy('id','desc')->get();

        $page = new Page();
        $page->name = 'Sales Transaction';

        return view('theme.'.env('FRONTEND_TEMPLATE').'.pages.ecommerce.sales',compact('sales','page'));
    }

    public function cancel_order(Request $request){

        $sales = SalesHeader::where('order_number',$request->order_number)->update(['status' => 'CANCELLED', 'delivery_status' => 'CANCELLED']);


        return back()->with('success','Successfully cancelled your order');
    }

    public function reorder(Request $request)
    {
        $str_products = rtrim($request->products, '|');
        $products = explode("|",$str_products);

        $str_qty = rtrim($request->qty, '|');
        $qty = explode("|",$str_qty);

        foreach($products as $key => $prodid){
            $cart = Cart::where('user_id',Auth::id())->where('product_id',$prodid);
            $product = Product::find($prodid);

            if($cart->count() > 0){
                $data = $cart->first();

                $cart->update([
                    'qty' => $data->qty+$qty[$key],
                    'price' => $product->price
                ]);
            } else {
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $prodid,
                    'qty' => $qty[$key],
                    'price' => $product->price
                ]);
            }
            
        }

        return redirect(route('cart.front.show'))->with('success','Successfully reorder.');
    }
}

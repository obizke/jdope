<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\About;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Order;
use RealRashid\SweetAlert\Facades\Alert;
class CartController extends Controller
{
    public function getcart()
    {
        $abouts=About::all();
        // $products=\Cart::getContent()->jsonSerialize();
        // $product=\Cart::getContent();
        // dd($product);
 
        return view('shop.shoppingcart')->with('abouts',$abouts);
    }
    public function checkout()
    {
        $cartCollection =\Cart::getContent();
        // dd($cartCollection);
        $abouts=About::all();
        return view('shop.checkout')->with(['cartCollection' => $cartCollection])->with('abouts',$abouts);
    }
    // public function cart()  {
    //     $cartCollection = \Cart::getContent();
    //     dd($cartCollection);
    //     return view('cart')->with(['cartCollection' => $cartCollection]);
    // }
    
    public function add(Request$request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'photo' => $request->photo,
                'slug' => $request->slug,
                'size' => $request->size
            )
        ));
        Alert::success('Success Title', 'Add to cart successfully!!!.');
        return redirect()->back();
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        Alert::success('Success Title', 'Item is removed!!!.');
        return redirect()->back();
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        Alert::success('Success Title', 'Cart update successfully!!!.');
        return redirect()->back();
    }

    public function clear(){
        \Cart::clear();
        Alert::success('Success Title', 'Cart cleared successfully!!!.');
        return redirect()->back();
    }

    public function store(Request $request){
        $request->validate([
            'fname' => 'required',
            'email' => 'required',
            'phone'=>'required',
            'lname'=>'required',
            'location'=>'required',
            'payment_method'=>'required'
        ]);
        $amount = \Cart::getTotal();
        $fname = $request->input('fname');
        $phone =$request->input('phone'); 
        $email=$request->input('email');
        $location=$request->input('location');
        $payment=$request->input('payment_method');
        $lname =$request->input('lname'); 
        $county=$request->input('county');
        $invoice='ORD-'.strtoupper(uniqid());
       
        $count=\Cart::getTotalQuantity();
         $order=Order::create([
           'total_amount_due'=>$amount,
           'user_id'=> auth()->user()->id,
            'fname' => $fname,
            'lname'=> $lname,
            'county'=>$county,
            'location' => $location,
            'email'=>$email,
            'invoice'=>$invoice,
            'item_count'=>$count,
            'phone'=>$phone,
            'payment_method'=>$payment
        ]);  
        if ($order) {

            $items =\Cart::getContent();
            //  dd($items);
            foreach ($items as $item)
            {
                //  to bring the product id with the cart items
                $product = Product::where('name', $item->name)->first();
    
                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'product_name'=>$item->name,
                    'quantity' =>  $item->quantity,
                    'photo'=> $item->attributes->photo,
                    'price'   =>  $item->getPriceSum()
                ]);
    
                $order->items()->save($orderItem);
            }
        }
        // //save order items
        // $cartItems=\Cart::getContent();
        // // dd($cartItems);
        // foreach ($cartItems as $item){
         
        //     $order->items()->attach($item->id, ['price'=>$item->price, 'quantity'=>$item->quantity,'product_name'=>$item->name,'photo'=>$item->attributes->photo]);
        // }
        
        //payment
        if(request('payment_method')=='mpesaonline'){
            return redirect()->route('mpesa.payment');
        }
        if(request('payment_method')=='cash_on_delivery'){
            return redirect()->route('client.index');
        }
        
    }
    

}

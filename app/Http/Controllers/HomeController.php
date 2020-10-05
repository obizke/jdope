<?php

namespace App\Http\Controllers;
use App\Models\Order;
Use Alert;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
        
        $order=Order::orderBy('id', 'DESC')->get();
        return view('home')->with('order',$order);
    }
}

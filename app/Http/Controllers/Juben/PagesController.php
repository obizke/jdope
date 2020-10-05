<?php

namespace App\Http\Controllers\Juben;
use App\Models\Product;
use App\Models\About;
use App\Models\Slider;
use App\Models\Order;
use Illuminate\Pagination\Paginator;
use App\Models\Trends;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $sliders=Slider::all();
        $abouts=About::all();
        $belts = Trends::where('name','Belts')->orderBy('id','desc')->take(1)->get();
        $tshirts = Trends::where('name','T-shirts')->orderBy('id','desc')->take(1)->get();
        $shoes = Trends::where('name','Shoes')->orderBy('id','desc')->take(1)->get();
        $watches = Trends::where('name','Watch')->orderBy('id','desc')->take(1)->get();
        $bags = Trends::where('name','Bags')->orderBy('id','desc')->take(1)->get();
        $jackets = Trends::where('name','Hoodies')->orderBy('id','desc')->take(1)->get();

        $products = Product::where('nature','new')->orderBy('id','desc')->take(4)->get();
        $trends = Product::where('nature','trending')->orderBy('id','desc')->take(4)->get();
        $bests = Product::where('nature','best')->orderBy('id','desc')->take(4)->get();
        return view('pages.index')->with('products',$products)->with('abouts',$abouts)->with('sliders',$sliders)
        ->with('trends',$trends)->with('bests',$bests)
        ->with('belts',$belts)->with('tshirts',$tshirts)->with('shoes',$shoes)->with('watches',$watches)
        ->with('bags',$bags)->with('jackets',$jackets);
    }

    
    public function shop()
    {
        Paginator::useBootstrap();
        $abouts=About::all();
        $products=Product::orderBy('id','desc')->paginate(9);
        $bests = Product::where('nature','best')->orderBy('id','desc')->take(4)->get();
        return view('pages.shop')->with('products',$products)->with('abouts',$abouts)->with('bests',$bests);
    }

    public function contact(Request $request)
    {
        $abouts=About::all();
        return view('pages.contact')->with('abouts',$abouts);
    }

    public function single($slug)
    {
        $abouts=About::all();
        $trends = Product::where('nature','trending')->orderBy('id','desc')->take(4)->get();
        $products =Product::where('slug',$slug)->first();
        return view('pages.single')->with('products',$products)->with('abouts',$abouts)->with('trends',$trends);
    }
}
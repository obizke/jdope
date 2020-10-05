@extends('layouts.japp')
@section('content')
<div class="banner1">
    <div class="container">
        <h3><a href="/">Home</a> / <span>{{ $products->name }}</span></h3>
    </div>
</div>
<!--banner-->

<!--content-->
<div class="content">
    <!--single-->
    <div class="single-wl3">
        <div class="container">
            <div class="single-grids">
                <div class="col-md-9 single-grid">
                    <div clas="single-top">
                        <div class="single-left">
                            <div class="flexslider">
                                <ul class="slides">
                                    <div data-thumb="/storage/shop/{{$products->photo}}">
                                        <div class="thumb-image"> <img src="/storage/shop/{{$products->photo}}" data-imagezoom="true" class="img-responsive"> </div>
                                    </div>
                                 </ul>
                            </div>
                        </div>
                        <div class="single-right simpleCart_shelfItem">
                            <h4>{{ $products->name }}</h4>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <p class="price item_price">Ksh.{{ $products->price }}</p>
                            <div class="description">
                                <p><span>Quick Overview :</span>{!!$products->description!!}.</p>
                            </div>
                            <div class="women">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    {{ csrf_field() }}
                                   
                                
                                    <div class="quantity-select">     
                                        <strong> size:</strong>                      
                                        <input type="number" class="entry value1" id="size" name="size" value="{{ $products->size }}">
                                        {{-- <div class="entry value1" name='size' id="size" value='{{ $products->size }}'><span>{{ $products->size }}dfeee</span></div> --}}
                                    </div>
                                    <input type="hidden" value="{{ $products->id }}" id="id" name="id">
                                    <input type="hidden" value="{{ $products->name }}" id="name" name="name">
                                    <input type="hidden" value="{{ $products->price }}" id="price" name="price">
                                    <input type="hidden" value="{{ $products->photo }}" id="photo" name="photo">
                                    <input type="hidden" value="{{ $products->slug }}" id="slug" name="slug">
                                    <input type="hidden" value="1" id="quantity" name="quantity"><br>
                                   <button class="my-cart-b">Add To Cart</button>
                                </form>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="col-md-3 single-grid1">
                    <h3>Recent Products</h3>
                    @foreach($trends as $trend)
                    <div class="recent-grids">
                        <div class="recent-left">
                            
                            <a href="/shop/{{$trend->slug}}"><img class="img-responsive " src="{{url('storage/shop/'.$trend->photo)}}" alt=""></a>	
                        </div>
                        <div class="recent-right">
                            <h6 class="best2"><a href="/shop/{{$trend->slug}}">{{$trend->name}} </a></h6>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <span class=" price-in1"> ksh.{{$trend->price}}</span>
                        </div>	
                        <div class="clearfix"> </div>
                    </div>
                    @endforeach
                    
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
   
</div>
    
@endsection

@push('scripts')
<script>
var size = document.getElementById('size'),
  inc = document.getElementById('increment'),
  dec = document.getElementById('decrement');


inc.addEventListener('click', function() {
    size.stepUp(1);
}, false);

if(this.state.counter > 0){
dec.addEventListener('click', function() {
    size.stepDown(1);
}, false);
}
    </script>
@endpush    
<!--quantity-->
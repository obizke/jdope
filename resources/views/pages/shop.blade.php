@extends('layouts.japp')
@section('content')
    


	<div class="banner1">
        <div class="container">
            <h3><a href="/">Home</a> / <span>Products</span></h3>
        </div>
    </div>
   <!--banner-->
    <!--content-->
        <div class="content">
            <div class="products-agileinfo">
                    <h2 class="tittle">order we'll deliver</h2>
                <div class="container">
                    <div class="product-agileinfo-grids w3l">
                        <div class="col-md-3 product-agileinfo-grid">
                            <div class="top-rates">
                                <h3>Best sellers</h3>
                                @if(count($bests)>0)
                                @foreach($bests as $best)
                                 <div class="recent-grids">
                                    <div class="recent-left">
                                        <a href="/shop/{{$best->slug}}"><img class="img-responsive " src="/storage/shop/{{$best->photo}}" alt=""></a>	
                                    </div>
                                    <div class="recent-right">
                                        <h6 class="best2"><a href="/shop/{{$best->slug}}">{{$best->name}} </a></h6>
                                        <p><em class="item_price">ksh.{{$best->price}}</em></p>
                                    </div>	
                                    <div class="clearfix"> </div>
                                 </div>
                               @endforeach
                               @else
                            <div class="jumbotron center">No best sellers at the momment!!</div>
                            @endif
                            </div>
                            
                            
                            <div class="cat-img">
                                <img class="img-responsive " src="japp/images/45.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-md-9 product-agileinfon-grid1">
                            <div class="product-agileinfon-top">
                                <div class="col-md-6 product-agileinfon-top-left">
                                    <img class="img-responsive " src="japp/images/img3.jpg" alt="">
                                </div>
                                <div class="col-md-6 product-agileinfon-top-left">
                                    <img class="img-responsive " src="japp/images/img4.jpg" alt="">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                           
                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav1 nav1-tabs left-tab" role="tablist">
                                    <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
                                <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><img src="japp/images/menu1.png"></a></li>
                                <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><img src="japp/images/menu.png"></a></li>
                                </ul>
                                @if(count($products)>0)
                                <div id="myTabContent" class="tab-content">
                                    
                                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                        <div class="product-tab">
                                            @foreach ($products as $product)
                                            <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
                                                <div class="grid-arr">
                                                    <div  class="grid-arrival">
                                                        <figure>		
                                                            <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                                <div class="grid-img">
                                                                    <img  src="/storage/shop/{{$product->photo}}" class="img-responsive size" alt="">
                                                                </div>
                                                                <div class="grid-img">
                                                                    <img  src="/storage/shop/{{$product->photo}}" class="img-responsive size"  alt="">
                                                                </div>			
                                                            </a>		
                                                        </figure>	
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="/shop/{{$product->slug}}">{{$product->name}}</a></h6>
                                                        <p ><em class="item_price">ksh.{{$product->price}}</em></p>
                                                        {{-- <form action="{{ route('cart.store') }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" value="{{ $product->id }}" id="id" name="id">
                                                            <input type="hidden" value="{{ $product->name }}" id="name" name="name">
                                                            <input type="hidden" value="{{ $product->price }}" id="price" name="price">
                                                            <input type="hidden" value="{{ $product->photo }}" id="photo" name="photo">
                                                            <input type="hidden" value="{{ $product->slug }}" id="slug" name="slug">
                                                            <input type="hidden" value="1" id="quantity" name="quantity">
                                                           <button class="my-cart-b">Add To Cart</button>
                                                        </form> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                            <div class="mx-auto" style="width: 200px;">
                                                {{$products->links()}}
                                           </div> 
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                                        <div class="product-tab1">
                                            @foreach ($products as $product)
                                            <div class="col-md-4 product-tab1-grid">
                                                <div class="grid-arr">
                                                    <div  class="grid-arrival">
                                                        <figure>		
                                                            <a href="/shop/{{$product->slug}}" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                                <div class="grid-img">
                                                                    <img  src="/storage/shop/{{$product->photo}}" class="img-responsive size" alt="">
                                                                </div>
                                                                <div class="grid-img">
                                                                    <img  src="/storage/shop/{{$product->photo}}" class="img-responsive size"  alt="">
                                                                </div>			
                                                            </a>		
                                                        </figure>	
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="col-md-8 product-tab1-grid1 simpleCart_shelfItem">
                                                <div class="women">
                                                    
                                                    <h6><a href="/shop/{{$product->slug}}">{{$product->name}}</a></h6>
                                                    <p><em class="item_price">ksh.{{$product->price}}</em></p>                                                      
                                                    <form action="{{ route('cart.store') }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" value="{{ $product->id }}" id="id" name="id">
                                                        <input type="hidden" value="{{ $product->name }}" id="name" name="name">
                                                        <input type="hidden" value="{{ $product->price }}" id="price" name="price">
                                                        <input type="hidden" value="{{ $product->photo }}" id="photo" name="photo">
                                                        <input type="hidden" value="{{ $product->slug }}" id="slug" name="slug">
                                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                                       <button class="my-cart-b">Add To Cart</button>
                                                    </form>
                                                    <p>{!!Str::limit($product->description,200)!!} </p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                     @endforeach
                                     <div style='display: flex;justify-content: center;'>
                                        {{$products->links()}}
                                      </div>
                                      </div> 
                                    </div>
                                </div>
                                @else
                                <div class="jumbotron center">No products</div>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>

     @endsection      
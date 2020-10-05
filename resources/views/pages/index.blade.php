@extends('layouts.japp')
@section('content')
<div class="banner-w3">
    <div class="demo-1">            
        <div id="example1" class="core-slider core-slider__carousel example_1">
            <div class="core-slider_viewport">
				@if(count($sliders)>0)
                <div class="core-slider_list">
					@foreach($sliders as $slider)
                     <div class="core-slider_item sizes">
                        <img src="/storage/sliders/{{$slider->photo}}" class="img-responsive sizes" alt="">
					 </div>
					@endforeach
				 </div>
				 @else
				 <div class="jumbotron">
				 <h3><marquee> No Image slides at the moment</marquee></h3>
				 </div>
			   @endif
            </div>
            <div class="core-slider_nav">
                <div class="core-slider_arrow core-slider_arrow__right"></div>
                <div class="core-slider_arrow core-slider_arrow__left"></div>
            </div>
            <div class="core-slider_control-nav"></div>
        </div>
    </div>
    <link href="japp/css/coreSlider.css" rel="stylesheet" type="text/css">
    <script src="japp/js/coreSlider.js"></script>
    <script>
    $('#example1').coreSlider({
      pauseOnHover: false,
      interval: 3000,
      controlNavEnabled: true
    });

    </script>

</div>	    
		<!--content-->
		<div class="content">
			<!--banner-bottom-->
				<div class="ban-bottom-w3l">
					<div class="container">
						<div class="col-md-6 ban-bottom">
							@foreach ($jackets as $jacket)
							<div class="ban-top"style="height: 585px">
								<img src="/storage/trends/{{$jacket->photo}}" class="img-responsive" alt=""/>
								<div class="ban-text">
									<h4>Hoodies</h4>
								</div>
							</div>
							@endforeach
						</div>
						<div class="col-md-6 ban-bottom3">
							@foreach ($shoes as $shoe)
							<div class="ban-top"style="height: 290px">
								<img src="/storage/trends/{{$shoe->photo}}" class="img-responsive" alt=""/>
								<div class="ban-text1">
									<h4>Shoes</h4>
								</div>
							</div>
							@endforeach
							<div class="ban-img">
								<div class=" ban-bottom1">
									@foreach ($tshirts as $tshirt)
									<div class="ban-top" style="height: 260px">
										<img src="/storage/trends/{{$tshirt->photo}}" class="img-responsive" alt="" style="background-image:cover;"/>
										<div class="ban-text1">
											<h4>T-Shirt</h4>
										</div>
									</div>
									@endforeach
								</div>
							
								<div class="ban-bottom1">
									@foreach($bags as $bag)
									<div class="ban-top" style="height: 260px">
										<img src="/storage/trends/{{$bag->photo}}" class="img-responsive" alt=""/>
										<div class="ban-text1">
											<h4>Bags</h4>
										</div>
									</div>
									@endforeach
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			<!--banner-bottom-->
			<!--new-arrivals-->
				<div class="new-arrivals-w3agile">
					<div class="container">
						<h2 class="tittle">New Arrivals</h2>
						
						@if(count($products)>0)
						<div class="arrivals-grids">
							@foreach ($products as $product)
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
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
									<div class="ribben">
										<p>New Arrival</p>
									</div>
									<div class="women">
										<h6><a href="/shop/{{$product->slug}}">{{$product->name}}</a></h6>
										<p ><em class="item_price">ksh.{{$product->price}}</em></p>
									</div>
								</div>
							</div>
						@endforeach
								
							<div class="clearfix"></div>
						</div>
						@else
						<div class="jumbotron center">No new arrivals at the momment!!</div>
					   @endif
					</div>
				</div>
			<!--new-arrivals-->
				<!--accessories-->
			<div class="accessories-w3l">
				<div class="container">
					<h3 class="tittle">20% Discount on</h3>
					<span>TRENDING DESIGNS</span>
					<div class="button">
						<a href="/shop" class="button1"> Shop Now</a>
						<a href="/shop" class="button1"> Quick View</a>
					</div>
				</div>
			</div>
			<!--accessories-->
			<!--Products-->
				<div class="product-agile">
					<div class="container">
						<h3 class="tittle1"> Trending Outfits</h3>
						<div class="slider">
							<div class="callbacks_container">
								<ul class="rslides" id="slider">
									<li>
										 @if(count($trends)>0)	 
										<div class="caption">
											 @foreach($trends as $trend)
											<div class="col-md-3 cap-left simpleCart_shelfItem">
												<div class="grid-arr">
													<div  class="grid-arrival">
														<figure>		
															<a href="">
																<div class="grid-img">
																	<img  src="storage/shop/{{$trend->photo}}" class="img-responsive size" alt="">
																</div>
																<div class="grid-img">
																	<img  src="storage/shop/{{$trend->photo}}" class="img-responsive size"  alt="">
																</div>			
															</a>		
														</figure>	
													</div>
													<div class="ribben">
														<p>Trending outfits</p>
													</div>
													<div class="women">
														<h6><a href="/shop/{{$trend->slug}}">{{$trend->name}}</a></h6>
														<p><em class="item_price">ksh.{{$trend->price}}</em></p>
													</div>
												</div>
											</div>
											@endforeach
											<div class="clearfix"></div>
										</div>
										 @else
                                         <div class="jumotron-center">No trending outfits at the moment!!</div>
										@endif
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<!--Products-->
			<div class="latest-w3">
				<div class="container">
					<h3 class="tittle1">Latest Fashion Trends</h3>
					<div class="latest-grids">
						@foreach ($tshirts as $tshirt)
				
						<div class="col-md-4 latest-grid">
							<div class="latest-top ">
								<img  src="/storage/trends/{{$tshirt->photo}}" class="img-responsive trends "  alt="">
								<div class="latest-text">
									<h4>{{$tshirt->name}}</h4>
								</div>
								
							</div>
						</div>
						@endforeach
						@foreach ($shoes as $shoe)
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="/storage/trends/{{$shoe->photo}}" class="img-responsive trends"  alt="">
								<div class="latest-text">
									<h4>{{$shoe->name}}</h4>
								</div>
								
							</div>
						</div>
						@endforeach
						@foreach ($jackets as $jackect)
						
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="/storage/trends/{{$jackect->photo}}" class="img-responsive trends"  alt="">
								<div class="latest-text">
									<h4>{{$jackect->name}}</h4>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>		
					  @endforeach
				
						@foreach($watches as $watch)
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="/storage/trends/{{$watch->photo}}" class="img-responsive trends"  alt="">
								<div class="latest-text">
									<h4>{{$watch->name}}</h4>
								</div>
								
							</div>
						</div>
						@endforeach
						@foreach ($belts as $belt)

						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="storage/trends/{{$belt->photo}}" class="img-responsive trends"  alt="">
								<div class="latest-text">
									<h4>{{$belt->name}}</h4>
								</div>
							
							</div>
						</div>
						@endforeach
						@foreach($bags as $bag)
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="/storage/trends/{{$bag->photo}}" class="img-responsive trends"  alt="">
								<div class="latest-text">
									<h4>{{$bag->name}}</h4>
								</div>
								
							</div>
						</div>
						@endforeach
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
				<div class="new-arrivals-w3agile">
					<div class="container">
						<h3 class="tittle1">Best Sellers</h3>
						 @if(count($bests)>0)
						<div class="arrivals-grids">
						  @foreach ($bests as $best)
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="">
												<div class="grid-img">
													<img  src="/storage/shop/{{$best->photo}}" class="img-responsive size" alt="">
												</div>
												<div class="grid-img">
													<img  src="/storage/shop/{{$best->photo}}" class="img-responsive size"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>Best Seller</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="/shop/{{$best->slug}}">{{$best->name}}</a></h6>
										<p ><em class="item_price">ksh.{{$best->price}}</em></p>
						
									</div>
								</div>
							</div>
							@endforeach
							<div class="clearfix"></div>
						  </div>
						 @else
						 <div class="jumbotron center">No best selling products at the moment!!</div>
						@endif
					</div>
				</div>
			<!--new-arrivals-->
		</div>
		<!--content-->
@endsection

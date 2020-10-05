
<!DOCTYPE HTML>
<html>
<head>
	<title>{{ config('app.name', 'jdope wear Nairobi online clothing shop') }}</title>
<!--css-->
<link href="{{ asset('japp/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{ asset('japp/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
{{-- <link href="{{ asset('japp/css/font-awesome.css')}}" rel="stylesheet"> --}}
<link rel="icon" href="japp/images/jdopewear.png" type="image/gif" sizes="16x16"> 


<!--css-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Nairobi clothes online shop,Latest trends in women’s fashion. Discover our designs: dresses, tops, jeans, coats and shirts,best fashion websites, 
kenya best fashion trends,Nairobi men's collections,clothes stores in Kenya" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="{{ asset('japp/js/jquery.min.js')}}"></script>
{{-- <link href='{{ asset('japp//fonts.googleapis.com/css?family=Cagliostro')}} rel='stylesheet type='text/css'>
<link href='{{ asset('japp/fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300')}} rel='stylesheet type='text/css'> --}}
<!--search jQuery-->
	<script src="{{ asset('japp/js/main.js')}}"></script>
	
<!--search jQuery-->
<script src="{{ asset('japp/js/responsiveslides.min.js')}}"></script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
 </script>
 <!--mycart-->
<script type="text/javascript" src="{{ asset('japp/js/bootstrap-3.1.1.min.js')}}"></script>

  <!--start-rate-->
<script src="{{ asset('japp/js/jstarbox.js')}}"></script>
	<link rel="stylesheet" href="{{ asset('japp/css/jstarbox.css')}}" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!--//End-rate-->
</head>
<body>
	<!--header-->
		<div class="header">
			<div class="header-top">
				<div class="container">
					 <div class="top-left">
						<a href="#"><i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +254 791 361 236</a> 
					</div>
					<div class="top-right">
					<ul>
                        
						@guest
						<li>
							<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
						@if (Route::has('register'))
							<li class="nav-item">
								<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
							</li>
						@endif
					@else
						<!-- The user image in the menu -->
						<li class="dropdown-menu">
							{{-- <p>
								{{ Auth::user()->name }}
								<small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
							</p> --}}
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-right">
								<a href="{{ url('/logout') }}" class="btn btn-info btn-flat"
									onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									Sign out
								</a>
								<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</li>
					@endguest
					</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="heder-bottom">
				<div class="container">
					<div class="logo-nav">
						<div class="logo-nav-left">
							<h1><a href="/">Jdope Wear <span>..fashion</span></a></h1>
						</div>
						<div class="logo-nav-left1">
							<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="/" class="act">Home</a></li>	
									<li><a href="/shop">Shop</a></li>
									<li><a href="/contact">contact Us</a></li>
									
								</ul>
							</div>
							</nav>
						</div>

						<div class="header-right2">
							<div class="cart box_1">
								<a href="{{route('product.shoppingcart') }} ">
									<h3> <div class="total">
										(<span class="badge">{{ \Cart::getTotalQuantity()}}</span> items)</div>
										<img src="japp/images/bag.png" alt="" />
									</h3>
								</a>
								
								<div class="clearfix"> </div>
							</div>	
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
        </div>
        
		@yield('content')
		@include('sweetalert::alert')
		@include('inc.footer')

		
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- AdminLTE App -->


    @stack('scripts')
</body>
</html>
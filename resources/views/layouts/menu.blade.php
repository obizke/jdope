
@if(Auth::user()->usertype=='admin')
<li class="{{Request::is('abouts*') ? 'active':''}}">
    <a href="{!!route('abouts.index')!!}")<i class="fa fa-group"> </i><span> About us</span></a>
</li><br>
<li class="{{Request::is('products*') ? 'active':''}}">
    <a href="{!!route('products.index')!!}")<i class="fa  fa-database"></i><span>Products</span></a>
</li><br>
<li class="{{Request::is('trends*') ? 'active':''}}">
    <a href="{!!route('trends.index')!!}")<i class="fa fa-diamond"></i><span>clothing trends</span></a>
</li><br>
<li class="{{Request::is('sliders*') ? 'active':''}}">
    <a href="{!!route('sliders.index')!!}")<i class="fa fa-caret-square-o-right "></i><span>Image Sliders</span></a>
</li><br>
<li class="{{Request::is('orders*') ? 'active':''}}">
    <a href="{!!route('orders.index')!!}")<i class="fa fa-credit-card"></i><span>orders</span></a>
</li>
<br>
<li>
    <a href="{!!url('/')!!}")<i class="fa fa-globe"></i><span>Main website</span></a>
</li>
@endif


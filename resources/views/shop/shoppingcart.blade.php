
@extends('layouts.japp')
@section('content')

<div class="content">
  <div class="cart-items">
      <div class="container">
        @if(count(\Cart::getContent()) > 0)
        <h2 style="text-align:center"><strong>My Shopping Bag</strong></h2>
        <hr style="border-top: 1px dotted blue;">
        <div class="cart-header">
          <div class="close1"> </div>
          @foreach(\Cart::getContent() as $item)
          <div class="cart-sec simpleCart_shelfItem">
                 <div class="cart-item cyc">
                      <img src="/storage/shop/{{ $item->attributes->photo }}" class="img-responsive" alt=""style="width: 150px; height: 180px;">
                 </div>
                <div class="cart-item-info">
                 <h3><a href="#">{{$item->name}}</a><span>Quantity : {{$item->quantity}}</span>

                </h3>
                      <div class="delivery">
                      <p>
                        <form action="{{ route('cart.update') }}" method="POST">
                          {{ csrf_field() }}
                          <div class="form-group row">
                              <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                              <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}"
                                     id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                              <button class="btn btn-info btn-sm" style="margin-right: 25px;"><i class="fa fa-edit"></i>update</button>
                          </div>
                        </form>
                      </p>
                      <p>ksh.{{ \Cart::get($item->id)->getPriceSum() }}</p>
                      <span>
                        <form action="{{ route('cart.remove') }}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                          <button class="btn btn-danger btn-sm" style="margin-right: 10px;"><i class="glyphicon glyphicon-trash"></i>remove from cart</button>
                      </form>
                      </span>
                      <div class="clearfix"></div>
                 </div>	
                </div>
                <div class="clearfix"></div>                         
           </div>
           @endforeach
        </div>
        <br>
        <li class="list-group-item">
          <div class="row">
            <div class="col-lg-10">
              <b>Total: </b>ksh.{{ \Cart::getTotal() }}
            </div>
            <div class="col-lg-2" style=" float: right;">
              <form action="{{ route('cart.clear') }}" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-trash"></i> Clear cart</button>
              </form>
            </div>
          </div>
        </li>
        <br>
        <div class="row">

          <a class="btn btn-dark btn-sm btn-block" href="{{ route('product.checkout') }}">
            CHECKOUT <i class="glyphicon glyphicon-arrow-right"></i>
          </a>
        </div>
        @else
        <li class="list-group-item">Your Cart is Empty</li>
        @endif
      </div>
    </div>
</div>
@endsection

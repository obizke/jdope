@extends('layouts.japp')
@section('content')
<div class="content">
    <div class="cart-items">
        <div class="container">
            <h2>Enter your billing information to complete your shopping</h2>
            @if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>

@endif
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>

@endif
            <form action="{{route('cart.order') }}" method="POST">
              {{ csrf_field() }}
        <table class="calculate-shipping table no-border">
          <tbody>    
            <tr>
              <td>
                  <label>first name</label>
                  <input type="text" value="" placeholder="first name" name="fname" id="fname" class="form-control">
                </td>
            </tr>
            <tr>
              <td>
                  <label>last name</label>
                  <input type="text" value="" placeholder="last name" name="lname" id="lname" class="form-control">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Email</label>
                    <input type="email" value="" placeholder="email.." name="email" id="email" class="form-control">
                  </td>
              </tr>
              <tr>
                <td>
                 
                  <label>Delivery Address</label>
                  <select class="form-control" name="location">
                    <option>Select Town</option>
                    <option value="Nairobi">Nairobi</option>
                    <option value="Kisumu">Kisumu</option>
                    <option value="Eldoret">Eldoret</option>
                    <option value="Nakuru">Nakuru</option>
                    <option value="Thika">Thika</option>
                    <option value="Busia">Busia</option>
                    <option value="Mombasa">Mombasa</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                 <label>county</label>
                 <input type="text" name="county" class="form-control" required/>
               </td>
              </tr>
              <tr>
                <td>
                 <label>Phone</label>
                 <input type="tel" name="phone" class="form-control" placeholder="2547xxxxxxxxx" value="254" required/>
               </td>
              </tr>
              <tr>
                <td>
                  <h4><strong>Payment Method</strong></h4> &nbsp;	
                  <div class="form-check">
                    <label class="form-check-label">
                       <input type="radio" class="form-check-input" name="payment_method"value="cash_on_delivery"> 
                       <strong>cash on delivery</strong> <img src="japp/images/jdopecash.png" style="height: 55px;">
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                     <input type="radio" class="form-check-input" name="payment_method"  value="mpesaonline"> 
                     <strong>Lipa na</strong> <img src="japp/images/mpesa.png" style="height: 55px;">
                    </label>
                  </div>
               </td>
              </tr>
              <tr>
                @if(Auth::user())
                <td style='display: flex;justify-content: center;'>
                    <button  type="submit" class="btn btn-lg btn-primary" >Submit Order</button>
               </td>
               @else
               <td style='display: flex;justify-content: center;'>
                  <a href="{{url('login')}}"  type="submit" class="btn btn-lg btn-primary" >Login to make an order</a>
               </td>
               @endif
              </tr>
             
          </tbody>
        </table>
    </form>

        </div>
    </div>
</div>
@endsection

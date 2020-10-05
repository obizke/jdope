@extends('layouts.app')

@section('content')
<div class="table-responsive">
   <table class="table" id="trends-table">
       <thead>
           <tr>
              <th>payment Method</th>
               <th>Name</th>
               <th>Pick up location</th>
               <th>Phone number</th>
               <th>Invoice Number</th>
               <th>order items</th>
               <th>Amount To be Paid</th>
               <th>payment status</th>
           </tr>
       </thead>
       <tbody>
       @foreach($order as $order)
           <tr>
               <td>{{$order->payment_method }}</td>
               <td>{{ $order->fname }} {{ $order->lname }}</td>
               <td>{{ $order->location }}</td>
               <td>{{$order->phone}}</td>
               <td>{{ $order->invoice }}</td>
               <td>{{ $order->item_count }}</td>
               <td>
                <img src="/storage/shop/{{ $order->photo }}" class="img-responsive" alt=""style="width: 150px; height: 180px;">
                </td>
               <td>ksh.{{ $order->price }}</td>
               <td>
                  @if($order->payment_status ==0)
                  <div class="text text-danger">pending</div>
                  @else
                  <div class="text text-success">payment completed</div>
                  @endif
               </td>

               
           </tr>
       @endforeach
       </tbody>
   </table>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Order
        </h1>
        {{-- pdf generator --}}
        <div class='btn btn-group' style="margin-top: -29px;margin-bottom: 3px; margin-left:60px;">
            <button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o" style="color:white"></i>PDF</button>
            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu" id="export-menu">
                <li id="export-to-pdf">
                    <a href="{{URL::to('orders/' . $order->id . '/printpdf')}}"  class="btn btn">Download Pdf</a>
                </li>
                <li role="separator" class="divider"></li>
            </ul>
        </div>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tile">
                                <section class="invoice">
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <h2 class="page-header"><i class="fa fa-globe"></i>Jdope Wear</h2>
                                        </div>
                                        <div class="col-12">
                                            <h5 class="obiz">Date: {{ $order->created_at->toFormattedDateString() }}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 trial">Placed By
                                            <address><strong>{{ $order->fname }} {{ $order->lname }}</strong><br>Email: {{ $order->email }}</address>
                                        </div>
                                        <div class="col-6 trial">Ship To
                                            <address><strong>{{ $order->fname }} {{ $order->lname }}</strong><br>{{ $order->location }}<br>{{ $order->phone }}<br></address>
                                        </div>
                                        <div class="col-4 trials">
                                            <b>Order ID:</b> {{ $order->invoice }}<br>
                                            <b>Amount:</b> <strong class="text text-danger">ksh.{{ config('settings.currency_symbol') }}{{ round($order->total_amount_due, 2) }}</strong><br>
                                            <b>Payment Method:</b> {{ $order->payment_method }}<br>
                                            <b>Payment Status:</b> {{ $order->payment_status == 1 ? 'Completed' : 'Not Completed' }}<br>
                                            <b>Order Status:</b> {{ $order->status }}<br>
                                        </div>
                                    </div>
                                    <br><br><br><br><br><br><br>
                                    <div class="row mt-5">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Qty</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($order->items as $item)
                                                        <tr>
                                                            <td>{{ $item->product->name }}</td>
                                                            <td>{{$item->quantity}}</td>
                                                            <td>Ksh.{{ config('settings.currency_symbol') }}{{ round($item->price, 2) }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                
                    <a href="{{ route('orders.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
<style> 
    .obiz{
       text-align: right;
    }   
       /* Create three equal columns that floats next to each other */
   .trial {
     float: left;
     width: 33.33%;
     padding: 10px;
   }
       /* Create three equal columns that floats next to each other */
       .trials {
     float: left;
     width: 25%;
     padding: 10px;
   }
   </style>
   
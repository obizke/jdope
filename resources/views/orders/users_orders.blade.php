@extends('layouts.japp')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Orders</h1>
  
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                @include('orders.table')
                <div style='display: flex;justify-content: center;'>
                    {{$orders->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection


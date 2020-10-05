@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Products</h1>
        <h1 class="pull-right">
           <a data-toggle="modal" data-target="#add-product-modal" class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px"><i class="fa fa-plus-circle">Product</i></a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('products.table')
                {!! Form::open(['route' => 'products.store','enctype'=>'multipart/form-data']) !!}
                @include('products.fields')
                {!! Form::close() !!}
                <div style='display: flex;justify-content: center;'>
                    {{$products->links()}}
                </div>
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection


@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Abouts</h1>
        <h1 class="pull-right">
           <a data-toggle="modal" data-target="#add-about-modal" class="btn btn-success pull-right"  style="margin-top: -10px;margin-bottom: 5px"><i class="fa fa-plus-circle">About</i></a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('sweetalert::alert')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('abouts.table')
                {!! Form::open(['route' => 'abouts.store']) !!}
                @include('abouts.fields')
                {!! Form::close() !!}
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection


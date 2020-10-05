@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Trends
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($trends, ['route' => ['trends.update', $trends->id], 'method' => 'patch']) !!}

                        @include('trends.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
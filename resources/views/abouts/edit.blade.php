@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            About
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($about, ['route' => ['abouts.update', $about->id], 'method' => 'patch']) !!}

                   <div class="modal-body">
                    <!-- Description Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::textarea('description', null, ['id'=>'description','class' => 'form-control','rows'=>6]) !!}
                    </div>
                    </div>
                   <div class="modal-footer">
                    {!! Form::submit('Update about info', ['class' => 'btn btn-success']) !!}
                    <a href="{{ route('abouts.index') }}" class="btn btn-default">Back</a>
          
                   </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@push('scripts')
<script>
ClassicEditor
.create( document.querySelector( '#description' ) )
.catch( error => {
    console.error( error );
} );
</script>
@endpush
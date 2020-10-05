@extends('layouts.app')
<style>

    .preview-img
    {
        border-radius: 80%;
        box-shadow: 0px 0px 5px 2px rgba(0,0,0,0.7);
    }
    .browse-button
    {
        width: 180px;
        height: 180px;
        border-radius: 100%;
        position: absolute; /* Tweak the position property if the element seems to be unfit */
        top: 0px;
        left: 15px;
        background: linear-gradient(180deg, transparent, black);
        opacity: 0;
        transition: 0.3s ease;
    }
    
    .browse-button:hover
    {
        opacity: 1;
    }
    
    .browse-input
    {
        width: 180px;
        height: 180px;
        border-radius: 80%;
        transform: translate(-1px,-26px);
        opacity: 0;
    }
    
    .fieldset{
         margin-top: 5px;
    }
    .fieldset legend{
         display:block;
         width: 100%;
         padding: 0%;
         font-size: 15px;
         border: 0;
         line-height: inherit;
         color: #797979;
         border-bottom: 1px solid #e5e5e5; 
    }
    </style>


@section('content')
    <section class="content-header">
        <h1>
            Product
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'patch']) !!}

                        <!--Body-->
              <div class="modal-body">
                <div class="col-lg-12 col-md-12 col-sm-12">
                   <div class="col-lg-8 col-md-8">
                        <!-- Name Field -->
                        <div class="form-group col-sm-8">
                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                         </div>
                         <!-- Nature Field -->
                         <div class="form-group col-sm-8"> 
                            {{form::label('nature','Nature')}}
                            {{form::select('nature',array('new'=>'New Arrivals','trending'=>'Trending clothes','best'=>'Best sellers'),'B')}}
                          </div>
                          <!-- Price Field -->
                          <div class="form-group col-sm-8">
                             {!! Form::label('price', 'Price:') !!}
                             {!! Form::text('price', null, ['class' => 'form-control']) !!}
                          </div>
                    </div>
                    <!-- Photo Field -->
                    <div class="col-lg-3 col-md-3 col-sm-3">
                         <div class="form-group form-group-login">
                             <table style="margin:0 auto;">
                                <thead>
                                   <tr class="info">
                                   </tr>
                                 </thead>
                                 <tbody>
                                    <img class="preview-img" src="/storage/shop/{{ $product->photo }}" alt="Preview Image" width="180" height="180" id="photo" style="border-radius: 50%"/>
                                </tbody>
                            </table>
                         </div>
                      </div>
                </div>
                <!-- Description Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', null, ['id'=>'description','class' => 'form-control']) !!}
                </div>

            </div>
            <div class="modal-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('products.index') }}" class="btn btn-default">Cancel</a>
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
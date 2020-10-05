@extends('layouts.japp')
@section('content')
<div class="banner1">
    <div class="container">
        <h3><a href="/">Home</a> / <span>Mail Us</span></h3>
    </div>
</div>
<!--banner-->
<!--content-->
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

    <div class="content">
        <!--contact-->
            <div class="mail-w3ls">
                <div class="container">
                    <h2 class="tittle">Mail Us</h2>
                    <div class="mail-grids">
                        <div class="mail-top">
                            <div class="col-md-4 mail-grid">
                                <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                                <h5>Address</h5>
                                <p>Moi Avenue Rd-Nairobi -kenya</p>
                            </div>
                            <div class="col-md-4 mail-grid">
                                <i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
                                <h5>Phone</h5>
                                <p>Telephone:  +254 791 361 236</p>
                            </div>
                            <div class="col-md-4 mail-grid">
                                <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
                                <h5>E-mail</h5>
                                <p>E-mail:info@jdopewear.co.ke</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="map-w3">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8173311640608!2d36.82137331475396!3d-1.2834673990638747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f11c5340716b5%3A0x717b4d8e7f2dd852!2sj%20dope%20wear!5e0!3m2!1sen!2ske!4v1587118068465!5m2!1sen!2ske" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        <div class="mail-bottom">
                            <h4>Get In Touch With Us</h4>
                            {!! Form::open(['action'=>'Juben\ContactsController@store','method'=>'POST']) !!}
                                
                              <div class="form-group-inner">
                                  <div class="icon-box"> 
                                      {{form::text('name','',['class'=>'form-control icon fa fa-user','placeholder'=>'Name...'])}}
                                   </div>
                               </div>
                              
                                <div class="form-group-inner">
                                    <div class="icon-box"> 
                                        {{form::email('email','',['class'=>'form-control icon fa fa-user','placeholder'=>'Email'])}}
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="icon-box"> 
                                        {{form::text('telephone','',['class'=>'form-control icon fa fa-user','placeholder'=>'Phone No...'])}}
                                    </div>
                                </div>
                                   <div class="form-group-inner">
                                           {{form::textarea('message','',['class'=>'form-control icon fa fa-user','placeholder'=>'message'])}}
                                   </div>
                               
                                   {{Form::submit('Send Message',['class'=>'btn btn-primary flaticon-envelope32'])}}
                                   <input type="reset" value="Clear" >
                            </div>
                          {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        <!--contact-->
    </div>

@endsection
<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $product->name }}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $product->slug }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $product->description }}</p>
</div>

<!-- Photo Field -->
<div class="form-group">
    {!! Form::label('photo', 'Photo:') !!}
    <p>{{ $product->photo }}</p>
</div>

<!-- Nature Field -->
<div class="form-group">
    {!! Form::label('nature', 'Nature:') !!}
    <p>{{ $product->nature }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $product->price }}</p>
</div>


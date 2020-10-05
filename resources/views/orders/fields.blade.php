<!-- Fname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fname', 'Fname:') !!}
    {!! Form::text('fname', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Lname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lname', 'Lname:') !!}
    {!! Form::text('lname', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location', 'Location:') !!}
    {!! Form::text('location', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- County Field -->
<div class="form-group col-sm-6">
    {!! Form::label('county', 'County:') !!}
    {!! Form::text('county', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Invoice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invoice', 'Invoice:') !!}
    {!! Form::text('invoice', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Count Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_count', 'Item Count:') !!}
    {!! Form::number('item_count', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Total Amount Due Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_amount_due', 'Total Amount Due:') !!}
    {!! Form::number('total_amount_due', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Method Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_method', 'Payment Method:') !!}
    {!! Form::text('payment_method', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Payment Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_status', 'Payment Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('payment_status', 0) !!}
        {!! Form::checkbox('payment_status', '1', null) !!}
    </label>
</div>


<!-- Mpesareceiptnumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('MpesaReceiptNumber', 'Mpesareceiptnumber:') !!}
    {!! Form::text('MpesaReceiptNumber', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('orders.index') }}" class="btn btn-default">Cancel</a>
</div>

<!-- Fname Field -->
<div class="form-group">
    {!! Form::label('fname', 'Fname:') !!}
    <p>{{ $order->fname }}</p>
</div>

<!-- Lname Field -->
<div class="form-group">
    {!! Form::label('lname', 'Lname:') !!}
    <p>{{ $order->lname }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $order->email }}</p>
</div>

<!-- Location Field -->
<div class="form-group">
    {!! Form::label('location', 'Location:') !!}
    <p>{{ $order->location }}</p>
</div>

<!-- County Field -->
<div class="form-group">
    {!! Form::label('county', 'County:') !!}
    <p>{{ $order->county }}</p>
</div>

<!-- Invoice Field -->
<div class="form-group">
    {!! Form::label('invoice', 'Invoice:') !!}
    <p>{{ $order->invoice }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $order->user_id }}</p>
</div>

<!-- Item Count Field -->
<div class="form-group">
    {!! Form::label('item_count', 'Item Count:') !!}
    <p>{{ $order->item_count }}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{{ $order->phone }}</p>
</div>

<!-- Total Amount Due Field -->
<div class="form-group">
    {!! Form::label('total_amount_due', 'Total Amount Due:') !!}
    <p>{{ $order->total_amount_due }}</p>
</div>

<!-- Payment Method Field -->
<div class="form-group">
    {!! Form::label('payment_method', 'Payment Method:') !!}
    <p>{{ $order->payment_method }}</p>
</div>

<!-- Payment Status Field -->
<div class="form-group">
    {!! Form::label('payment_status', 'Payment Status:') !!}
    <p>{{ $order->payment_status }}</p>
</div>

<!-- Mpesareceiptnumber Field -->
<div class="form-group">
    {!! Form::label('MpesaReceiptNumber', 'Mpesareceiptnumber:') !!}
    <p>{{ $order->MpesaReceiptNumber }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $order->status }}</p>
</div>


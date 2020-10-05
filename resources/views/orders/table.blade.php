<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Delivery Location</th>
                <th>Invoice</th>
                <th>Total Items Bought</th>
                <th>Phone</th>
                <th>Payable Amount</th>
                <th>Payment Method</th>
                <th>Payment Status</th>
                @if(Auth::user()->usertype=='admin')
                <th>Mpesareceiptnumber</th>
                <th colspan="3">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
            <td>{{ $order->fname }} {{ $order->lname }}</td>
            <td>{{ $order->email }}</td>
            <td>{{ $order->location }}</td>
            <td>{{ $order->invoice }}</td>
            <td>{{ $order->item_count }}</td>
            <td>{{ $order->phone }}</td>
            <td>Ksh.{{ $order->total_amount_due }}</td>
            <td>
                @if($order->payment_method=='cash_on_delivery')
                <div class="text text-primary">C.O.D</div>
                @else
                <div class="text text-success">Lipa na mpesa</div>
                @endif
            </td>
            <td>
                @if($order->payment_status==0)
                <div class="text text-danger">pending</div>
                @else
                <div class="text text-success">Completed</div>
                @endif
            </td>
            @if(Auth::user()->usertype=='admin')
                <td>{{ $order->MpesaReceiptNumber }}</td>
                <td>
                    {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('orders.show', [$order->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('orders.edit', [$order->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
             @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

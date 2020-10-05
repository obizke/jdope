<div class="table-responsive">
    <table class="table" id="products-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Nature</th>
                <th>Photo</th>
                 <th>Price</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->nature }}</td>
                <td>
                    <img src="/storage/shop/{{ $product->photo }}" width="50" height="50" style="border-radius: 50%" />
                </td>
                <td>ksh.{{ $product->price }}</td>
                <td>
                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('products.show', [$product->id]) }}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-eye-open"></i>View</a>
                        <a href="{{ route('products.edit', [$product->id]) }}" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-edit"></i>Edit</a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

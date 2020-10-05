<div class="table-responsive">
    <table class="table" id="trends-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Photo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($trends as $trends)
            <tr>
                <td>{{ $trends->name }}</td>
            <td>{{ $trends->photo }}</td>
                <td>
                    {!! Form::open(['route' => ['trends.destroy', $trends->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('trends.show', [$trends->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('trends.edit', [$trends->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

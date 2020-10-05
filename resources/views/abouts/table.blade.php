<div class="table-responsive">
    <table class="table" id="abouts-table">
        <thead>
            <tr>
                <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($abouts as $about)
            <tr>
                <td>{!! $about->description !!}</td>
                <td>
                    {!! Form::open(['route' => ['abouts.destroy', $about->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('abouts.show', [$about->id]) }}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-eye-open"></i>View</a>
                        <a href="{{ route('abouts.edit', [$about->id]) }}" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-edit"></i>Edit</a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

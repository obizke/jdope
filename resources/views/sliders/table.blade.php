<div class="table-responsive">
    <table class="table" id="sliders-table">
        <thead>
            <tr>
                <th>Photo</th>
                <th colspan="3">Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sliders as $slider)
            <tr>
                <td>
                    <img src="/storage/sliders/{{ $slider->photo }}" width="50" height="50" style="border-radius: 50%" />
                </td>
                <td>
                    {!! Form::open(['route' => ['sliders.destroy', $slider->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

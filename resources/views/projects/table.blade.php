<table class="table table-responsive">
    <thead>
    <th>Id</th>
			<th>User Id</th>
			<th>Name</th>
			<th>Created At</th>
			<th>Updated At</th>
    <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($projects as $project)
        <tr>
            <td>{!! $project->id !!}</td>
			<td>{!! $project->user_id !!}</td>
			<td>{!! $project->name !!}</td>
			<td>{!! $project->created_at !!}</td>
			<td>{!! $project->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('projects.show', [$project->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('projects.edit', [$project->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
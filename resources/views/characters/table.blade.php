<table class="table table-responsive">
    <thead>
    <th>Id</th>
			<th>User Id</th>
			<th>Families Id</th>
			<th>Character Name</th>
			<th>Character Age</th>
			<th>Character Avatar</th>
			<th>Character Description</th>
			<th>Status</th>
			<th>Photo Id</th>
			<th>Created At</th>
			<th>Updated At</th>
    <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($characters as $character)
        <tr>
            <td>{!! $character->id !!}</td>
			<td>{!! $character->user_id !!}</td>
			<td>{!! $character->families_id !!}</td>
			<td>{!! $character->character_name !!}</td>
			<td>{!! $character->character_age !!}</td>
			<td>{!! $character->character_avatar !!}</td>
			<td>{!! $character->character_description !!}</td>
			<td>{!! $character->status !!}</td>
			<td>{!! $character->photo_id !!}</td>
			<td>{!! $character->created_at !!}</td>
			<td>{!! $character->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['characters.destroy', $character->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('characters.show', [$character->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('characters.edit', [$character->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
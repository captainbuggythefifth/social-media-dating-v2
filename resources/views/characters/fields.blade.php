<!--- Character Name Field --->
<div class="form-group col-sm-6">
    {!! Form::label('character_name', 'Character Name:') !!}
    {!! Form::text('character_name', null, ['class' => 'form-control']) !!}
</div>

<!--- Character Age Field --->
<div class="form-group col-sm-6">
    {!! Form::label('character_age', 'Character Age:') !!}
    {!! Form::number('character_age', null, ['class' => 'form-control']) !!}
</div>

<!--- Character Avatar Field --->
<div class="form-group col-sm-6">
    {!! Form::label('character_avatar', 'Character Avatar:') !!}
    {!! Form::file('character_avatar') !!}
</div>

<!--- Character Description Field --->
<div class="form-group col-sm-6">
    {!! Form::label('character_description', 'Character Description:') !!}
    {!! Form::text('character_description', null, ['class' => 'form-control']) !!}
</div>

<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('characters.index') !!}" class="btn btn-default">Cancel</a>
</div>

@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Character</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($character, ['route' => ['characters.update', $character->id], 'method' => 'patch']) !!}

            @include('characters.fields')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
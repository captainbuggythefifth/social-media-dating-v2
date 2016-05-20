@extends('layouts.app')

@section('content')

    <div class="container">

        <h1 class="pull-left">Characters</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('characters.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @if($characters->isEmpty())
            <div class="well text-center">No Characters found.</div>
        @else
            @include('characters.table')
        @endif
        
    </div>
@endsection
@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Add artist</h1>
    </div>

    {!! Form::open(['method' => 'POST', 'action' => 'ArtistsController@store']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Artist:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <input type="submit" value="Add artist" class="btn btn-primary" />

    <a href="{{ action('ArtistsController@index') }}" class="btn btn-link">Cancel</a>

    {!!Form::close() !!}
@endsection
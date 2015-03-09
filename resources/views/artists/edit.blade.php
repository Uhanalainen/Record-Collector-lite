@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Edit artist: {{ $artist->name }}</h1>
    </div>

    {!! Form::model($artist, ['method' => 'PATCH', 'action' => ['ArtistsController@update', $artist->id]]) !!}
    <input type="hidden" name="id" value="{{ $artist->id }}"/>
    <div class="form-group">
        {!! Form::label('name', 'Artist:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <input type="submit" value="Edit artist" class="btn btn-primary" />

    <a href="{{ action('AlbumsController@index') }}" class="btn btn-link">Cancel</a>

    {!!Form::close() !!}
@endsection
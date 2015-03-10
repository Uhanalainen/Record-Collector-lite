@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Edit album: {{ $album->artist->name }} - {{ $album->name }}</h1>
    </div>

    {!! Form::open(['method' => 'PATCH', 'action' => ['AlbumsController@update', $album->id]]) !!}

        <input type="hidden" name="id" value="{{ $album->id }}" />
        <div class="form-group">
            {!! Form::label('artist', 'Artist:') !!}
            {!! Form::select('artist', $artists, $album->artist_id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('format', 'Format:') !!}
            {!! Form::select('format', $formats, $album->format_id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Album title:') !!}
            {!! Form::text('title', $album->name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::text('price', $album->purchase->price, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('purchased_from', 'Purchased from:') !!}
            {!! Form::text('purchased_from', $album->purchase->purchased_from, ['class' => 'form-control']) !!}
        </div>

        <input type="submit" value="Edit album" class="btn btn-primary" />
        <a href="{{ action('AlbumsController@index') }}" class="btn btn-link">Cancel</a>

    {!! Form::close() !!}
@endsection
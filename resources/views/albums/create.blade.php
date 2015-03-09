@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Add album</h1>
    </div>

    {!! Form::open(['method' => 'POST', 'action' => 'AlbumsController@store']) !!}
        <div class="form-group">
            {!! Form::label('artist', 'Artist:') !!}
            {!! Form::select('artist', $artists, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('title', 'Album title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('format', 'Format:') !!}
            {!! Form::select('format', $formats, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::text('price', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('purchased_from', 'Purchased from:') !!}
            {!! Form::text('purchased_from', null, ['class' => 'form-control']) !!}
        </div>
        <input type="submit" value="Create" class="btn btn-primary" />

        <a href="{{ action('AlbumsController@index') }}" class="btn btn-link">Cancel</a>

    {!! Form::close() !!}
@endsection
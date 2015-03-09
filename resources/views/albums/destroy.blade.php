@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Delete album: {{ $album->artist->name }} - {{ $album->name }}</h1>
    </div>
    {!! Form::open(['method' => 'delete', 'action' => 'AlbumsController@destroy'])  !!}
        <input type="hidden" name="id" value="{{ $album->id }}" />
        <input type="submit" value="Delete album" class="btn btn-danger" />
    {!! Form::close() !!}
        <a href="{{ action('AlbumsController@index') }}" class="btn btn-default">Cancel</a>
@endsection
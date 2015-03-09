@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Delete {{ $artist->name }} <small>Are you sure?</small></h1>
    </div>

    {!! Form::open(['method' => 'delete', 'action' => 'ArtistsController@destroy']) !!}
        <input type="hidden" name="id" value="{{ $artist->id }}" />
        <input type="submit" value="Delete artist" class="btn btn-danger" />
    <a href="{{ action('AlbumsController@index') }}" class="btn btn-link">Cancel</a>

    {!!Form::close() !!}
@endsection
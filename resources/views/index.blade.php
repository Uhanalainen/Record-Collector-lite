@extends('layout')

@section('content')
    <div class="page-header">
        <h1>All artists</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('ArtistsController@create') }}" class="btn btn-primary">Add artist</a>
            <a href="{{ action('AlbumsController@create') }}" class="btn btn-primary">Add album</a>
        </div>
    </div>

    @if( $artists->isEmpty())
        <p>There are no artists! :(</p>
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Artist</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($artists as $artist)
                    <tr>
                        <td><a href="{{ url('/artists', $artist->id) }}">{{ $artist->name }}</a></td>
                        <td>
                            <a href="{{ action('ArtistsController@edit', $artist->id) }}" class="btn btn-default">Edit</a>
                            <a href="{{ action('ArtistsController@delete', $artist->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
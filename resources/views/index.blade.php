@extends('layout')

@section('content')
    <div class="container">
        <h1 class ="page-heading" style="text-align: center;">All artists</h1>
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
@extends('layout')

@section('content')
    <div class="container">
        <h1 class ="page-heading" style="text-align: center;">All albums</h1>
    </div>
    @if( $albums->isEmpty())
        <p>There are no artists! :(</p>
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Album</th>
                <th>Artist</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($albums as $album)
                <tr>
                    <td>{{ $album->name }}</td>
                    <td>{{ $album->artist->name }}</td>
                    <td>{{ $album->purchase->price }}€</td>
                    <td>
                        <a href="{{ action('AlbumsController@edit', $album->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('AlbumsController@delete', $album->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>Total albums: {{ $totalAlbums }}</td>
                <td>Total artists: {{ $totalArtists }}</td>
                <td>Total price: {{ $price }}€</td>
                <td></td>
            </tr>
            </tbody>
        </table>
    @endif

@endsection
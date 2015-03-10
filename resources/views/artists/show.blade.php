@extends('layout')

@section('content')
    <div class="page-header">
        <h1>{{ $artist->name }}</h1>
    </div>

    @if( $albums->isEmpty())
        <p>There are no albums! :(</p>
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Album</th>
                <th>Format</th>
                <th>Bought</th>
                <th>From</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $albums as $album)
                <tr>
                    <td>{{ $album->name }}</td>
                    <td>{{ $album->format->name }}</td>
                    <td>{{ $album->purchase->created_at }}</td>
                    <td>{{ $album->purchase->purchased_from }}</td>
                    <td>{{ $album->purchase->price }}€</td>
                    <td>
                        <a href="{{ action('AlbumsController@edit', $album->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('AlbumsController@delete', $album->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            </tbody>
        </table>
    @endif
@endsection
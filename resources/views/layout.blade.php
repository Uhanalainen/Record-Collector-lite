<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Album Collection</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery.js"></script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a href=" {{ action('AlbumsController@index') }}" class="navbar-brand">Album Collection</a>
            </div>
        </nav>
        @include('flash::message')
        @yield('content')
    </div>
<script>
    $('div.alert').delay(3000).slideUp(300);
</script>
</body>
</html>

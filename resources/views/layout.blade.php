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
        <a class="navbar-brand" href="#">Record Collector</a>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/artists/create">Add artist</a></li>
                <li><a href="/albums/create">Add album</a></li>
                <li><a href="/albums/show">All albums</a></li>
            </ul>
        </div>
        @include('flash::message')
        @yield('content')
    </div>
<script>
    $('div.alert').delay(3000).slideUp(300);
</script>
</body>
</html>

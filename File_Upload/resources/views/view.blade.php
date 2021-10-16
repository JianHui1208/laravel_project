<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>File Upload with VueJS and Laravel - tutsmake.com</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app">
        <h2 class="headerH2">Photo View</h2>
        <div class="nav headerDiv">
        <table class="table table-bordered" style="width: 50%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td>{{ $photo->id }}</td>
                    <td><img src="{{ asset('upload/')}}/{{$photo->title}}" alt="" class="img-fluid" width="10%"/></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
        <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
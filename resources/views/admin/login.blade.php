<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>

    <link rel="stylesheet" href="{{ asset('css/admin/adminlogin.css') }}">
</head>
<body>
    
    <div class="container">
        <!-- <img src="transparant background.png" alt="" class="logo"> -->
        <div class="title">Admin Site</div>
        <form action="/whoami" method="post">
            @csrf
            <input type="text" name="email" id="" placeholder="username">
            <input type="password" name="password" placeholder="password">
            <button type="submit" class="btn">
                masuk
            </button>
        </form>
        <div class="" style="margin-top: 20px;">
            list user : 
        </div>
        <ul style="margin-top: 10px;">
            @foreach ($data as $d)
                <li>{{$d->email}}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>
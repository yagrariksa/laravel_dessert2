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
        <form action="/whoami/regist" method="POST">
            @csrf
            <div class="title">Admin Site</div>        
            <input name="username" type="text" >
            <button class="btn" type="submit">
                Registrasi
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
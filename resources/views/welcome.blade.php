<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{url('welcome/css/welcome.css')}}">
</head>
<body>
  <header>
    <nav>
    <img src="http://127.0.0.1:8000/images/kok.png" class="logo"> 
    <ul><b>Bakti Hall</b></ul>
    
      <ul>
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
      </ul>
    </nav>

    <div class="hero">
      <h1>Selamat Datang Di Website Bakti Hall</h1><br><br>
    </div>
    <div>
     
    </div>
  </header>
  <div class="flex justify-center" style="display:flex; justify-content:center;margin-top:20px;">
    <img src="{{url("images/lapanganbaktihall.png")}}" alt="bakti hall image" width="1000px" height="400px">
    <img src="{{url("images/lapanganbaktihall2.png")}}" alt="bakti hall image" width="1000px" height="400px">
  </div>
</body>
</html>
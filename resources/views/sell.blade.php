<!DOCTYPE html>
<html>
<head>
    <title>Thirft Shop Mongolia</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('sell.css') }}">
    <script src="{{ asset('click.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <meta charset="utf8">
    <style type="text/css">
      #footer {
  position: relative;
  margin-top: 1000px;
  width: 100%;  
  height: 100px; 
  left: 0px;
  bottom: 0;
  background-color: #1D556A;
 }
    </style>
</head>
<body>
    <div class="navbar">
    <a href="http://localhost:8000" class="menuOptions">Home</a>
    @auth
    <a href="http://localhost:8000/shop" class="menuOptions">Shop</a>
    <a href="http://localhost:8000/sell" class="menuOptions">Sell</a>
    <a href="http://localhost:8000/profile" class="userReg">Profile</a>
     <a class="userReg" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
    <a href="http://localhost:8000/login" class="userReg">Sign in</a>
    <a href="http://localhost:8000/register" class="userReg">Register</a>
    @endauth
</div><br>

<div align = "center" class="div" >
         <div class="head">
            <div class="head1"><b>Зарах</b></div>
              	<form action="/publish" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  	Хувцасны нэр:<br>
                  	<input type="text" name="name"><br>
                  	Хувцасны төрөл: <br>
                  	<input type="radio" name="type" value="shirt">Shirt<br>
                    <input type="radio" name="type" value="dif">Өөр төрөл<br>
                    <input type="text" name="addType" hint="Төрлөө бичих"><br>
                    Ашигласан хугацаа(сар):<br>
                  	<input type="number" name="time"><br>
                  	Үнэ(төгрөг):<br>
                  	<input type="number" name="price"><br>
                  	Тайлбар:<br>
                  	<input type="text" name="def" style="height: 100px"><br>
                  	Зураг:<br><br>
                        <label class="button" for="photo">Choose file</label>
                        <div class="col-md-6">
                            <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" required autocomplete="photo" id="upload-photo" style="opacity: 0;" multiple>

                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                  	<input type="submit" value="Байршуулах" name="submit" class="button"></div>
              	</form>
         </div>
      </div>
<!--<footer id="footer" align="center">
  <h3>Thrift shop</h3>
  <p>© 2019 Sleepless Zombies Co.ltd. All Right Reserved. </p>  -->
</footer>
</body>
</html>
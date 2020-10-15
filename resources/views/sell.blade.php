<!DOCTYPE html>
<html>
<head>
    <title>Thirft Shop Mongolia</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_signup.css') }}">
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
         <div class="head" style="width: 1100px; margin-left: 20px;">
            <div class="head1" style="width: 1093px;"><b>Зарах</b></div>
            <div style = "margin: 30px; width: 1100px;">
              	<form action="/publish" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  	<div style="text-align: left; margin-left: 50px; display: table-cell;">Бүтээгдэхүүний нэр:<br>
                  	<input type="text" name="name"><br>
                  	Бүтээгдэхүүний төрөл: <br>
                  	<input type="radio" name="type" value="clothes">Clothes, shoes<br>
                  	<input type="radio" name="type" value="instruments">Musical instruments<br>
                  	<input type="radio" name="type" value="art">Paintings, arts<br>
                  	<input type="radio" name="type" value="elec">Electronics<br>
                  	<input type="radio" name="type" value="Jewelery">Accessory, jeweleries<br>
                  	<input type="radio" name="type" value="fur">Furnitures<br>
                    <input type="radio" name="type" value="dif">Өөр төрөл<br>
                    <input type="text" name="addType" hint="Төрлөө бичих"><br>
                    </div>
                  	<div style="text-align: center; margin-right: 500px; display: table-cell;" >Ашигласан хугацаа(сар):<br>
                  	<input type="number" name="time"><br>
                  	Үнэ(төгрөг):<br>
                  	<input type="number" name="price"><br>
                  	Тайлбар:<br>
                  	<input type="text" name="def" style="height: 100px"><br>
                  </div>
                  	<div style="text-align: right; margin-right: 100px; display: table-cell;">Зураг:<br><br>

                    <div class="form-group row">
                        <label class="button" for="photo">Choose file</label>
                        <div class="col-md-6">
                            <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" required autocomplete="photo" id="upload-photo" style="opacity: 0;" multiple>

                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                  	Барааг аль төрлөөр тавьж байгаа вэ?<br>
                  	<input type="radio" name="usertype" value="dealer">Зуучлагч<br>
                  	<input type="radio" name="usertype" value="owner">Эзэмшигч<br>
                  	<input type="submit" value="Байршуулах" name="submit" class="button"></div>
              	</form>
            </div>
         </div>
      </div>
<footer id="footer" align="center">
  <h3>Thrift shop</h3>
  <p>© 2019 Sleepless Zombies Co.ltd. All Right Reserved. </p>  
</footer>
</body>
</html>
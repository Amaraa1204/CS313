<!DOCTYPE html>
<html>
<head>
    <title>Thirft Shop Mongolia</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('sell.css') }}">
    <script src="{{ asset('click.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <meta charset="utf8">
    
</head>
<body>
    <div class="navbar">
    <a href="http://localhost:8000" class="menuOptions">Home</a>
    @auth
    <a href="http://localhost:8000/shop" class="menuOptions">Shop</a>
    <a href="http://localhost:8000/sell" class="menuOptions">Sell</a>
    <form action="/search" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <input type="text" id="search-bar" name="search" placeholder="Search..">
    </form>
    <a href="http://localhost:8000/profile" class="userReg">Profile</a>
     <a class="userReg" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
    <a href="http://localhost:8000/login" class="userReg">Sign in</a>
    <a href="http://localhost:8000/login" class="userReg">Register</a>
    @endauth
</div><br>

<div class="head1"><b>Зарах</b></div>
<div class="sell-form">  
  <form action="/publish" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row">
    <div class="column">
      <label for="name">Хувцасны нэр:</label>
       <input type="text" name="name" id="name">
        @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
          <label for="type">Хувцасны төрөл:</label>
          <select name="type" id="type">
            <option value="shirt" selected>Shirt</option>          
            <option value="hat">Hat</option>          
            <option value="trouser">Trousers</option>          
            <option value="jacket">Jacket</option>          
            <option value="shoes">Shoes</option>           
          </select>
             @error('type')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror<br>
              <label for="time">Ашигласан хугацаа(сар):</label>
               <input id="time" type="number" name="time">
               @error('time')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
               <label for="price">Үнэ(төгрөг):</label>
              <input type="number" name="price" id="price">
              @error('price')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

          <div class="column">     
               <label for="def">Тайлбар:</label>
              <input id="def" type="text" name="def" style="height: 100px"><br>
              @error('def')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              Зураг:<br><br>
              <label class="button" for="photo">Choose file</label>
              <div class="col-md-6">
                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" required autocomplete="photo" id="upload-photo" style="opacity: 0;" multiple>

                @error('photo')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="submit" value="Байршуулах" name="submit" class="button"></div>
              </div>
            </div>
        </form>
</div>
<!--<footer id="footer" align="center">
  <h3>Thrift shop</h3>
  <p>© 2019 Sleepless Zombies Co.ltd. All Right Reserved. </p>  -->
</footer>
</body>
</html>
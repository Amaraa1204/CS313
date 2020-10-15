<!DOCTYPE html>
<html>
<head>
    <title>Thirft Shop Mongolia</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('item.css') }}">
    <style type="text/css">
      #footer {
  position: relative;
  margin-top: 850px;
  margin-bottom: 0px;
  width: 100%;  
  height: 100px; 
  left: 0px;
  bottom: 0;
  background-color: #1D556A;
 }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <meta charset="utf8">
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
<div class="container">
   <div class="img">
    <img src="/images/{{ $user->photo }}" style="width: 300px; object-fit: cover;">
  </div>

  <?php
  use App\user;
        
  $user = Auth::user();
  $path=  "'http://localhost:8000/profile/".$user->user_name."/mylist'";

  ?>
<div class="definition">
<div class="btn-group">
    <button onclick="window.location.href={{$path}}">Миний зарууд</button><br><br>
  
    <button onclick="window.location.href='{{action('UserController@edit',$user->id)}}'">Мэдээллээ өөрчлөх</button>
  <br><br>
  <form method="post" action="{{action('UserController@destroy', $user->id)}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit">Бүртгэлээ устгах</button>
  </form>
 </div>

  <div class="imgDef">
    <h3>Нэр:</h3>
    <blockquote>{{ Auth::user()->user_name }}</blockquote>
    <h3>И-мэйл:</h3>
    <blockquote>{{ Auth::user()->email }}</blockquote>
    <h3>Анх бүртгүүлсэн хугацаа:</h3>
    <blockquote>{{ Auth::user()->sign_up_date }}</blockquote>
    <h3>Үнэлгээ:</h3>
    <blockquote>1 од</blockquote>
  </div>
</div>
</div>
 
<!--<footer id="footer" align="center">
  <h3>Thrift shop</h3>
  <p>© 2019 Sleepless Zombies Co.ltd. All Right Reserved. </p>  -->
</footer>
</body>
</html>

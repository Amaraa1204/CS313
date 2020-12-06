<!DOCTYPE html>
<html>
<head>
    <title>Thirft Shop Mongolia</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('item.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('profile.css') }}">
    
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

<div class="profile-container">
  <div class="user-panel">
  <img id="profile-pic" src="/images/{{ $user->photo }}">
   <?php
  use App\user;
        
  $user = Auth::user();
  $path = "'http://localhost:8000/profile/".$user->id."/mylist'";

  ?>
  <div class="profile-btn">
    <button onclick="window.location.href={{$path}}">Миний зарууд</button>
  
    <button onclick="window.location.href='{{action('UserController@edit',$user->id)}}'">Мэдээллээ өөрчлөх</button>
  
    <form method="post" action="{{action('UserController@destroy', $user->id)}}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE" />
        <button type="submit">Бүртгэлээ устгах</button>
    </form>
  </div>
 </div>
  <div class="user-info">
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

</body>
</html>

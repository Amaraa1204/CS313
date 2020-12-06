<!DOCTYPE html>
<html>
<head>
    <title>Thirft Shop Mongolia</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('item.css') }}">
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

<?php  
  use App\Posts;
  use App\user;

  $post=Posts::where('id',$itemID)->first();
  $photo = "http://localhost:8000/itemImages/".$post->photo."";
  if (user::where('id', $post->owner_id)->first()==null){
    $seller_name = "User not found";
    $seller_email = " ";
  }
  else{
    $user = user::where('id', $post->owner_id)->first();
    $seller_name = $user->user_name;
    $seller_email = $user->email;
  }

?>

<br>
<div class="item">

    <img id="item-pic" height="200px" width="300px" src={{$photo}}>
    
  <div class="item-info">
    <div class="column-info"> 
      Зарын эзэн:
      <p id="info">{{$seller_name}}</p>
      Цахим шуудан:
      <p id="info">{{$seller_email}}</p>

      <div class="bid-info" >
      <form action="/bid/{{ $post->id }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
    Санал болгох үнэ:<br> 
    <input type='number' name='bid'>
    <input type="submit" name="submitbutton" value='send'></input>
    <br>
    <input type="submit" name="submitbutton" value='buy'></input>
  </form>
</div>


    </div>
    <div class="column-info"> 
      Хувцасны нэр:
      <p id="info">{{$post->name}}</p>
      Ашигласан хугацаа:
      <p id="info">{{$post->time}} сар</p>
      Үнэ:
      <p id="info">{{$post->price}} төг</p>
      Нэмэлт тайлбар:
      <p id="info">{{$post->description}}</p>
    </div>
  </div>

  
</div>

<!--<footer id="footer" align="center">
  <p>Thrift shop</h3>
  <p>© 2019 Sleepless Zombies Co.ltd. All Right Reserved. </p>  
</footer>-->
</body>
</html>
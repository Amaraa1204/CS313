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
    $seller_name = $user->name;
    $seller_email = $user->email;
  }

  $path = "'http://localhost:8000/bid/".$post->id."/show'";

?>

<br>

<div class="item">

  <img id="item-pic" height="500px" src={{$photo}}>
    
  <div class="item-info">
    <div class="column-info"> 
      Зарын эзэн:
      <p id="info">{{$seller_name}}</p>
      Цахим шуудан:
      <p id="info">{{$seller_email}}</p>
      <div class="bid-info">
      <button id = "btn" onclick="window.location.href='{{ action('PostController@edit', $post->id )}}'">Мэдээллээ өөрчлөх</button>
      <button id = "btn" onclick="window.location.href={{$path}}">Үнийн санал харах</button>
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
  <h3>Thrift shop</h3>
  <p>© 2019 Sleepless Zombies Co.ltd. All Right Reserved. </p>  
</footer>-->
</body>
</html>
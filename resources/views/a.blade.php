<!DOCTYPE html>
<html>
<head>
    <title>Thirft Shop Mongolia</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('item.css') }}">
    <script src="{{ asset('click.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
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
    $seller_name = $user->user_name;
    $seller_email = $user->email;
  }

?>

<br>
<div class="item">
  <div class="img">
    <img height="500px" src={{$photo}}>
  </div>
  <div style="float: left; margin-right: 280px">
    <h3>Seller Name:</h3>
    <blockquote>{{$seller_name}}</blockquote>
    <h3>Seller email:</h3>
    <blockquote>{{$seller_email}}</blockquote>
  </div>
  <div class="imgDef" style="font-size: 17px; float: right; margin-left:280px ">
    <h3>Product name:</h3>
    <blockquote>{{$post->name}}</blockquote>
    <h3>Ашигласан хугацаа:</h3>
    <blockquote>{{$post->time}}</blockquote>
    <h3>Үнэ:</h3>
    <blockquote>{{$post->price}}</blockquote>
    <h3>Нэмэлт тайлбар:</h3>
    <blockquote>{{$post->description}}</blockquote>
  </div>
  <form action="/bid/{{ $post->id }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
    Санал болгох үнэ: <input type='number' name='bid'><br>
    <input type="submit" name="submitbutton" value='send'>Үнийн санал илгээх</input>
    <input type="submit" name="submitbutton" value='message'>Холбогдох</input>
    <input type="submit" name="submitbutton" value='buy'>Худалдаж авах</input>
  </form>
</div>

<!--<footer id="footer" align="center">
  <h3>Thrift shop</h3>
  <p>© 2019 Sleepless Zombies Co.ltd. All Right Reserved. </p>  
</footer>-->
</body>
</html>
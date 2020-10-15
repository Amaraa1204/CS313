<!DOCTYPE html>
<html>
<head>
    <title>Thirft Shop Mongolia</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('itemList.css') }}">
    <script src="{{ asset('click.js') }}"></script>
    <style type="text/css">
      #footer {
  position: absolute;
  margin-top: 10px;
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

<br>
<div align="center">
  <?php  
  use App\Posts;


  $posts=Posts::where('type','instruments')->get();

  foreach ($posts as $post) {
    //echo $post;
    $post->photo;
    $photo = "background:url(http://localhost:8000/itemImages/".$post->photo.");";
    $path = "'http://localhost:8000/shop/a/".$post->id."'";
    //echo $photo;
    //echo "<br><br>";

    echo '<button class="item" style="'.$photo.' position: center; background-size: cover;" onclick="window.location.href='.$path.';">
      <br><br><br><br><br><br><br><br><br>
      '.$post->owner_name.'<br>
      '.$post->name.'<br>
      '.$post->price.'<br> 
  </button>';
  }
  ?>


</div>
<footer id="footer" align="center">
  <h3>Thrift shop</h3>
  <p>© 2019 Sleepless Zombies Co.ltd. All Right Reserved. </p>  
</footer>
</body>
</html>
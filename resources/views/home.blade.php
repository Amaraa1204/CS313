<!DOCTYPE html>
<html>
<head>
    <title>Thirft Shop Mongolia</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('shop.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('itemList.css') }}">

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


<div align="center" style=" margin-top: 80px;">
  <?php  
  use App\Posts;
  use App\user;
  use App\Bid;
  $posts = Posts::all();
  foreach ($posts as $post) {
    //echo $post;
    $photo = $post->photo;
    $photo = "background:url(http://localhost:8000/itemImages/".$photo.");";
    $path = "'http://localhost:8000/shop/a/".$post->id."'";
    $status = "";
    //echo $photo;
    //echo "<br><br>";
    if (user::where('id', $post->owner_id)->first() == null) {
      $username = 'User not found';
    }
    else{
      $username = user::where('id', $post->owner_id)->first()->name;
    }
    echo '<button class="item" style="'.$photo.' position: center; background-size: cover;" onclick="window.location.href='.$path.';">
      <br><br><br><br><br><br><br><br><br>
      '.$username.'<br>
      '.$post->name.'<br>
      '.$post->price.'<br> 
      '.$post->status.'<br>
    </button>';
  }
  ?>
</div>

</body>
<!--
<footer id="footer">
  <h3>Thrift shop</h3>
  <p>© 2020 Sleepless Zombies Co.ltd. All Right Reserved. </p>
</footer>-->
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Thirft Shop Mongolia</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('shop.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('itemList.css') }}">
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



  <h1 class="headText" style="margin-top: 10%; margin-left: 35%;">Happy SHOPPING!</h1>
<div align="center" style=" margin-top: 80px;">
  <?php  
  use App\Posts;
  use App\user;
  use App\Bid;
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
    if (Bid::where('post_id', $post->id)->get() != null){
      $bids = Bid::where('post_id', $post->id)->get();
      foreach ($bids as $bid){
        if($bid->state == "accepted" || $bid->state == "unaccepted"){
          $status = "SOLD";
        }
        else{
          $status = "";
        }
      }
    }
    echo '<button class="item" style="'.$photo.' position: center; background-size: cover;" onclick="window.location.href='.$path.';">
      <br><br><br><br><br><br><br><br><br>
      '.$username.'<br>
      '.$post->name.'<br>
      '.$post->price.'<br> 
      '.$status.'<br>
    </button>';
  }
  ?>
</div>
<!--<footer id="footer" align="center">
  <h3>Thrift shop</h3>
  <p>© 2019 Sleepless Zombies Co.ltd. All Right Reserved. </p> --> 
</footer>
</body>
</html>
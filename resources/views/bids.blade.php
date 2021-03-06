<!DOCTYPE html>
<html>
<head>
    <title>Thirft Shop Mongolia</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('itemList.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('list.css') }}">
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
  use App\Bid;

  $post=Posts::where('id',$id)->first();
  $photo = "background:url(http://localhost:8000/itemImages/".$post->photo.");";
  if (user::where('id', $post->owner_id)->first()==null){
    $seller_name = "User not found";
    $seller_email = " ";
  }
  else{
    $user = user::where('id', $post->owner_id)->first();
    $seller_name = $user->name;
    $seller_email = $user->email;
  }

?>

<br>

<div class="row">
<div class="clothes" style="{{$photo}} position: center; background-size: cover;">
  <div style="float: left; margin-right: 280px">
    <br>
    <blockquote>{{$post->name}}</blockquote>
  </div>
</div>

<ul style="margin-top: 150px;">

<?php  
$bids = Bid::where('post_id', $post->id)->get();
  foreach ($bids as $bid) {
    $user = user::where('id', $bid->user_id)->first();
    echo '
    <div class="bid-list">
      <div class="list-info">
      <p style="margin-bottom: -16px;">Нэр:</p>
      <blockquote>'.$user->user_name.'</blockquote>
      </div>

      <div class="list-info">
      <p style="margin-bottom: -16px;">Xэмжээ:</p>
      <blockquote>'.$bid->amount.'₮ </blockquote>
      </div>
      <form action="/bids/'.$bid->id.'" method="post" enctype="multipart/form-data">
      '.csrf_field().'
      <input type="submit" name="submitbutton" value="accept"></input>
      </form>
    </div>';
  }

?>
</ul>
</div>
<!--<footer id="footer" align="center">
  <h3>Thrift shop</h3>
  <p>© 2019 Sleepless Zombies Co.ltd. All Right Reserved. </p>  
</footer>-->
</body>
</html>
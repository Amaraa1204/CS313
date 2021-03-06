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

<ul style="margin-top: 150px;">

<?php  
  use App\Posts;
  use App\user;
  $user = Auth::user();
    $posts = Posts::where('owner_id', $user->id)->get(); 
  foreach ($posts as $post) {
    $photo = "http://localhost:8000/itemImages/".$post->photo."";
    $path = "'http://localhost:8000/b/".$post->id."'";
    echo '

    <div class="list">

    <div class="list-info">
      <h2>Нэр:</h2>
      <p id="post-name">'.$post->name.'</p>
    </div>

    <img style="width: 230px;" src="'.$photo.'">
    <button onclick="window.location.href='.$path.';"style="background-color: #BC69FD; margin-right: 30px; ">Дэлгэрэнгүй
    </button>
    </div>';
  }

?>  
</ul>
<!--<footer id="footer" align="center">
  <h3>Thrift shop</h3>
  <p>© 2019 Sleepless Zombies Co.ltd. All Right Reserved. </p>
</footer-->
</body>
</html>
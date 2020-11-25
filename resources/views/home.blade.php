<!DOCTYPE html>
<html>
<head>
    <title>Thirft Shop Mongolia</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('home.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <meta charset="utf8">
</head>
<body>
    <div class="navbar">
    <a href="http://localhost:8000" class="menuOptions">Home</a>
    @auth
    <a href="http://localhost:8000/shop" class="menuOptions">Shop</a>
    <a href="http://localhost:8000/sell" class="menuOptions">Sell</a>
    <form>
        <input type="text" id="search-bar" name="search" placeholder="Search..">
    </form>
    <a href="http://localhost:8000/profile" class="userReg">Profile</a>
     <a class="userReg" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
    <form>
        <input type="text" id="search-bar" name="search" placeholder="Search..">
    </form>
    <a href="http://localhost:8000/login" class="userReg">Sign in</a>
    <a href="http://localhost:8000/login" class="userReg">Register</a>
    @endauth
</div><br>
<div class="container">
	<img src="images/pic1.jpg" class="homeImg" id="rotate" style="margin-left: 5%; width: 400px; height: 300px;">
	<img src="images/pic2.jpg" class="homeImg" style="margin-left: 15%; width: 400px; height: 300px; ">
    <img src="images/pic1.jpg" class="homeImg" id="rotate" style="margin-left: 5%; width: 400px; height: 300px;">
	<img src="images/pic2.jpg" class="homeImg" style="margin-left: 15%; width: 400px; height: 300px; ">
    <img src="images/pic1.jpg" class="homeImg" id="rotate" style="margin-left: 5%; width: 400px; height: 300px;">
	<img src="images/pic2.jpg" class="homeImg" style="margin-left: 15%; width: 400px; height: 300px; ">

</div>
<footer id="footer">
  <h3>Thrift shop</h3>
  <p>© 2020 Sleepless Zombies Co.ltd. All Right Reserved. </p>
</footer>
</body>
</html>
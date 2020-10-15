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
	<h1 id="headText">WELCOME! to Thrift Shop Mongolia</h1>
	<div>
	<img src="images/pic1.jpg" class="homeImg" id="rotate" style="margin-left: 5%; width: 400px; height: 300px;">
	<img src="images/pic2.jpg" class="homeImg" style="margin-left: 15%; width: 400px; height: 300px; ">
	</div><br><br><br><br><br>

	<div>
		<h2 style="color: #FFFFFF; text-align: center; font-size: 60px">Thrift shop гэж юу вэ?</h2>
		<blockquote style="color: #FFFFFF; text-align: center; font-size: 40px;">
			Энэ бол та өөрт хэрэгцээгүй бараагаа зарах эсвэл өөрийн<br> хэрэгцээтэй зүйлсийг хямд үнээр олж авах орон зай юм.
		</blockquote>
	</div>
<!--<footer id="footer" align="center" style="bottom: 0;">
  <h3>Thrift shop</h3>
  <p>© 2019 Sleepless Zombies Co.ltd. All Right Reserved. </p>  -->
</footer>
</body>
</html>
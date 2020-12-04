<!DOCTYPE html>
<html>
<head>
    <title>Thirft Shop Mongolia</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('sell.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
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

  $post=Posts::where('id',$id)->first();
  $photo = "http://localhost:8000/itemImages/".$post->photo."";
  if (user::where('id', $post->owner_id)->first()==null){
    $seller_id = "0";
    $seller_email = " ";
  }
  else{
    $user = user::where('id', $post->owner_id)->first();
    $seller_id = $user->id;
    $seller_email = $user->email;
  }
    $type = $post->type;
?>

<div class="head1"><b>Шинэчлэх</b></div>
<div class="sell-form">  
  <form action="{{action('PostController@update', $post->id )}}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  {{ method_field('PATCH') }}
  <div class="row">
    <div class="column">
      <label for="name">Хувцасны нэр:</label>
       <input type="text" name="name" id="name" value="{{ $post->name }}">
        @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
          <label for="type">Хувцасны төрөл:</label>
          <select name="type" id="type">
                    <option value="shirt" {{ $post->type == "shirt" ? 'selected' : '' }}>Shirt</option>          
                    <option value="hat" {{ $post->type == "hat" ? 'selected' : '' }}>Hat</option>          
                    <option value="trouser" {{ $post->type == "trouser" ? 'selected' : '' }}>Trousers</option>          
                    <option value="jacket" {{ $post->type == "jacket" ? 'selected' : '' }}>Jacket</option>          
                    <option value="shoes" {{ $post->type == "shoe" ? 'selected' : '' }}>Shoes</option>            
          </select>
             @error('type')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror<br>
              <label for="time">Ашигласан хугацаа(сар):</label>
               <input id="time" type="number" name="time" value="{{ $post->time }}">
               @error('time')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
               <label for="price">Үнэ(төгрөг):</label>
              <input type="number" name="price" id="price" value="{{ $post->price }}">
              @error('price')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

          <div class="column">     
               <label for="def">Тайлбар:</label>
              <input id="def" type="text" name="def" style="height: 100px" value="{{ $post->description }}"><br>
              @error('def')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              Зураг:<br><br>
              <label class="button" for="photo">Choose file</label>
              <div class="col-md-6">
                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" required autocomplete="photo" id="upload-photo" style="opacity: 0;" multiple>
                <img height="500px" style="width: 200px; height: 200px;object-fit: cover;" src="/itemImages/{{ $post->photo }}">
                @error('photo')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="submit" value="Байршуулах" name="submit" class="button"></div>
              </div>
            </div>
        </form>
</div>
<!--<footer id="footer" align="center" style=" position: relative; margin-top: 1000px">
  <h3>Thrift shop</h3>
  <p>© 2019 Sleepless Zombies Co.ltd. All Right Reserved. </p>  
</footer>-->
</body>
</html>



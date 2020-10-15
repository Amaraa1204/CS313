@extends('master')

@section('content')<br>
<div id="icon">
  <h4  class="notification" align="Right"  onclick="notification_on_click()">
    <span>notification</span>
    <span class="badge">3</span>
    <p id="notification"></p>
  </h4>
</div>
<div class="item">
  <div class="img">
    <img width="400px" src="{{ asset('images/shoes/i.jpg') }}">
  </div>
  <div class="imgDef" style="font-size: 17px;">
    <h3>Name:</h3>
    <blockquote>Aurora</blockquote>
    <h3>Product name:</h3>
    <blockquote>Өсгийтэй гутал</blockquote>
    <h3>Ашигласан хугацаа:</h3>
    <blockquote>0 жил</blockquote>
    <h3>Үнэ:</h3>
    <blockquote>55000 төгрөг</blockquote>
    <h3>Нэмэлт тайлбар:</h3>
    <blockquote>Шинээр аваад огт хэрэглээгүй байгаа.</blockquote>
  </div>
</div>
@endsection
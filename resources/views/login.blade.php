@extends('master')

@section('content')
               <form action = "" method = "post">
               <div class="container">
                  <label><b>Хэрэглэгчийн нэр : </b></label>
                  <input type = "text" name = "user_name" class = "box"/><br /><br />
                  <label><b>Нууц үг: </b></label>
                  <input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Нэвтрэх " class="button" /><br />
               </div>
               </form>

            
@endsection

@extends('master')

@section('content')<br>
 <div align = "center">
         <div class="head">
            <div class="head1"><b>Нэвтрэх</b></div>
            <div style = "margin: 30px">
               <form action = "" method = "post">
                  <label>Хэрэглэгчийн нэр :</label><input type = "text" name = "user_name" class = "box"/><br /><br />
                  <label>Нууц үг: <br> </label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Нэвтрэх " class="button" /><br />
               </form>
            </div>
         </div>
      </div>
@endsection

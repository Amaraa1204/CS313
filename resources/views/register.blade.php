@extends('master')

@section('content')<br>
 <div align = "center">
         <div class="head">
            <div class="head1"><b>Register</b></div>
            <div style = "margin: 30px">
               <form action='' method="post">
					хэрэглэгчийн нэр:<br>
					<input type="text" name="user_name"><br>
					Овог:<br>
					<input type="text" name="last_name"><br>
					Нэр:<br>
					<input type="text" name="first_name"><br>
					eMail:<br>
					<input type="text" name="email"><br>
					Нууц үг:<br>
					<input type="password" name="password"><br>
					<input type="radio" name="type" value="Admin"> Admin<br>
					<input type="radio" name="type" value="Customer"> Customer<br>
					<input type="submit" value="Буртгүүлэх" name="submit" class="button">
				</form>
            </div>
         </div>
      </div>
@endsection
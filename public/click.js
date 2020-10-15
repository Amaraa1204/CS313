
	var isExpand = 0;
function notification_on_click()
{
	if (isExpand==0) 
	{	

		document.getElementById("icon").innerHTML = '<h4  class="notification" align="Right" style="background: #F1E5DE; color: black;"  onclick="notification_on_click()">    <span>notification</span>    <span class="badge">3</span>    <p id="notification"></p>  </h4>';
		document.getElementById("notification").innerHTML = ' <div class="dropdown-content" style="position: absolute;"><a href="http://localhost:8000/shop/shoes/a">Мэдээлэл</a><a href="http://localhost:8000/profile/mylist/b">миний бараа</a><a href="http://localhost:8000/shop/shoes/a">гутал</a></div>';
		isExpand++;
	}
	else
	{
		document.getElementById("icon").innerHTML='  <h4  class="notification" align="Right"  onclick="notification_on_click()">    <span>notification</span>    <span class="badge">3</span>    <p id="notification"></p>  </h4>';
		document.getElementById("notification").innerHTML = '';
		isExpand=0;
	}
}
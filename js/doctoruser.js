function loadbyid() 
{
	//alert(id);
	var dummyDate="date";
	var date=document.getElementById(dummyDate).value;
	//alert(date);
	var xhttp = new XMLHttpRequest();
	//xhttp.open('GET', 'abc.php?name='+name, true);
	xhttp.open('POST', '../php/doctorusercount.php', true);
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp.send('date='+date);
	xhttp.onreadystatechange = function ()
	{
		if(this.readyState == 4 && this.status == 200)
		{
			if(this.responseText != "")
			{
				document.getElementById('searchdata').innerHTML = this.responseText;
				//alert(this.responseText);
			}
			else
			{
				document.getElementById('searchdata').innerHTML = "";
			}
			
		}	
	}
}
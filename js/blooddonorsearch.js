function load()
{
	var name = document.getElementById('name').value;
	var xhttp = new XMLHttpRequest();
	//xhttp.open('GET', 'abc.php?name='+name, true);
	xhttp.open('POST', '../php/blooddonorsearch.php', true);
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp.send('name='+name);
	xhttp.onreadystatechange = function ()
	{
		if(this.readyState == 4 && this.status == 200)
		{
			if(this.responseText != "")
			{
				document.getElementById('blooddonorsearchdata').innerHTML = this.responseText;
				//alert(this.responseText);
			}
			else
			{
				document.getElementById('blooddonorsearchdata').innerHTML = "";
			}
			
		}	
	}
	document.getElementById('blooddonortable').innerHTML = "";	
	
}
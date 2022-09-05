function loadbyid(id) 
{
	//alert(id);
	var dummyDate="date"+id;
	var date=document.getElementById(dummyDate).value;
	//alert(date);
	var xhttp = new XMLHttpRequest();
	//xhttp.open('GET', 'abc.php?name='+name, true);
	xhttp.open('POST', '../php/appoint.php', true);
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp.send('date='+date +'&id='+id);
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

function load()
{
	var name = document.getElementById('name').value;
	var xhttp = new XMLHttpRequest();
	//xhttp.open('GET', 'abc.php?name='+name, true);
	xhttp.open('POST', '../php/searchdoctor.php', true);
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp.send('name='+name);
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
	document.getElementById('doctortable').innerHTML = "";	
	
}

//name
function validatename()
{
	var name=document.getElementById('name').value;
	if (name=="") 
	{
		document.getElementById('namemsg').innerHTML="Name can not be empty";
		return false;
	}
	
	else
	{
		if((name[0]>='a' && name[0]<='z') || (name[0]>='A' && name[0]<='Z'))
		{
			if (name.split(" ").length>=2) 
			{
				var counter=0;
				while(counter<name.length)
				{
					if(!((name[counter]>='A' && name[counter]<='Z') ||(name[counter]>='a' && name[counter]<='z') || name[counter]=='.' || name[counter]=='-' || name[counter]==' '))
					{
						document.getElementById('namemsg').innerHTML="Name can only contain A-Z, a-z, . and -";
						return false;
					}
					counter=counter+1;
				}
				document.getElementById('namemsg').innerHTML="";
				return true;
			}
			else
			{
				document.getElementById('namemsg').innerHTML="Contain at least two words";
				return false;
			}
		}
		else
		{
			document.getElementById('namemsg').innerHTML="Must start with a letter";
			return false;
		}
	}
	return false;
}

//email

function validateemail()
{
	var email=document.getElementById('email').value;	
	if(email!="")
	{
		if(email.split("@").length>=2)
		{
			var emailsplit=email.split("@");
			if(emailsplit[1].split(".").length>=2)
			{
				document.getElementById('emailmsg').innerHTML="";
				return true;
			}
			else
			{
				document.getElementById('emailmsg').innerHTML=".com is missing";
				return false;
			}
		}
		else
		{
			document.getElementById('emailmsg').innerHTML="Please enter valid email";
			return false;
		}
	}
	else
	{
		document.getElementById('emailmsg').innerHTML="Email cannot be empty";
		return false;
	}
}

//gender
function validategender()
{
	var male=document.getElementById('male').checked;
	var female=document.getElementById('female').checked;
	var others=document.getElementById('others').checked;
	if ((male=="") && (female=="") &&(others=="")) 
	{
		document.getElementById('gendermsg').innerHTML="Gender Required";
		return false;
	}
	else
	{
		document.getElementById('gendermsg').innerHTML="";
		return true;
	}
}
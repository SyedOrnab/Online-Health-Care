function validdate()
{
	var date=document.getElementById('covidtestingdate').value;
	var xhttp = new XMLHttpRequest();
			xhttp.open('POST', '../php/covidtest.php', true);
			xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhttp.send('date='+date);

			xhttp.onreadystatechange = function ()
			{
			if(this.readyState == 4 && this.status == 200)
				{
					if(this.responseText != "")
					{
						var b=this.responseText;
						var c=b.split(",");
						var sel = document.getElementById('time');
						var length = sel.options.length;
						for (i = length-1; i >= 0; i--) 
						{
						  sel.options[i] = null;
						}
						for (var i =0; i < c.length-1; i++) 
						{
							var opt = document.createElement('option');
							opt.appendChild( document.createTextNode(c[i]));
							opt.value = c[i];
							sel.appendChild(opt);
						}

							 
					}
				}	
			}
}
function combo() 
{
	var sel = document.getElementById('time');
	var length = sel.options.length;
	for (i = length-1; i >= 0; i--) 
	{
	  sel.options[i] = null;
	}
}

function load()
{
	var name = document.getElementById('name').value;
	var xhttp = new XMLHttpRequest();
	//xhttp.open('GET', 'abc.php?name='+name, true);
	xhttp.open('POST', '../php/searchcovid.php', true);
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
	document.getElementById('covidtable').innerHTML = "";	
	
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
"use strict"




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


//username

function validateusername()
{
	var username=document.getElementById('username').value;
	if (username=="") 
	{
		document.getElementById('usernamemsg').innerHTML="UserName can not be empty";
		return false;
	}	
	else
	{
			var username = document.getElementById('username').value;
			var xhttp = new XMLHttpRequest();
			xhttp.open('POST', '../php/usernamecheck.php', true);
			xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhttp.send('username='+username);

			xhttp.onreadystatechange = function ()
			{
			if(this.readyState == 4 && this.status == 200)
				{

					if(this.responseText != "")
					{
						document.getElementById('usernamemsg').innerHTML = this.responseText;
					}
					else
					{
						document.getElementById('usernamemsg').innerHTML = "";
					}
					
				}	
			}
	}
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
//password
function validatepassword()
{
	var password=document.getElementById('password').value;
	var confirmpassword=document.getElementById('confirmpassword').value;

	if(password==confirmpassword && password!="")
	{
		document.getElementById('passwordmsg').innerHTML="";
		return true;
	}
	else
	{
		document.getElementById('passwordmsg').innerHTML="Password and Confirmpassword must be same and also can not be empty";
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
function validatedate()
{
	var date=document.getElementById('dateofbirth').value;
	if (date!="") 
	{
		if (date.split("-")) 
		{
			var datesplit=date.split("-");
			var date1=parseInt(datesplit[0]);
			if (date1>=1972 && date1<=2016) 
			{
				document.getElementById('dateofbirthmsg').innerHTML="";
				return true;
			}
		}
		
	}
	else
	{
		document.getElementById('dateofbirthmsg').innerHTML="Date of Birth year 1972 to 2016";
		return false;
	}
}

function validate()
{
	
	if(validatename() && document.getElementById('usernamemsg').innerHTML=="" && validateemail() && validategender() && validatepassword() && validatedate())
	{
		return true;	
	}
	return false;
	
}
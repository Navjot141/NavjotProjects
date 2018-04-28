// JavaScript Document
// JavaScript Document
var regname=/^[A-Z,a-z]+$/
function val()
{
	if( valfname() && vallname() && valemail() && valmobile() && valaddress()&& valpostcode()&& valpwd())
	{
		return true;
	}
	else
	{
		 return false;
	}
}
function valfname()
{
	var fname=document.getElementById('fname');
	if( fname.value=="")
	{
		document.getElementById('msg1').innerHTML='Please enter first name';
	  fname.style.borderColor = "red";
		return false;
	}
	
	else if(!fname.value.match(regname))
	{
		document.getElementById('msg1').innerHTML='Name format not correct';
	    fname.style.borderColor = "red";
		return false;
	}
	else
	{
		document.getElementById('msg1').innerHTML='';
		fname.style.borderColor ="";
		return true;
		
		
	}
	
}
function vallname()
{
	var fname=document.getElementById('lname');
	if( lname.value=="")
	{
		document.getElementById('msg2').innerHTML='Please enter last name';
		lname.style.borderColor = "red";
		return false;
	}
	else if(!fname.value.match(regname))
	{
		document.getElementById('msg2').innerHTML='Name format not correct';
		fname.style.borderColor = "red";
		return false;
	}
	else
	{
		document.getElementById('msg2').innerHTML='';
		lname.style.borderColor ="";

		return true;
		
		
	}
	
}

function valemail()
{
	var email=document.getElementById('email');
	var emailreg=/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i
	if( email.value=="")
	{
		document.getElementById('emailmsg').innerHTML='Please enter email id';
		email.style.borderColor = "red";
		return false;
	}
	else if(!email.value.match(emailreg))
	{
		document.getElementById('emailmsg').innerHTML='Email id format not correct';
		email.style.borderColor = "red";
		return false;
	}
	else
	{
		document.getElementById('emailmsg').innerHTML='';
		email.style.borderColor ="";
		return true;
		
		
	}
	
}
function valmobile()
{
var t= document.getElementById('t1');
	var regname=/^[6-9][0-9]+$/;
	var msg4= document.getElementById('msg4');

	
	if(t.value=="")
	{
		document.getElementById('msg4').innerHTML='Please enter telephone no';
		t.style.borderColor = "red";
		//alert('fill ph number');
	//msg9.innerHTML='FILL Number';
		return false;
	}
	else if(t.value.length!=10||!t.value.match(regname))
	{
		
		document.getElementById('msg4').innerHTML='invalid telephone number';
		t.style.borderColor = "red";
		//msg9.innerHTML='invalid phone number';
		
		return  false;
	}
	else if(t.value!='' && t.value.match(regname))
	{
		
		document.getElementById('msg4').innerHTML='';
		t.style.borderColor ="";
	   
	//msg9.innerHTML='';	
	 return true;
	}
}
function valaddress()
{
	var add=document.getElementById('address');
	if( add.value=="")
	{
		document.getElementById('addmsg').innerHTML='Please enter address';
		add.style.borderColor = "red";
		return false;
	}
	else
	{
		document.getElementById('addmsg').innerHTML='';
		add.style.borderColor ="";
		return true;
		
	}
}
function valcity()
{
	var city1=document.getElementById('city');
	if( city1.value=="")
	{
		document.getElementById('citymsg').innerHTML='Please enter city';
		city1.style.borderColor = "red";
		return false;
	}
	else
	{
		document.getElementById('citymsg').innerHTML='';
		city1.style.borderColor ="";
		return true;
		
	}
}
function valpostcode()
{
	var pc=document.getElementById('post');
	if( pc.value=="")
	{
		document.getElementById('pcmsg').innerHTML='Please enter postcode';
	    pc.style.borderColor = "red";
		return false;
	}
	else
	{
		document.getElementById('pcmsg').innerHTML='';
		pc.style.borderColor ="";
		return true;
		
	}
}


function valpwd()
{
	var pwd=document.getElementById('pwd');
	if( pwd.value=="")
	{
		document.getElementById('pwdmsg').innerHTML='Please enter password';
		return false;
	}
	else
	{
		document.getElementById('pwdmsg').innerHTML='';
		pwd.style.borderColor ="";
		return true;
		
	}
}
function valcpwd()
{   
var pwd=document.getElementById('pwd').value;
	var cpwd=document.getElementById('cpwd').value;
	var sp=document.getElementById('sp');
	var l=pwd.length;
	var rl=cpwd.length;
	var tr=pwd.substr(0,rl);
	if(tr==cpwd)
	{
		if(rl==l)
		{ 
		sp.innerHTML='full password match';
		}
		else 
		{
			sp.innerHTML=rl+'characters match';
		}
	}
		else
		{
			sp.innerHTML=rl+'characters  not match';
		}
	}

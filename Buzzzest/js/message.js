// JavaScript Document

$(document).ready(function() {
   window.scrollTo(0,0);
   $('#outbox').hide();	
   $('#createmsg').hide();
   $('#trash').hide();
   $("#outbox").css("display","none");
   $("#createmsg").css("display","none");
   $("#trash").css("display","none");
   $('#inbox').load('inboxmsg.php'); 
 });

function fnchangedivmsg(stringval)
{
	window.scrollTo(0,0);
   $('#outbox').hide();	
   $('#inbox').hide();	
   $('#createmsg').hide();
   $('#trash').hide();
   $('#inbox').css("display","none");
   $("#outbox").css("display","none");
   $("#createmsg").css("display","none");
   $("#trash").css("display","none");
        
	if (stringval == "inbox")
	{     	 
	   $("#inbox").load("./inboxmsg.php");	   
	}
	
	if (stringval == "outbox")
	{
		 $("#outbox").css("display","block");
		$('#outbox').load('./outboxmsg.php');
	}
	
	if (stringval == "createmsg")
	{
		 $("#createmsg").css("display","block");
		$('#createmsg').load('./createmsg.php');
	}
	
	if (stringval == "trash")
	{     	 
	   $("#trash").css("display","block");
	   $("#trash").load("./trashmsg.php");	   
	}
	
	
    $('#'+stringval).css("display","block");
	
}


function displayResult()
{
	var len= document.getElementById("mySelect").length;
	var sel = document.getElementById("mySelect");
	var i;
	if (document.getElementById("chlselfrnd").checked == true)
	{		
		for (i=0;i<len;i++)
		{
			if(sel.options[i].value !=0 )
			{
			  sel.options[i].selected = true;
			}
		}			
	}
	else
	{		
		for (i=0;i<len;i++)
		{
			 sel.options[i].selected = false;
		}
	}
}

function fnsavemsg()
{
	var msg=jQuery.trim($('#txtmsg').val());
	var sel = document.getElementById("mySelect");
	var len= document.getElementById("mySelect").length;		
	var Selfrndval = "";
	var i = 0;
	//alert (msg);
	
	if (msg != "" || msg.match(/(\w+\s)*\w+[.?!]/) )
	{
		for (i=0;i<len;i++)
		{
			if (sel.options[i].selected == true )
			{
				if(sel.options[i].value !=0 )
				{            
				   Selfrndval = Selfrndval + sel.options[i].value + ",";
				}
			}
         }
     
	 	url='sendmsg.php';
		data=new Object();
		data['txtmsg']=$('#txtmsg').val();
		data['Selfrndval']=Selfrndval;
		$.ajax({
		  type: 'POST', // type of request either Get or Post
		  url: url, // Url of the page where to post data and receive response 
		  data: data, // data to be post
		  success: function(data){ 
			 alert (data);
		 	 $('#createmsg').load('./createmsg.php');
		  } //function to be called on successful reply from server
		}); 	 
	}	  
}


function clearmsg()
{
	 $('#createmsg').load('./createmsg.php');
}
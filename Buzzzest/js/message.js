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
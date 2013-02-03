// JavaScript Document
$(document).ready(function() {
   
   $('#list').hide("");
   $("#list").css("display","none");
   
    //$('#frndinfo').hide();	
   	 $('#frndupdates').hide();	
   	 $('#frndlist').hide();
   
   $('#friends').hide("");
   $("#friends").css("display","none");
   
   $('#following').hide("");
   $('#following').css("display","none"); 
   $('#content_post_home').load("user_home_post.php");  
   
});
 
function fnchangehomediv(stringval) 
{
   $('#list').hide();	
   $('#friends').hide();	
   $('#following').hide();
   $('#content_post_home').hide();
   $("#friends").hide();
   $("frndlist").hide();
   $("#content_post_home").css("display","none");
   $("#list").css("display","none");
   $("#friends").css("display","none");
   $("frndlist").css("display","none");
   $("#following").css("display","none"); 
   
   if ( stringval == "friends" )
   {
	   $("#friends").css("display","block");
	   $("#frndlist").css("display","block");
   }
   
   if ( stringval == "list" )
   {
	    $("#list").css("display","block");
		$("#list").load("user_friendlist.php");
   }
   $('#'+stringval).css("display","block");	
}

function fnsendFriendRequest()
{
	var post_value=jQuery.trim($('#country').val());
	if (post_value != "" )
	{
		url='send_friendrequest.php';
		data=new Object();
		data['user_name']=post_value;
		$.ajax({
		  type: 'POST', // type of request either Get or Post
		  url: url, // Url of the page where to post data and receive response 
		  data: data, // data to be post
		  success: function(data){ 
			 alert (data);
		 	 //$('#content_userpost').load('user_profile_post.php');	
		  } //function to be called on successful reply from server
		});
	}
}

function fnchangefrnddiv(strfrnval)
{
	 $('#frndinfo').hide();	
   	 $('#frndupdates').hide();	
   	 $('#frndlist').hide();
	 
   	 $("#frndlist").css("display","none");
   	 $("#frndupdates").css("display","none");
   	 $("#frndinfo").css("display","none");
	 
	 
	 
	 $('#'+strfrnval).css("display","block");	
   
}
$(document).ready(function()
{
	$("#notification_li").click(function(){
	$("#notificationContainer").fadeToggle(300);
	$("#notification_count").fadeOut("slow");
	return false;
});

	$("#notification_li_f").click(function(){
	$("#friends_requestContainer").fadeToggle(300);
	$("#notification_count_p").fadeOut("slow");
	return false;
});

$(document).click(function()
{ 
	$("#notificationContainer").hide();
	$("#friends_requestContainer").hide();
});

$("#seen_req").click(function()
{
		$.get('updates/Update_Friend_Request_Seen',function(result)
	    {
	    	        
	    });
});
$("#seen_notif").click(function()
{
	
		$.get('updates/Update_Notifications_Seen',function(result)
	    {
	        
	    });
});



});
function Update_Friend(event,status)
{
	var id = $(event.target).attr('title');
	if(status == 1)
	{
		$.get("updates/Update_Friend_Request_Acepted/" + id,function(response)
		{
           
		});
   }
   else
   {
	   	 $.get("updates/Update_Friend_Request_Ignored/" + id,function(response)
		{
		                
		});
   }
	$(event.target).closest('.Notif_Item').remove();
}
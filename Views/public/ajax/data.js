 function Check_Existing_Mail(event)
 {
 	      event.preventDefault();
        var url = $(event.target).attr('action');
        $.ajax({
           type: "POST",
           url: url,
           data:$(event.target).serialize(),
           success: function(data)
           {
               if(data.trim() == "succes")
               {
                 window.location.href="start/index";
               }
               else
               {
               	  $('#error_inregistrare').show();
                  $('#errors').html(data.trim());

               }
           },
           error: function(jqXHR, textStatus, errorThrown)
           {
           	 
           }
         });
         return false; 
 }
  function Check_Finalizing_Data(event)
 {
 	   event.preventDefault();
       var url = $(event.target).attr('action');
        $.ajax({
           type: "POST",
           url: url,
           data:$(event.target).serialize(),
           success: function(data)
           {
               if(data.trim() == "succes")
               {
                 window.location.href="../login/index";
               }
               else
               {
                  $('#error_inregistrare').show();
                  $('#errors').html(data.trim());

               }
           },
           error: function(jqXHR, textStatus, errorThrown)
           {
           	 
           }
         });

    return false; 
 }
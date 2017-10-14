function Set_Admin(index) 
{
   var user = JSON.parse(localStorage['useri'])[index];
   var id = user.ID_User;
   var url = 'admin/SetAdmin/' + id;
   $.get(url,function(result)
   {
       alert("Userul " + user.Nume + " " + user.Prenume + " a fost setat admin cu succes");
       $('#Wrap_Users li.current:nth-child('+ (index +1) + ')').remove();  
   });
}

function Block_User(index)
{
   var user = JSON.parse(localStorage['useri'])[index];
   var id = user.ID_User;
   var url = 'admin/BlockUser/' + id;
   $.get(url,function(result)
   {
       alert("Userul " + user.Nume + " " + user.Prenume + " a fost setat blocat cu succes");
       location.reload(); 
   });
}
function UnBlock_User(index)
{
   var user = JSON.parse(localStorage['useri'])[index];
   var id = user.ID_User;
   var url = 'admin/UnBlockUser/' + id;
   $.get(url,function(result)
   {
       alert("Userul " + user.Nume + " " + user.Prenume + " a fost deblocat cu succes");
       location.reload(); 

   });
}
function Display_Info(index) 
{
  var user = JSON.parse(localStorage['useri'])[index];
  $('#Nume').html(user.Nume);
  $('#Prenume').html(user.Prenume);
  $('#Email').html(user.Email);
  if(user.blocat == 0)
  {
      $('#priv').html('Cont Activ');
  }
  else
  {
     $('#priv').html('Cont Blocat');
  }
  
}
function DeleteMsg(id)
{
  var url = 'admin/DeleteMessage/' + id;
  $.get(url,function(result)
   {
       location.reload(); 

   });
}
function GetMessage(index)
{
   var user = JSON.parse(localStorage['useri'])[index];
   var id = user.ID_User;
   var url = 'admin/GetMessageSend/' + id;
   $.get(url,function(result)
   {
      localStorage["mesaje"] = result;
   	  result = JSON.parse(result);
      $('#Wrap_Msgs').empty();
   	  for (var i = 0; i < result.length; i++) 
   	  {
   	  	 var _html = '<div class="item_msg"><img onclick = "DeleteMsg(' + result[i].ID + ')" class="image_small" title="Sterge Mesaj" src="Views/public/images/delete.png">' +
                   '<div class="Title ShadowTitle Medium _left">'+
                    '<span id = "msg">' + result[i].Message + '</span>' +
                    '</div></div>' ;
           $('#Wrap_Msgs').append(_html);
   	  };

   });
}
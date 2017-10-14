function Load()
{
  $('nav.Vertical ul li').click(function()
      {
          $('nav.Vertical ul li .active').removeClass('active'); 
          $(this).addClass('active'); 
      });
}
 function split( val ) {
     return val.split( /,\s*/ );
}
function extractLast( term ) {
     return split( term ).pop();
}

function poll_Timeline(level,id)
{
    var url = 'user/GetTimeLine/'+id;
    if(level == 3)
    {
      url = '../user/GetTimeLine/' +id;
    }
    if(level == 4)
    {
      url = '../../user/GetTimeLine/' +id;
    }
    setTimeout(function() {
              $.ajax({
                  url: url,
                  success: function(data)
                   {      
                   
                      $("#updates").empty(); 
                      var timeline = JSON.parse(data);
                      for (var i = 0; i <timeline.length; i++) {
                           WritePost(timeline[i]);
                      };
                 }, 
                 dataType: "text", 
                 complete: poll_Timeline(level,id)
              });
        }, 4000);
}
function poll_Friends(level)
{
      var url = null;
      if(level == 2)
      {
        url = "friends/UpdateFriends/"; 
      }
      if(level == 3)
      {
       url = "../friends/UpdateFriends/";
      }
      if(level == 4)
      {
        url = "../../friends/UpdateFriends/";
      }
      if($('#search_user_bar').attr('title') != "")
      {
        url += $('#search_user_bar').attr('title');
      }
      else
      {
        url+="null";
      }
      setTimeout(function() {
              $.ajax({
                  url: url, 
                  success: function(data){

                     var _dataFriends = JSON.parse(data);
                      $('.RightPage').find('#HeadPrieteni').next().empty();
                      for (var i =0;i<_dataFriends.length;i++) {
                           var label  =  _dataFriends[i].Nume + " " + _dataFriends[i].Prenume;
                           var status =  _dataFriends[i].Status;
                           var image  =  _dataFriends[i].Photo_Profil;
                           var ID     =  _dataFriends[i].ID;
                           if(status == 1)
                               status="On"
                             else
                               status = _dataFriends[i].last_access;
                          var html = '<li id="ListItemFriend" onclick="Add_New_Window(\'' + label + '\',\'' + label + '\',' + ID + ',\''+ image + '\');return false;">\
                                    <a href="#" id ="LinkFriend" ></a>\
                                    <input type="hidden" value="' + ID + '"/>\
                                    <div class="ImageFriend">\
                                         <img src = "'+ image + '">\
                                      </div>\
                                      <div id="NameFriend">\
                                           ' + label + '\
                                      </div>\
                                      <div id="StatusFriend">\
                                          ' + status +'\
                                      </div>\
                                    </a>\
                                </li>';
                          $('.RightPage').find('#HeadPrieteni').next().append(html);
                          if(status == "On")
                          {
                             $('.RightPage').find('.users').find('li').last().find('#StatusFriend').addClass('green_col');
                             $('.RightPage').find('.users').find('li').last().find('#StatusFriend').removeClass('time_col');
                          }
                          if(status != "On")
                          {
                             $('.RightPage').find('.users').find('li').last().find('#StatusFriend').addClass('time_col');
                            $('.RightPage').find('.users').find('li').last().find('#StatusFriend').removeClass('green_col');
                          }
                      };
                 },
                 dataType: "text", 
                 complete: poll_Friends(level)
              });
              }, 1000);
}

function poll_Conference(level)
{
  
}
function poll_Notification(level)
{
      var url=null;
      if(level == 2)
      {
        url = "updates/GetNotification"; 
      }
      if(level == 3)
      {
       url = "../updates/GetNotification";
      }
      if(level == 4)
      {
        url = "../../updates/GetNotification";
      }
     setTimeout(function() {
              $.ajax({
                  url: url, 
                  success: function(data)
                   {
                      var _FriendsRequests = JSON.parse(data)[0];
                      var old = parseInt($("#notification_count_p").html().trim());
                      if(old ==  _FriendsRequests.length)
                           return;
                      if(_FriendsRequests.length > 0 )
                        { 
                              for (var i = 0; i < _FriendsRequests.length; i++) {
                                  var _html  = '<li class="Notif_Item"> \
                                                <div class="friends_add"> \
                                                    <input type="button" class="button _right" value="Adauga" title="' + _FriendsRequests[i].User1 + '" onclick="Update_Friend.call(this,event,1)"/>\
                                                    <input type="button" class="button _right" value="Ignora"  title="' + _FriendsRequests[i].User1 + '" onclick="Update_Friend.call(this,event,0)"/>\
                                                </div>\
                                                <div class="Friend_Title">' + _FriendsRequests[i].Nume + " " + _FriendsRequests[i].Prenume + '</div>\
                                                 <div class="notif_image">\
                                                    <img src = "../public/images/hiji.jpg">\
                                                 </div>\
                                          </li>';
                              }
                              if($("#notification_count_p").html().trim() == "")
                                   $("#notification_count_p").html(parseInt(_FriendsRequests.length));
                              else
                              {
                                var res = parseInt($("#notification_count_p").html().trim());
                                $("#notification_count_p").html(res);
                              }
                              $("#notification_count_p").show(); 
                              $("#notificationsBody ul").prepend(_html);
                        }
                        var _Notif = JSON.parse(data)[1];
                        var old2 = parseInt($("#notification_count").html().trim());
                        if(old2 == _Notif.length)
                              return;
                         if(_Notif.length > 0)
                         {
                           for (var i = 0; i < _Notif.length; i++) {
                                var _html ='<a href="#">\
                                    <li class="Notif_Item">\
                                        <div class="notif_text">\
                                          <div>\
                                              <p>' + _Notif[i].Text  +'</p>\
                                           </div>\
                                           <div class="notif_time">' + _Notif[i].Data + '</div>\
                                       </div>\
                                       <div class="notif_image">\
                                          <img src = "' + _Notif[i].Imagine + '">\
                                       </div>\
                                    </li></a>';
                              if($("#notification_count").html().trim() == "")
                                   $("#notification_count").html(parseInt(_Notif.length));
                              else
                              {
                                var res = parseInt($("#notification_count").html().trim());
                                $("#notification_count").html(res);
                              }
                              $("#notification_count").show(); 
                              $('#notificationsBody_2 ul').prepend(_html);
                           };
                         }
                   }, 
                   error:function(msg)
                   {
                     
                   },
                   dataType: "text", 
                   complete: poll_Notification(level) 
              });
              }, 2000);
}
function fetch_Data(directory,directoryAnt)
{
   if(directory === 'home')
   {
      $.get('home/getInitialData',function(result)
       {
                localStorage["database"] = result;
                var _dataUser = JSON.parse(result);
                $("#TopAvatar").find("img").attr("src",_dataUser[0].Photo_Profil);
                $("#TopAvatar").find("h2").html(_dataUser[0].Nume + ' ' +  _dataUser[0].Prenume);
                for (var i = _dataUser.length - 1; i >= 1; i--) 
                {
                    $('.groups_item').append('<a class="group_item" href = "#"> <li>' + _dataUser[i].Nume + '</li></a>');
                }
                poll_Timeline(2,_dataUser[0].ID);
        }); 
      $.get('admin/CheckAdmin',function(result)
     {
          if(result.trim() == "true")
          {
              $('#link_admin').show();
          }
     });
      $.get('updates/GetOnLoadNotification',function(data)
      {
                     _FriendsRequests = JSON.parse(data);         
                      for (var i = 0; i < _FriendsRequests.length; i++) {
                          var _html  = '<li class="Notif_Item"> \
                                        <div class="friends_add"> \
                                            <input type="button" class="button _right"  title="' + _FriendsRequests[i].User1 + '" value="Adauga" onclick="Update_Friend.call(this,event,1)"/>\
                                            <input type="button" class="button _right"  title="' + _FriendsRequests[i].User1 + '" value="Ignora" onclick="Update_Friend.call(this,event,0)"/>\
                                        </div>\
                                        <div class="Friend_Title">' + _FriendsRequests[i].Nume.trim() + "  " + _FriendsRequests[i].Prenume.trim() + '</div>\
                                         <div class="notif_image">\
                                            <img src = "' +  _FriendsRequests[i].Photo_Profil  + '">\
                                         </div>\
                                  </li>';
                      };
                      $("#notificationsBody ul").append(_html);
    });
   }
   if(directoryAnt == "Advanced_Search")
   {
        var _dataUser  = JSON.parse(localStorage['database']);
        $("#TopAvatar").find("img").attr("src",_dataUser[0].Photo_Profil);
        $("#TopAvatar").find("h2").html(_dataUser[0].Nume + ' ' +  _dataUser[0].Prenume);
        for (var i = _dataUser.length - 1; i >= 1; i--) 
        {
          $('.groups_item').append('<a class="group_item" href = "#"> <li>' + _dataUser[i].Nume + '</li></a>');
        }
   }
   if(directory == 'User' || directoryAnt == 'User'
    ||  directory == "UserAbout" || directoryAnt=="UserAbout"
    || directory == "UserPhotos" || directoryAnt == "UserPhotos")
   {
       var id = $("#CenterPage").attr('title');
       var url = 'user/GetFullInfo/' + id;
       if(localStorage['level'] == 3)
       {
          url = '../user/GetFullInfo/' + id;
       }
       else
       {
           url = '../../user/GetFullInfo/' + id;
       }
       poll_Timeline(4,id);
       $.get(url,function(result)
       {
           var  _dataUser = JSON.parse(result)[0];
           $("#src_avatar_2").attr("src",_dataUser.Photo_Profil);
            $("#TitluUser").html(_dataUser.Nume + ' ' +  _dataUser.Prenume);

            if(_dataUser.Oras != null && _dataUser.Tara != null )
            {
               $("#locatie").html("Traieste in : " + _dataUser.Oras + "," + _dataUser.Tara);
            }
            else if(_dataUser.Oras !=null)
            {
                $("#locatie").html("Traieste in : " + _dataUser.Oras);
            }
            else if(_dataUser.Tara !=null)
            {
              $("#locatie").html("Traieste in : " + _dataUser.Tara);
            }
            else
            {
              $("#locatie").html("Nu sunt informatii de afisat despre locatie");
            }
            if(_dataUser.Data_Nasterii != null)
            {
               $("#data_birth").html("Nascuta pe " + _dataUser.Data_Nasterii);
            }
            else
            {

            $("#locatie").html("Nu sunt informatii de afisat despre data nasterii");
            }
            if(_dataUser.relatie != null)
            {
               $("#relatie").html("Nascuta pe: " + _dataUser.relatie);
            }
            else
            {
               $("#relatie").html("Nu sunt informatii de afisat despre relatie");
            }
            if(_dataUser.Status_Prietenie == 2)
            {
              $('#Status_Prietenie').find('pre').html('Adauga Prieten');
            }
            else if(_dataUser.Status_Prietenie == 1)
            {
              $('#Status_Prietenie').find('pre').html('Prieteni');
            }
            else
            {
              $('#Status_Prietenie').find('pre').html('Cerere Trimisa');
            }
        });
   }
   if(directory == "message")
   {
    var url = '../message/GetUsersMessages';
     $.get(url,function(result)
       {

           $('#ListHistory').empty();
           result = JSON.parse(result);
           var lastID = result[result.length -1].id_user;
           var url2 = '../message/GetHistory/' + lastID;
           $('#_title').html(result[result.length -1].Nume + " " + result[result.length -1].Prenume);
           $('#_title').attr('title',result[result.length -1].id_user);
           for (var i = 0; i < result.length; i++) {

               var _html ='<div class="ListItem" id=' + result[i].id_user +'>\
                <a href="#" onclick = "ChangeMsg.call(this,event,' +  result[i].id_user + ',\'' + result[i].Nume  + '\',\'' + result[i].Prenume +'\');"> \
                                 <div class="ImageFriend"> \
                                     <img src="' + result[i].Photo_Profil + '"> \
                                 </div> \
                                 <div class="Preview"> \
                                        <span id="name">' + result[i].Nume + " " + result[i].Prenume +'</span><br \> \
                                        <span id="preview">' + result[i].Message +'</span> \ \
                                 </div> \
                                 </a> \
                      </div>'; 
                $('#ListHistory').prepend(_html);      
           };
           $('.ListItem').first().addClass('active')
           $.get(url2,function(result2){
                 var container = $('#MessageWrapper');
                 var  result = JSON.parse(result2);
                  var infoUser=JSON.parse(localStorage["database"])[0];
                  localStorage['id_s'] = result[0].id_user;
                 for (var i = 0; i < result.length; i++) {
                       if(result[i].Mesaj == 'null')
                        {
                          result[i].Mesaj = "";
                        }
                         if(result[i].Media == 'null')
                        {
                          result[i].Media = "";
                        }
                      if(result[i].Sender == infoUser.ID)
                      {
                          var _html = '<div class="MsgSend">\
                                       <div class="TitleMsg">' + infoUser.Nume + " " + infoUser.Prenume + '</div> \
                                      <div id="contMsg">' + 
                                           result[i].Mesaj + 
                                      '</div><form class="inline" action = "DownloadFile/'+ result[i].Media + '"><a href = "#" onclick = "$(this).parent().submit()" title="Download Atasament"><div class="atach">' + result[i].Media + '</div></a></form>\
                                     </div>';
                            container.append(_html);
                      }
                      else
                      {
                          var _html = ' <div class="MsgGet">\
                                            <div class="TitleMsg">' +
                                              $('#_title').html().trim() + 
                                          '</div>\
                                          <div id="contMsg">' +
                                              result[i].Mesaj +
                                         '</div><form class="inline" action = "DownloadFile/'+ result[i].Media + '"><a href = "#" onclick = "$(this).parent().submit()" title="Download Atasament"><div class="atach">' + result[i].Media + '</div></a></form>\
                                         </div>';
                          container.append(_html);
                      }
                 };
                 var _HTML = '<input class="Search3 TextInput center Margin_B" type="text" placeholder = "Cauta Useri "/>\
                     <div class="ListItem Title Big " id="idconf">\
                            <form class="inline" action="../conferinta/index">\
                              <a href="#" onclick="$(this).parent().submit()">Incepeti o conferinta </a>\
                            </form>\
                       </div>';
                 $("#ListHistory").append(_HTML);
                 $("#MessageWrapper").animate({ scrollTop: $('#MessageWrapper')[0].scrollHeight}, 1000);

           });
       });
   }
   if(directory == "IndexEdit" || directoryAnt == "UserAbout" || directory == "StudiiEdit" || directory == "InfoEdit" || directory == "UserPhotos" || directory == "RelatiiEdit")
   {
    var id = $("#CenterPage").attr('title');
      var url = '../edit/GetInfo';
      if(localStorage["level"] == 4)
      {
        url = "../../edit/GetInfoFromID/" +id;
      }
      $.get(url,function(result)
      {
      
          localStorage['fullInfo'] = result;
          result = JSON.parse(result);
          if(result.Telefon !=null)
          {
            $('#Phone_Record').html(result.Telefon);
          }
          else
          {
             $('#Phone_Record').html('Nu sunt informatii de afisat');
          }
          $('#Mail_Record').html(result.Email);
          if(result.Data_Nasterii !=null)
          {
            $('#Data_Birth_Record').html(result.Data_Nasterii);
          }
          else
          {
             $('#Data_Birth_Record').html('Nu sunt informatii de afisat');
          }
          if(result.Oras != null && result.Tara != null)
          {  
              $('#Oras').html(result.Oras + ",");
              $('#Tara').html(result.Tara);
          }
          else if(result.Oras != null)
          {
              $('#Oras').html(result.Oras);
          }
          else if(result.Tara != null)
          {
             $('#Tara').html(result.Tara);
          }
          else
          {
             $('#Oras').html("Nu sunt informatii de afisat despre locatie");
             $('#pre').hide();
          }
          if(result.Liceu != null && result.Facultate != null)
          {  
              $('#Liceu').html(result.Liceu + ",");
              $('#Facultate').html(result.Facultate);
          }
          else if(result.Liceu != null)
          {
              $('#Liceu').html(result.Liceu);
          }
          else if(result.Facultate != null)
          {
             $('#Facultate').html(result.Facultate);
          }
          else
          {
             $('#Liceu').html("Nu sunt informatii de afisat despre studii");
             $('#pr').hide();
          }

      });
         var url2 ='../edit/GetFriends';
          if(localStorage["level"] == 4)
          {
            url2 = "../../edit/GetFriendsByID/" + id ;
          }
          $.get(url2,function(result)
         {
             result = JSON.parse(result); 
             var i=0;
 
             for (i = 0; i < result.length; i++) {
                   if(i%3 == 0)
                   {
                     $('#photo_wrapper').append('<div class="Line">');
                   }
                    if(i%3 == 2)
                    {
                      var _html ='<div class="Box_Auto image_Big Bordered" id="photo_right"> \
                          <div class="Title SmallText center">' + result[i].Nume +' ' + result[i].Prenume + '</div>  \
                           <img class="center image_friend" src="' + result[i].Photo_Profil + '"/> \
                          </div>';
                      $('#photo_wrapper').find('.Line').last().append(_html);
                      $('#photo_wrapper').append('</div>>');
                    }
                    else
                    {
                      var _html ='<div class="Box_Auto image_Big Bordered" id="photo_right"> \
                          <div class="Title SmallText center">' + result[i].Nume +' ' + result[i].Prenume + '</div>  \
                           <img class="center image_friend" src="' + result[i].Photo_Profil + '"/> \
                          </div>';
                       $('#photo_wrapper').find('.Line').last().append(_html);
                    }
             };
             if(i%3 !=2)
             {
                $('#photo_wrapper').append('</div>>');
             }
         });

   }
   if(directory == "StudiiEdit")
   {
       result = JSON.parse(localStorage['fullInfo']);

          if(result.Liceu != null && result.Facultate != null)
          {  
              $('#Liceu').html(result.Liceu + ",");
              $('#Facultate').html(result.Facultate);
          }
          else if(result.Liceu != null)
          {
              $('#Liceu').html(result.Liceu);
          }
          else if(result.Facultate != null)
          {
             $('#Facultate').html(result.Facultate);
          }
          else
          {
             $('#Liceu').html("Nu sunt informatii de afisat despre Liceu");
             $('#Facultate').html("Nu sunt informatii de afisat despre Facultate");
             $('#pr').hide();
          }
   }
   if(directory == "InfoEdit")
   {
          result = JSON.parse(localStorage['fullInfo']);
          if(result.Telefon !=null)
          {
            $('#Phone_Record').html(result.Telefon);
          }
          else
          {
             $('#Phone_Record').html('Nu sunt informatii de afisat');
          }
          $('#Mail_Record').html(result.Email);
          if(result.Sex == 0)
          {
            $('#sex').html('Feminin');  
          }
          else
          {
              $('#sex').html('Masculin'); 
          }
           if(result.Oras != null && result.Tara != null)
          {  
              $('#oras').html(result.Oras + ",");
              $('#tara').html(result.Tara);
          }
          else if(result.Oras != null)
          {
              $('#oras').html(result.Oras);
          }
          else if(result.Tara != null)
          {
             $('#tara').html(result.Tara);
          }
          else
          {
             $('#Oras').html("Nu sunt informatii de afisat despre locatie");
          }
          if(result.Data_Nasterii != null)
          {
            $('#Ziua').html(result.Data_Nasterii);
          }
          else
          {
            $('#An').html('Nu sunt informatii despre data nasterii');
          }
   }
   if(directoryAnt == 'conferinta')
   {
     var id = $("#CenterPage").attr('title');
      var url = '../edit/GetInfo';
      if(localStorage["level"] == 4)
      {
        url = "../../edit/GetInfoFromID/" +id;
      }
      $.get(url,function(result)
      {
          result = JSON.parse(result);
          $('#owner').attr("src",result.Photo_Profil);
          $('#ListItem').attr("title",result.ID);
          $('#name').html(result.Nume + " " + result.Prenume);
           var url2 = "../Conferinta/OnCreateConference/" + result.ID + "/,";
      $.get(url2,function(result){
            $('#CenterPage').attr('title',result.trim());
      });
      });
     
   }
   if(directory == "UserPhotos" || directoryAnt == "UserPhotos")
   {
          var url2 ='../Photo/GetPhoto';
          if(localStorage["level"] == 4)
          {
            url2 = "../../Photo/GetPhoto/" + id ;
          }
          $.get(url2,function(result)
         {
             result = JSON.parse(result); 
             var i=0;
 
             for (i = 0; i < result.length; i++) {
                   if(i%3 == 0)
                   {
                     $('#photo_wrapper').append('<div class="Line">');
                   }
                    if(i%3 == 2)
                    {
                      var _html ='<div class="Box_Auto image_Big Bordered" id="photo_right"> \
                          <div class="Title SmallText center">' + result[i].Nume + '</div>  \
                           <img class="center image_friend" src="' + result[i].Path + '"/> \
                          </div>';
                      $('#photo_wrapper').find('.Line').last().append(_html);
                      $('#photo_wrapper').append('</div>>');
                    }
                    else
                    {
                      var _html ='<div class="Box_Auto image_Big Bordered" id="photo_right"> \
                          <div class="Title SmallText center">' + result[i].Nume + '</div>  \
                           <img class="center image_friend" src="' + result[i].Path + '"/> \
                          </div>';
                       $('#photo_wrapper').find('.Line').last().append(_html);
                    }
             };
             if(i%3 !=2)
             {
                $('#photo_wrapper').append('</div>>');
             }
         });
   }
   if(directory == "RelatiiEdit")
   {
     result = JSON.parse(localStorage['fullInfo']);
     if(result.Info_Relatie != null)
     {
       $('#Relatie_').html(result.Status_Relatie);
     }
     else
     {
        $('#Relatie_').html('Nu sunt informatii despre relatie');
     }
     for (var i = 0; i < result.Familie.length; i++) {
          /* var _html = '<span class="Title Medium">' + result.Familie[i].Nume_Membru + '<span id="rel">' + result.Familie[i].relatie + '</span></span><form class="hide hidden_family"><select id="soflow-color" class="_right Familie_Item" name="familie"><option>Frate</option>\
                                           <option>Sora</option>\
                                           <option>Mama </option>\
                                           <option>Tata</option>\
                                           <option>Nepot</option>\ 
                                           <option>Unchi</option> \
                                           <option>Bunic </option>\
                                           <option>Var</option>\
                                   </select>\
                                 </form>';
             $('#Wrapper_Relatie').append(_html);*/
     };
   }
   if(directory.trim() == "admin")
   {
      var result = JSON.parse(localStorage['database']);
      $('#img_avatar').attr('src',result[0].Photo_Profil);
      $('#title_avatar').html(result[0].Nume + " " + result[0].Prenume);
      var url = "admin/GetUsers";
      $.get(url,function(result2) {
           var data = JSON.parse(result2);
           localStorage['useri'] = result2;
           for (var i = 0; i < data.length; i++) {
            var _html;
               if(data[i].blocat == 0)
               {
                     _html='<li class="current"><a href="#" onclick="GetMessage(' + i +')"><span></span>' + data[i].Email.trim() + '<b> </b></a>' +
                               '<ul>' +
                                   '<li><a href="#" onclick="Set_Admin(' + i + ')">Seteaza Admin</a></li>' +
                                   '<li><a href="#" onclick="Block_User(' + i + ')">Blocheaza User</a></li>' +
                                   '<li><a href="#" onclick="Display_Info(' + i + ')">Detalii</a></li>' +
                              '</ul>' +
                          '</li>';
                          $('#Wrap_Users').append(_html);
                }
                else
                {
                     _html='<li class="current"><a href="#" onclick="GetMessage(' + i +')"><span></span>' + data[i].Email.trim() + '<b> </b></a>' +
                               '<ul>' +
                                   '<li><a href="#" onclick="UnBlock_User(' + i + ')">Deblocheaza User</a></li>' +
                                   '<li><a href="#" onclick="Display_Info(' + i + ')">Detalii</a></li>' +
                              '</ul>' +
                          '</li>';
                      $('#Wrap_Blocked').append(_html);
                }
                
           }
      });
   }
}
function AdaugaFotografie(event,id)
{
  var name = $(event.target).attr('name');
  var file_data = $(id).prop('files')[0];   
  var form_data = new FormData();                 
  form_data.append(name, file_data);                           
   $.ajax({
                url: 'home/UploadImage/' + name, 
                dataType: 'text', 
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                       
                type: 'post',
                success: function(php_script_response)
                {
                  if(php_script_response.trim() == "")
                      alert('Fotografie Adaugata cu succes');
                  else
                    alert('Fotografia a fost adaugata cu succes');
                    alert(php_script_response);
                }
      });     
    return false;
}
function PostFotografie(event,id)
{
  var name = $(event.target).attr('name');
  var file_data = $(id).prop('files')[0];   
  var form_data = new FormData();  
  var url = 'home/PostImage/' + name;
  if(localStorage['level'] == 3)
  {
     url = '../home/PostImage/' + name;
  }               
  form_data.append(name, file_data);                           
   $.ajax({
                url: url, 
                dataType: 'text', 
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                       
                type: 'post',
               success: function(php_script_response)
                {
                  alert('fisier uploadat cu succes:Apasati succes pentru a trimite.Scrieti eventual text aditional atasamentului');
                  $(event.target).attr('title',php_script_response);
                  $('#MsgDashBoard').attr('title',php_script_response);
                } 
      });     
    return false;
}

function getIndex(_url)
{
  if(_url == "index.html" || _url == "index_en.html")
    return 0;
  if(_url == "info.html" || _url == "info_en.html")
    return 1;
  if(_url == "relatii.html" || _url == "relatii_en.html")
    return 2;
  if(_url == "studii.html" ||  _url == "studii_en.html")
    return 3;
}
function SetActive() {
  var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
  var index = getIndex(pgurl);
  var _count = 0;
   $("nav ul a span").each(function()
   {
      if(index == _count)
           $(this).addClass("active");
       else
            $(this).removeClass("active");
        _count++;
     })
}

function Validate(_email,_password,level)
{
  var _email = document.getElementById(_email).value;
  var password = document.getElementById(_password).value;
  database = JSON.parse(localStorage["database"]);
  for (var i = 0; i < database.length; i++) {
      if(database[i].email == _email  && database[i].password == password)
      {
     
         localStorage["user_Logat"] = i;
          return true;
      }
    };
  if(level == 0)
      document.location.href = "index.html";
  if(level == 1)
      document.location.href = "../login_failed/index.html";
  return false;
}
function editNodeText(regex, input, helpId, helpMessage)
{  
if (!regex.test(input)) 
{

  if (helpId != null)
    while (helpId.firstChild)
    {

      helpId.removeChild(helpId.firstChild);
    }
    helpId.appendChild(document.createTextNode(helpMessage)); 
    return false;
}
else 
 {      

  if (helpId != null)
  {

    while (helpId.firstChild) 
    {
      helpId.removeChild(helpId.firstChild);
    }
    return true;
    }
  }
}
 function isUsernameValid(inputField, helpId) {      
     return editNodeText(/^[A-Za-z0-9\.\' \-]{5,30}$/,
     inputField.value, helpId, 'Va rugam introduceti un username valid de minim 8 caractere fara caractere speciale');
}
function isPasswordValid(inputField,helpId) {
   return editNodeText(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/,
     inputField.value, helpId, 'Va rugam introduceti o parola valida de minim 8 caractere ce contine cel putin o litera mare si cel putin un numar');
} 
function isNameValid(inputField,helpId) {
  return editNodeText(/^[A-Za-z]{2,15}/,inputField.value, 
  helpId, 'Va rugam introduceti un nume intre 2 si 15 litere');
}

function isEmailValid(inputField,helpId) {
   return editNodeText(/^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/,inputField.value,
   helpId,'Va rugam introduceti o adresa de email valida');
}

function isPhoneValid(inputField,helpId) {
  return editNodeText(/^[0-9]{10}$/, inputField.value, helpId,'Introduceti un numar de telefon de 10 cifre');
}

function Upload_Message(msg,media)
{
   if(media.trim() == "")
     media = null;
   if(msg.trim() == "")
         msg = null;
  var idRec = $('#_title').attr('title').trim();
  var infoUser=JSON.parse(localStorage["database"])[0];
  var Sender = infoUser.ID;
  var wsIp = "localhost";
  var wsPort = 2345;
  var url = "http://" + wsIp + ":" + wsPort + "/chat/postMessage/" + Sender + "/" + idRec;
  if(msg == null)
    msg = "";
  if(media == null)
    media = "";
  var _str = ' <div class="MsgSend"> \
                         <div class="TitleMsg">'  + infoUser.Nume +" " + infoUser.Prenume  +
                           '</div><form class="inline" action = "DownloadFile/'+ media + '"><a href = "#" onclick = "$(this).parent().submit()" title="Download Atasament"><div class="atach">' + media + '</div></a></form>\ \
                              <div id="contMsg">';
      _str += msg;
     _str  += '</div> </div>';
   $('#MessageWrapper').append(_str);
   $('#MsgDashBoard').val("");
    $.ajax({
        url:url,
        dataType: 'text',                       
        type: 'post',
        data : 
        {
          msg : msg,
          media : media
        },
        success: function(php_script_data)
        {
            $('#MessageWrapper').scrollTop($('#MessageWrapper')[0].scrollHeight);
        }
      });     
   return false;
}
function UploadPost(event) 
{         
        var x = event.type;
        if(event.keyCode == 13)
        {
          var id = localStorage["id_selectat"];
          var _MainContainer = $('.list_item_container');
          var infoUser=JSON.parse(localStorage["database"])[0];
          var totalCount=5;
          var num = Math.ceil( Math.random() * totalCount );
          $('#updates').prepend('<div class="Post"></div>');
          var _Item  =  $('.Post').first();
          var permission = $('#Posteaza').find('pre').html().trim();
          var _insertPerm=null;
          if(permission == "Doar eu")
          { 
            _insertPerm = 0;
          }
          if(permission == "Doar Prietenii")
          {
            _insertPerm = 1;
          }
          if(permission == "Intreaga Lume")
          {
             _insertPerm = 2;
          }
          var media = null;
          if($('#fileInput2').attr('title')!="")
          {
             var media = $('#fileInput2').attr('title');
          }
          var embed =null;
          if(media!=null)
          {
              media =  media.trim();
              embed  = '<iframe  src="http://localhost/Tema2/Views/public/images/resources/' + media +'"></iframe>';
            }
          else
          {
            media ="null";    
            embed  = '';
          }
        
          var url = null;
          if( localStorage["level"] == 2)
            url = 'updates/UploadPost/';
          if(localStorage["level"] == 3)
          {
            url = '../updates/UploadPost/';
          } 
           if(localStorage["level"] == 4)
          {
            url = '../../updates/UploadPost/';
          } 
          url += $("#post").val()+ "/" + media + "/";
          if(id != null)
              url +="-1/" + id;
          else
              url += _insertPerm;
          $.get(url,function(result){
              $(".Post").last().attr('title',result.trim());
          });
            jsondata  ='<div class="Post" title=""><span class="timeline_square color'+num+'"></span><div class="stimg"><img src="' +  infoUser.Photo_Profil+'" /></div>'
                       +'<div class="sttext"><span class="stdelete" title="Delete">X</span><b>'+infoUser.Nume+ " " +infoUser.Prenume +'</b><br/>'+$("#post").val() 
                       +'<div class="sttime">'+" chiar acum"+'</div><div class="stexpand">'+ embed + '</div></div></div>"';
           $("#post").val("");
           _Item.append(jsondata);
           _Item.append('<div class="List_Comments"> \
                           <div id="bor" class="p_Comment Bordered"> \
                                <div > \
                                    <img class="image_Small" src="' + infoUser.Photo_Profil +'"> \
                                </div> \
                               <textarea class="Comment" onKeyUp="UploadComment(event)" cols="42" rows="1" placeholder="Scrie un comentariu" autofocus></textarea> \
                  </div> \
            </div>');
        }
}
function UploadComment(event)
{

   if(event.keyCode == 13)
   {
      var infoUser=JSON.parse(localStorage["database"])[0];
      var _Comment  = $(event.target).val();
      var _Sender = $(event.target);
      $('<div class="p_Comment"><div ><img class="image_Small" src="'+  infoUser.Photo_Profil +'">' +
              '</div><div class="label">' +
              _Comment +
              '</div> </div>').insertBefore(_Sender.parent());
      var idPost = _Sender.closest('.List_Comments').prev().attr('title');
      var url ='updates/UploadComment/' +  idPost  + "/" + _Comment;
      if(localStorage["level"] == 3)
      {
        url = '../updates/UploadComment/' +  idPost  + "/" + _Comment;
      }
      if(localStorage["level"] == 4)
      {
        url = '../../updates/UploadComment/' +  idPost  + "/" + _Comment;
      }

      $.get(url ,function(result)
      {
         
      });

   }
}
function WritePost(infoUser)
{
     $('#updates').prepend('<div class="Post"></div>');
     var _Item  =  $('.Post').first();
      var totalCount=5;
      var embed  = '<iframe width=auto height=auto src="http://localhost/Tema2/Views/public/images/resources/' + infoUser.Media +'"></iframe>';
     if(infoUser.Media == "null")
     {
         embed = "";
     }
      var num = Math.ceil( Math.random() * totalCount );
     jsondata  ='<div class="Post" title=""><span class="timeline_square color'+num+'"></span><div class="stimg"><img src="' +  infoUser.Photo_Profil+'" /></div>'
                       +'<div class="sttext"><span class="stdelete" title="Delete">X</span><b>'+infoUser.Nume+ " " +infoUser.Prenume +'</b><br/>'+infoUser.Update_Text.trim()
                       +'<div class="sttime">'+ infoUser.Data_Postarii +'</div><div class="stexpand">' + embed + '</div></div></div>';
     _Item.append(jsondata);
     _Item.append('<div class="List_Comments"> \
                           <div id="bor" class="p_Comment Bordered"> \
                                <div > \
                                    <img class="image_Small" src="' + infoUser.Photo_Profil +'"> \
                                </div> \
                               <textarea class="Comment" onKeyUp="UploadComment(event)" cols="42" rows="1" placeholder="Scrie un comentariu" autofocus></textarea> \
                        </div> \
                      </div>');
     $(".Post").first().find('.Post').attr('title',infoUser.post);
     for (var i = 0; i < infoUser['Comentarii'].length; i++)
    {
      var image = infoUser['Comentarii'][i].Photo_Profil;
      var comentariu = infoUser['Comentarii'][i].Text;
       var time = infoUser['Comentarii'][i].Data_Comment;
      $('<div class="p_Comment"><div ><img class="image_Small" src="'+ image +'">' +
              '</div><div class="label">' +
              comentariu +
              '</div> <div class="sttime">' + time +  '</div>').insertBefore($("#bor"));
    }
}
function Change_History_Title(user,idUpdate)
{
   $('#_title').html(user);
   $(idUpdate).addClass('active');
}
function GetUpdates()
{
  $(".sttext").livequery(function ()
   { 
    $(this).linkify({
         target: "_blank"}); 
  });

  $.getJSON("info.json", function(data)
  {
      var totalCount=5;
      var jsondata='';
      $.each(data.Messages, function(i, M)
      {
          var num = Math.ceil( Math.random() * totalCount );
          jsondata +='<div class="Post"><span class="timeline_square color'+num+'"></span><div class="stimg"><img src="'+M.avatar+'" /></div>'
                       +'<div class="sttext"><span class="stdelete" title="Delete">X</span><b>'+M.user+'</b><br/>'+M.message
                       +'<div class="sttime">'+M.time+'</div><div class="stexpand">'+M.embed+'</div></div></div>';
          jsondata += '<div class="List_Comments"> \
                           <div id="bor" class="p_Comment Bordered"> \
                                <div class="image"> \
                                    <img src="../public/images/resources/Alberto_Carp.jpg"> \
                                </div> \
                               <textarea class="Comment" onKeyUp="UploadComment(event)" cols="42" rows="1" placeholder="Scrie un comentariu" autofocus></textarea> \
                        </div> \
                      </div>' ;
      });
      $(jsondata).appendTo("#updates");
  });

  $('body').on("click",".stdelete",function()
  {
      var A=$(this).parent().parent();
      A.addClass("effectHinge");
      A.delay(500).fadeOut("slow",function(){
      $(this).next().remove();
      $(this).remove();

      });
  });

}


 $(document).ready(function() 
 {

     $('<audio id="chatAudio"><source src="Views/public/audio/notify.ogg" type="audio/ogg"> ' + 
        '<source src="Views/public/audio/notify.mp3" type="audio/mpeg"><source src="Views/public/audio/notify.wav"' + 
        'type="audio/wav"></audio>').appendTo('body');
       var loc = window.location.pathname;
      var dir = loc.split('/');
      var directory = dir[dir.length-1];
      var directoryAnt = dir[dir.length-2];
      localStorage['level'] = dir.length-1;
      SetActive(directory);
      AutoComplete();
      fetch_Data(directory,directoryAnt);
      GetUpdates();
      poll_Friends(dir.length-1);
      poll_Notification(dir.length-1);
      $("#PageContent").niceScroll({ autohidemode: true });
      $("#CenterPage").niceScroll({ autohidemode: true });
      $(".RightPage").niceScroll({ autohidemode: true });
      $("#MessageWrapper").niceScroll({ autohidemode: true });
      $("div#history").niceScroll({ autohidemode: true });
      $("body").niceScroll({ autohidemode: true })
    
 });  

function UploadImage(event)
{
   var file_data = $('#i_file').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);   
    $.ajax({
                url: '../signup/UploadImage', 
                dataType: 'text', 
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response)
                {
                    alert(php_script_response);
                }
              });
  var tmppath = URL.createObjectURL(event.target.files[0]);
  $(event.target).closest("div").find('img').fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
}

function Upload_Post_Image(id)
{
    triggerClick(id);
}
function Redirect(page,sec)
{
  window.setTimeout(function(){
      window.location.href = page;
    },sec);
}



function UpdateAdauga()
{
  var status =  $('#Posteaza').find('pre').html();
  if(status.charAt(0) == 'P')
  {
     $('#Posteaza').find('pre').html('Adauga In Lista     ');
     $('#delete').find('li').find('span').html('Adauga in Lista');
  }
  else
  {
    $('#delete').find('li').find('span').html('Anuleaza Cererea   ');
    $('#Posteaza').find('pre').html('Cerere Trimisa    ');
  }
  Close_Where();
}
function UpdateFriends()
{
    var _dataUser = JSON.parse(localStorage["database"])[0];
    var id1 = _dataUser.ID;
    var id2 = localStorage['id_selectat'];
    if(localStorage['level'] == 4)
    {
      var url = "../../user/UpdateFriends/" + id1 + "/" + id2; 
    }
    if(localStorage['level'] == 3)
    {
       var url = "../user/UpdateFriends/" + id1 + "/" + id2; 
    }

     $('#Status_Prietenie').find('pre').html('Cerere Trimisa');
    $.get(url,function(result)
    {
       alert(result);
    });

}

function UpdateBlock()
{
   var status =  $('#Posteaza').find('pre').html();
   if(status.charAt(0) == 'B')
   {
     $('#Posteaza').find('pre').html('Adauga in Lista     ');
     $('#block').find('li').find('span').html('Blocheaza');
     $('#delete').find('li').find('span').html('Adauga in Lista');
   }
   else
   {
     $('#Posteaza').find('pre').html('Blocat    ');
     $('#block').find('li').find('span').html('Deblocheaza');
     $('#delete').find('li').find('span').html('Adauga in Lista');
   }
   Close_Where();
}
function triggerClick(id)
{
    $(id).click();
}
function Display_val(source,target) 
{
  var text = $(source).val();
  $(target).text(text);
}

function Del_Num(event)
{
   $(event.target).parent().next().remove();
   $(event.target).remove();
}

function AutoComplete() {

  var customRenderMenu = function(ul, items){
        var self = this;
        var category = null;
        $.each(items, function (index, item) {
            if (item.category != category) {
                category = item.category;
                ul.append("<li class='ui-autocomplete-group'>" + category + "</li>");
            }
            self._renderItemData(ul, item);
        });        
    };
    var customRenderItem =function (ul,item) {
       var inner_html = '<a><div class="list_item_container"><div id=' + item.id + '><img class="image_small_2" src="' +  item.image + 
        '" alt="some"></div><div class="label new">' +
        item.label + '</div><div class="description">' + "" + '</div></div></a>';
        return $( "<li></li>" )
            .data( "item.Autocomplete", item )
            .append(inner_html)
            .appendTo( ul );
    }
    var customRenderItem2 =function (ul,item) {
       var inner_html = '<a><div class="list_item_ontainer"><div><img class="image_small_2" src="' + item.image + 
        '"  alt="some"></div><div class="label new">' +
        item.label + '</div><div class="description">' + "" + '</div></div></a>';
        return $( "<li></li>" )
            .data( "item.Autocomplete", item )
            .append(inner_html)
            .appendTo( ul );
          }
          var url = "home/GetPeopleGroups" ; 
   
          if(localStorage["level"] == 3)
          {
             url = "../home/GetPeopleGroups";
          }
          if(localStorage["level"] == 4)
          {
             url = "../../home/GetPeopleGroups";
          }

          var data = null;
          $.ajax({
                url: url,
                dataType: "json",
                success: function(response)
                {
                     data = $(response).map(function(){
                      return {
                              value: this.Nume + " " + this.Prenume, 
                              id: this.ID,
                              nume : this.Nume,
                              prenume : this.Prenume,
                              image: this.Photo_Profil,
                              category : this.category
                              };
                    }).
                     get();
                    $(".Search").autocomplete({
                                    source:data,
                                    select: function(event, ui) {
                                            var id_selectat  = ui.item.id;
                                            localStorage['id_selectat'] = ui.item.id;
                                            var str = "user/User/";
                                            if(localStorage['level'] == 3)
                                            {
                                              str = "../user/User/";
                                            }
                                             if(localStorage['level'] == 4)
                                            {
                                              str = "../../user/User/";
                                            }
                                            $(this).closest('form').attr('action',str + id_selectat); 
                                            $('.Search').closest('form').submit();
                                        },
                                    create: function () {
                                          $(this).data('uiAutocomplete')._renderMenu = customRenderMenu;
                                          $(this).data('uiAutocomplete')._renderItem = customRenderItem;
                                  }
                         });
                          $(".Search2").autocomplete({
                                  source: data,
                                  create: function () {
                                      $(this).data('uiAutocomplete')._renderMenu = customRenderMenu;
                                      $(this).data('uiAutocomplete')._renderItem = customRenderItem2;
                                  },
                                  select :function(event,ui) {

                                         var res = ui.item.value.split(' ');
                                         var str ='<div class="ListItem" title=' + ui.item.id + '><div class="ImageFriend">\
                                                     <img src = "'+ui.item.image+'">\
                                                 </div> \
                                                 <div class="Preview"> \
                                                        <span class="Title" id="name">' + ui.item.value + '</span><br \>\
                                                 </div>\
                                          </div>';
                                           var persoane_conf = $("#name_conferinta").html();
                                           var array_persoane = persoane_conf.split(',');
                                           if($.inArray(ui.item.value,array_persoane) == -1)
                                           {
                                              $('#ListHistory').append(str);
                                              $("#name_conferinta").html ($("#name_conferinta").html() + "," + ui.item.value);
                                              $(this).val("");
                                              var idConf = $('#CenterPage').attr('title');
                                              var url = "../Conferinta/AddNewMember/" + ui.item.id  +  "/" + idConf;
                                              $.get(url,function(data){
                                                  
                                              });
                                          }
                                          else
                                          {
                                            alert("Persoana deja exista in conferinta");
                                          }
                                          return false;   
                                  }
                          }); 
                    if(localStorage['directory'] == "message")
                             alert(data);
            
                          $(".Search3").autocomplete({
                                  source: data,
                                  create: function () {
                                      $(this).data('uiAutocomplete')._renderMenu = customRenderMenu;
                                      $(this).data('uiAutocomplete')._renderItem = customRenderItem2;
                                  },
                                  select :function(event,ui) 
                                  {
                                  
                                         var res = ui.item.value.split(' ');
                                        var _html ='<div class="ListItem" id=' + ui.item.id +'>\
                                                  <a href="#" onclick = "ChangeMsg.call(this,event,' +  ui.item.id + ',\'' + ui.item.nume  + '\',\'' + ui.item.prenume +'\');"> \
                                                                   <div class="ImageFriend"> \
                                                                       <img src="' + ui.item.image + '"> \
                                                                   </div> \
                                                                   <div class="Preview"> \
                                                                          <span id="name">' + ui.item.nume + " " + ui.item.prenume +'</span><br \> \
                                                                          <span id="preview"></span>\
                                                                   </div> \
                                                                   </a> \
                                                        </div>'; 
                                          $('#ListHistory').prepend(_html);      
                                           var persoane_conf = $("#_title").html();
                                           var array_persoane = persoane_conf.split(',');

                                           if($.inArray(ui.item.value,array_persoane) == -1)
                                           {
                                              $('#ListHistory').prepend(str);
                                              $("#_title").html (ui.item.value);
                                              $(this).val("");
                                               $('#MessageWrapper').empty();

                                          }
                                          else
                                          {
                                            alert("Persoana deja exista in conferinta");
                                          }
                                     
                                          
                                  }
                          }); 
           }
      })
      $.ajax({
                url: url,
                dataType: "json",
                success: function(response){
                     var data = $(response).map(function(){
                      return { value: this.Nume + " " + this.Prenume,id: this.ID,image:this.Photo_Profil};
                }).get();
               $(".Search_Add_g").bind( "keydown", function( event ) 
               {
                   if ( event.keyCode === $.ui.keyCode.TAB &&
                     $( this ).autocomplete( "instance" ).menu.active ) {
                           event.preventDefault();
                       }
               })
            .autocomplete({
                  source: function( request, response )
                   {
                       response( $.ui.autocomplete.filter(
                       data, extractLast( request.term ) ));
                   },
                  create: function () 
                  {
                      $(this).data('uiAutocomplete')._renderMenu = customRenderMenu;
                      $(this).data('uiAutocomplete')._renderItem = customRenderItem;
                  },
                   focus: function() 
                   {
                     return false;
                   },
                   select: function( event, ui ) 
                   {
                        var terms = split(this.value );
                        terms.pop();
                        terms.push( ui.item.value);
                        terms.push( "" );
                        this.value = terms.join( ", " );
                        var old = $('#hidden').val();
                        $('#hidden').val(old + ui.item.id + ",");
                        return false;
                   }
                }); 
           }
      });
   
}

/*------------------------------------------------------------------------
  
  Updates the phone,email,sex,city,country
  Ajax post
  Aici fac cu WebService pentru Tema Nr 3 : 
-------------------------------------------------------------------------*/

/*-------------------------------------------------------------
  Autentificare 
----------------------------------------------------------------*/

function LoginWebService()
{
   var email = $('#Username').val();
   var password = $('#Password').val();
   var WebServerIp="127.0.0.1";
   var WebServerPort = 2345;
   $.ajax({
        url: "http://" + WebServerIp + ":" + WebServerPort + "/autentificare/" + email + "/" + password,
        type: "POST",
        cache : false,
        success: function(data, textStatus, jqXHR)
        {
           data = JSON.parse(data);
           if(data.response == "ok")
           {
             var url = "login/UpdateStatus/" + data.id;
             $.get(url,function(result){ 
              window.location.href = "../Tema2/home";})
           }
           else
           {
             window.location.href = "../Tema2/login_failed";
           }
         
        },
        error: function(jqXHR, textStatus, errorThrown ){
          alert("error");
        }
      });

   return false;
}
/*End of Autentificare------------------------------------*/

/*-------------------------Editarea profilului------------------*/
      function UpdatePhone(tel)
      {
       
         result = JSON.parse(localStorage['fullInfo']);
         var wsIp = "localhost";
         var wsPort = 2345;
         var _dataUser = JSON.parse(localStorage["fullInfo"]);
         var srcId = _dataUser.ID_User;
         var url = "http://" + wsIp + ":" + wsPort + "/editProfile/UpdatePhone/" + result.info;
          $.ajax({
            url:url,
            dataType: 'text',                       
            type: 'post',
            data : 
            {
               phone : tel
            },
            success: function(php_script_data)
            {
               
            }
           });     
         $('#Phone_Record').html(tel);
         $('#hidden_phone').hide();
         $('#link_edit_phone').show()
         return false;
      }
      function UpdateEmail(mail)
      {
         
         result = JSON.parse(localStorage['fullInfo']);
         var wsIp = "localhost";
         var wsPort = 2345;
         var _dataUser = JSON.parse(localStorage["fullInfo"]);
         var url = "http://" + wsIp + ":" + wsPort + "/editProfile/UpdateEmail/" + result.ID;
          $.ajax({
            url:url,
            dataType: 'text',                       
            type: 'post',
            data : 
            {
               Email : mail
            },
            success: function(php_script_data)
            {
               
            }
        });     
         $('#Mail_Record').html(mail);
         $('#hidden_mail').hide();
         $('#link_edit_mail').show()
         return false;
      }
      function UpdateOrasTara(oras,tara)
      {
         result = JSON.parse(localStorage['fullInfo']);
         var wsIp = "localhost";
         var wsPort = 2345;
         var _dataUser = JSON.parse(localStorage["fullInfo"]);
         var url = "http://" + wsIp + ":" + wsPort + "/editProfile/UpdateLocatie/" + result.ID_Locatie;
          $.ajax({
            url:url,
            dataType: 'text',                       
            type: 'post',
            data : 
            {
               Oras : oras,
               Tara : tara
            },
            success: function(php_script_data)
            {
               
            }
        });     
         $('#oras').html(oras);
         $('#tara').html(tara);
         $('#hidden_address').hide();
         $('#link_edit_adress').show()
         return false;
      }
      function UpdateBirth()
      {
         var daySelected = $('[name="days"]').val();
         var monthSelected  = $('[name="months"]').val();
         var yearSelected = $('[name="years"]').val();
          var wsIp = "localhost";
         var wsPort = 2345;
         result = JSON.parse(localStorage['fullInfo']);
        var url = "http://" + wsIp + ":" + wsPort + "/editProfile/UpdateBirth/" + result.info;
          $.ajax({
            url:url,
            dataType: 'text',                       
            type: 'post',
            data : 
            {
               Day   :  daySelected,
               Month :  monthSelected,
               Year  :  yearSelected
            },
            success: function(php_script_data)
            {
               
            }
        });     
         
         $('#Ziua').html(daySelected);
         $('#Luna').html(monthSelected);
         $('#An').html(yearSelected);
         $('#hidden_birth').hide();
         $('#link_edit_birth').show()
         return false;
      }
      function UpdateSex()
      {
        var _sex = null;
         var sex =  $('[name="sex"]').val()
         if(sex == "Masculin")
          _sex = 1;
        else
          _sex = 0;
         result = JSON.parse(localStorage['fullInfo']);
         var wsIp = "localhost";
         var wsPort = 2345;
         var url = "http://" + wsIp + ":" + wsPort + "/editProfile/UpdateSex/" + result.info;
          $.ajax({
            url:url,
            dataType: 'text',                       
            type: 'post',
            data : 
            {
               Sex : _sex
            },
            success: function(php_script_data)
            {
               
            }
        });     
         $('#sex').html(sex);
         $('#hidden_sex').hide();
         $('#link_edit_sex').show()
      }
      function UpdateRelatie()
      {
         var result = JSON.parse(localStorage['fullInfo']);
         var relatie =  $('[name="relatie"]').val()
         var _rel=null;
         if(relatie == "Nespecificat")
          rel = 1;
        else if(relatie == "Intr-o relatie")
          rel = 2;
         else if(relatie == "Intr-o relatie complicata")
          rel = 3;
         else if(relatie == "Vaduv/a")
          rel = 4;
         else if(relatie == "Logodit/a")
          rel = 5;
         else if(relatie == "Singur/a")
          rel = 6;
        else if(relatie == "Casatorit/a")
          rel = 7;
        else if(relatie == "Despartit/a")
          rel = 8;
        else
          rel =9;
        var url = "../edit/UpdateRelatie/" + rel + "/" +  result.info;  
         $.get(url,function(result)
         {
            
         });
         $('#Relatie_').html(relatie);
         $('#relatie_select_hidden').hide();
         $('#link_edit_relatie').show()
      }
      function UpdateFamilie()
      {
         var result = JSON.parse(localStorage['fullInfo']);
         var url = "../edit/UpdateRelatie/" + rel + "/" +  result.info;  
         $("Familie_Item").each(function()
          {
            var id = $(this).val();

          });
         $.get(url,function(result)
         {
            
         });
      }
      function UpdateFacultate()
      {
         var result = JSON.parse(localStorage['fullInfo']);
         var newFacultate = $('#txtBoxFacultate').val();
         var wsIp = "localhost";
         var wsPort = 2345;
         result = JSON.parse(localStorage['fullInfo']);
           var url = "http://" + wsIp + ":" + wsPort + "/editProfile/UpdateFacultate/" + result.ID_Info_Studii;
          $.ajax({
            url:url,
            dataType: 'text',                       
            type: 'post',
            data : 
            {
              Facultate : newFacultate
            },
            success: function(php_script_data)
            {
               
            }
        });     
         $('#Facultate').html(newFacultate);
         $('#hidden_faculty').hide();
         $('#link_faculty').show()
      }
       function UpdateLiceu()
      {
         var result = JSON.parse(localStorage['fullInfo']);
         var newLiceu = $('#txtBoxLiceu').val();
         var wsIp = "localhost";
         var wsPort = 2345;
         var url = "http://" + wsIp + ":" + wsPort + "/editProfile/UpdateLiceu/" + result.ID_Info_Studii;
         $.ajax({
            url:url,
            dataType: 'text',                       
            type: 'post',
            data : 
            {
              Liceu : newLiceu
            },
            success: function(php_script_data)
            {
               
            }
        });     
         $('#Liceu').html(newLiceu);
         $('#hidden_highschool').hide();
         $('#link_highschool').show()
      }
/*---------------------End of updateProfile----------------------------------------*/
    function UpdateFriendsSearch()
    {
      var level = localStorage['level'];
      var pattern = $('#search_user_bar').val();
      if(pattern == "")
      {
        $('#search_user_bar').attr('title',"");
        return;
      }
      var url = null;
      if(level == 2)
      {
        url = "friends/SearchUser/"+pattern; 
      }
      if(level == 3)
      {
       url = "../friends/SearchUser/"+pattern;
      }
      if(level == 4)
      {
        url = "../../friends/SearchUser/" + pattern;
      }

      $.get(url,function(result){
                     var _dataFriends = JSON.parse(result);
                      $('#search_user_bar').attr('title',"");
                      var old = $('#search_user_bar').attr('title');
                      for (var i = 0 ;i < _dataFriends.length;i++) 
                      {
                           var ID = _dataFriends[i].ID;
                           old=old+_dataFriends[i].ID;
                           if( i != _dataFriends.length - 1)
                               old+=",";  
                      };   
                      $('#search_user_bar').attr('title',old);
                 });
    }
    function ChangeMsg(event,id,Nume,Prenume)
    {
       var url2 = '../message/GetHistory/' + id;
           $('#_title').html(Nume + " " +Prenume);
           localStorage['id_s'] = id;
           $.get(url2,function(result2)
           {
                 var container = $('#MessageWrapper');
                 container.empty();
                  $('#_title').attr('title',id);
                 var result = JSON.parse(result2);
                 var infoUser=JSON.parse(localStorage["database"])[0];
                 for (var i = 0; i < result.length; i++) {
                        if(result[i].Mesaj == 'null')
                        {
                          result[i].Mesaj = "";
                        }
                         if(result[i].Media == 'null')
                        {
                          result[i].Media = "";
                        }
                      if(result[i].Sender == infoUser.ID)
                      {
                          var _html = '<div class="MsgSend">\
                                       <div class="TitleMsg">' + infoUser.Nume + " " + infoUser.Prenume + '</div> \
                                      <div id="contMsg">' + 
                                           result[i].Mesaj + 
                                      '</span><form class="inline" action = "../message/DownloadFile/'+ result[i].Media + '"><a href = "#" onclick = "$(this).parent().submit()" title="Download Atasament"><div class="atach">' +  result[i].Media + '</div></a></form></div><br />';
                            container.append(_html);
                      }
                      else
                      {
                          var _html = ' <div class="MsgGet">\
                                            <div class="TitleMsg">' +
                                              $('#_title').html().trim() + 
                                          '</div>\
                                          <div id="contMsg">' +
                                              result[i].Mesaj +
                                           '</span><form class="inline" action = "../message/DownloadFile/'+ result[i].Media + '"><a href = "#" onclick = "$(this).parent().submit()" title="Download Atasament"><div class="atach">' +  result[i].Media + '</div></a></form></div><br />';
                          container.append(_html);
                      }
                 };
                  $('.ListItem').removeClass('active');
                  $(event.target).closest('.ListItem').addClass('active');
                  $("#MessageWrapper").animate({ scrollTop: $('#MessageWrapper')[0].scrollHeight}, 1000);
               });
    }
    function Advanced_Search()
    {
      $('#search').addClass('hide');
      $('#search').removeClass('show');
      $('#HiddenResult').addClass('show');
      var pattern = "";
      if($('#sex_check').prop('checked') == true)
      {

          pattern += "Sex_";
          if($('#btn_sex_barbat').prop("checked") == true)
             pattern +="1";
          else
            pattern += "0";
          pattern += ",";
      }
      if($('#age_check').prop('checked') == true)
      {
        pattern +="Age_";
        if($("#1_tn").prop("checked") == true)
        {
          pattern +="0_15";
        }
        else if($("#2_tn").prop("checked") == true)
        {
           pattern +="15_20";
        }
        else if($("#3_tn").prop("checked") == true)
        {
           pattern +="20_25";
        }
        else if($("#4_tn").prop("checked") == true)
        {
           pattern +="25_30";
        }
        else
        {
           pattern +="30_100";
        }
         pattern += ",";
      }
      if($('#email_check').prop('checked') == true)
      {
          pattern += "Email_";
          pattern += $('#email_input').val().trim();
          pattern += ",";
      }
      if($('#check_locatie').prop('checked') == true)
      {
          pattern += "Locatie_";
          pattern += $('#input_locatie').val().trim();
          pattern += ",";
      }
      if($('#check_studii').prop('checked') == true)
      {
          pattern += "Studii_";
          pattern += $('#input_studii').val().trim();
          pattern += ",";
      }
      
      var url = "../Advanced_Search/Filter/" + pattern;
      $.get(url,function(data) {
        $('.List').empty();

          var _RES = JSON.parse(data);
          for (var i = 0; i < _RES.length; i++) {
                var _html = '  <div class="Line">\
                              <div class="Box_Auto image_Big Bordered" id="photo_right">\
                                 <form class="inline" action = "../user/User/' + _RES[i].ID  + '"><a href="#" onclick="$(this).parent().submit()">\
                                      <div class="Title SmallText center white_col">' + _RES[i].Nume + " " + _RES[i].Prenume + '</div>\
                                  </form>\
                                 <img width:200px height:250px class="center _image" src="' + _RES[i].Photo_Profil +'" " />\
                              </a>\
                          </div>';
              $('.List').append(_html);
            };                 
            if(_RES.length == 0)
            {
               $("#NoResults").show();
            }
            else
            {
               $("#NoResults").hide();
            }
      });
      $('#HiddenResult').removeClass('hide')
    }

/*  End of  WebServices  */

 function Add_New_Window(label,name,id,image,conf_id)
 {

       var customRenderItem =function (ul,item) {
       var inner_html = '<a><div class="list_item_container"><div class="image_small"><img src=../public/images/resources/' + item.image + 
        '.jpg alt="some"></div><div class="label">' +
        item.label + '</div><div class="description">' + item.description + '</div></div></a>';
        return $( "<li></li>" )
            .data( "item.Autocomplete", item )
            .append(inner_html)
            .appendTo( ul );
    }
    var _dataUser = JSON.parse(localStorage["database"]);
    var _ID = _dataUser[0].ID;
    var a = 0;
   $('.shout_box').each(function()
    {
      if($(this).attr('title') == id)
      {
          a=1;
      }
   });
   if(conf_id != null)
   {
        id = conf_id;

   }
   if(a == 1) 
    return false;
    var _str = '<div data-info="' + conf_id +'" class="shout_box" title="' + id +'">\
                    <div class="header"><div class="_max" title="' + name + '">' + label + '</div><div class="close_btn Margin_R" title="Inchide Fereastra" onclick="Close_Window.call(this,event)">&nbsp;</div> \
                           <div class="minimize_btn Margin_R" onclick="Minimize_Window.call(this,event)">&nbsp;</div> \
                           <div class="add_friends_icon Margin_R" title="Adauga Prieteni" onclick="SearchFr.call(this,event)">&nbsp;</div> \
                           <div id="close_conf" class="close_conv_icon Margin_R" title="Iesi din Conferinta" onclick="Close_Window.call(this,event)">&nbsp;</div> \
                     </div> \
                     <div class="Add_Fr"> \
                        <input type="text" id="box_add_f" class="tag" onkeydown = "AddUser.call(this,event)" placeholder="Adauga prietenii in disctie" />\
                        <input type ="submit" id="gata_btn" class="button3" value="Gata" onclick="Finalize.call(this,event,\'' + name + '\');$(this).parent().hide()" />\
                     </div> \
                        <div class="toggle_chat"> \
                             <div class="message_box"> \
                              </div> \
                            <div class="user_info white">\
                              <div class="BrowseFile">\
                                  <input type="file" id="fileInput_2" title="" name="file" onchange="AttachFile.call(this,event,\'#fileInput_2\')" />\
                              </div>\
                              <div class="_right">\
                                <div class="add_photo_icon" title="Adauga Fisier" onclick="triggerClick(' + "'#fileInput_2'" + ');">&nbsp;</div>\
                                <div class="add_emo_icon" onclick="Show_Emoticon.call(this,event);" title="Adauga un emoticon" onclick="SearchFr.call(this,event)">&nbsp;</div>\
                              </div>\
                               <textarea  name="shout_message" rows="1" cols="27" id="shout_message" onkeydown="UpMessage.call(this,event,\'' + name + '\',' + id + ')" type="text" placeholder="Type Message Hit Enter"> </textarea>\
                            </div>\
                        </div>\
                </div>';
    $('#Wrapper_Msg').append(_str); 
    var wsIp = "localhost";
    var wsPort = 2345;
    var _dataUser = JSON.parse(localStorage["database"]);
    var _image = _dataUser[0].Photo_Profil; 
    var srcId = _dataUser[0].ID;
   $.ajax({
      url: "http://" + wsIp + ":" + wsPort + "/chat/GetHistory/" + srcId + "/" + id,
      type: "GET",
      dataType: "json",
      success: function(messages){
         data = messages;
         for(var i = 0;i< data.length;i++)
         {
            if(data.length > 0)
              {
                 if(conf_id != null)
                 {
                   data[i].Media = "";
                 }
                 if(data[i].Sender == srcId)
                 {
                  
                      WriteSendMessage($('#Wrapper_Msg').find('.shout_box').last(),data[i].Mesaj,data[i].Media)
                 }
                 else
                 {
                    
                      WriteGetMessage($('#Wrapper_Msg').find('.shout_box').last(),data[i].Mesaj,data[i].Photo_Profil,data[i].Media)
                 }
              }
        };
      },
      error: function(jqXHR, textStatus, errorThrown ){
        console.log(textStatus);
      }
    });
  }

 $(document).ready(function() 
 { 
    var loc = window.location.pathname;
    var dir = loc.split('/');
    var directory = dir[dir.length-1];
    var directoryAnt = dir[dir.length-2];
    localStorage['level'] = dir.length-1;
    localStorage['directory'] = directory;
    window.setInterval(poll_Message,2000);
    if( directory == "User" || directoryAnt == "User")
    {
       $('#link_msg').click(function(){
            var id = $("#CenterPage").attr('title')
            var url = '../../user/GetFullInfo/' + id;

             $.get(url,function(result)
             {
                 localStorage['data'] = result;
                 var  _dataUser = JSON.parse(localStorage['data'])[0];
                 var label = "'" + _dataUser.Nume + " " + _dataUser.Prenume + "'" ;
                 Add_New_Window(label,label,id,_dataUser.Photo_Profil);
                 
              });
       });
    }
 });  

function resetCursor(txtElement) { 
    if (txtElement.setSelectionRange) { 
        txtElement.focus(); 
        txtElement.setSelectionRange(0, 0); 
    } else if (txtElement.createTextRange) { 
        var range = txtElement.createTextRange();  
        range.moveStart('character', 0); 
        range.select(); 
    } 
}
function AttachFile(event,id)
{
  var name = $(event.target).attr('name');
  var file_data = $(id).prop('files')[0];   
  var form_data = new FormData();                 
  form_data.append(name, file_data); 
  var url ='home/PostImage/' + name;
  if(localStorage['level'] == 3)
  {
     url = '../home/PostImage/' + name;
  }   
   if(localStorage['level'] == 4)
  {
     url = '../../home/PostImage/' + name;
  }                           
   $.ajax({
                url: url, 
                dataType: 'text', 
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                       
                type: 'post',
               success: function(php_script_data)
                {
                  alert('Fisierul' + php_script_data + 'a fost uploadat cu succes.Adaugati text si tastati Enter pentru a trimite mesajul');
                  $(event.target).attr('title',php_script_data);
                } 
      });     
    return false;
}

function setCaretToPos (input, pos) {
      setSelectionRange(input, pos, pos);
}
function Close_Window(event)
{
   $(event.target).closest('.shout_box').fadeOut();   
   $(event.target).closest('.shout_box').remove();
}
function Minimize_Window(event)
{
    var toggleState  = $(event.target).parent().next().next().css('display');
    if(toggleState == 'none')
    {
        $(event.target).closest(".shout_box").animate({top: "-=250px"});
    }
    $(event.target).parent().next().next().slideToggle();
    if(toggleState == 'block')
        $(event.target).closest(".shout_box").animate({top: "275px"});
}
function WriteSendMessage(box,message,media)
{
    if(media == 'null')
        media = "";
        if(message == 'null')
      message = "";
     var _dataUser = JSON.parse(localStorage["database"]);
     var _image = _dataUser[0].Photo_Profil; 
     var _ID = _dataUser[0].ID;
     var str = '<img class="image_small" src = "' + _image +  '"/>';
     box.find('.message_box').append(str + ' <div class = "text_Send _left"><span>' +  message + 
      '</span><form class="inline" action = "message/DownloadFile/'+ media + '"><a href = "#" onclick = "$(this).parent().submit()" title="Download Atasament"><div class="atach">' + media + '</div></a></form></div><br />').fadeIn();
     scrolltoh = $('.message_box')[0].scrollHeight;
     $('.message_box').scrollTop(scrolltoh);
}
function WriteGetMessage(box,message,image,media)
{
   if(media == 'null')
       media = "";
     if(message == 'null')
      message = "";
   var str = '<img class="image_small _right" src = "' + image +  '"/>';
   var box_msg = box.find('.message_box');
   box_msg.append(str + ' <div class = "text_Send white _right"><span>' +  message + 
    '</span><form class="inline" action = "message/DownloadFile/'+ media + '"><a href = "#" onclick = "$(this).parent().submit()" title="Download Atasament"><div class="atach">' + media + '</div></a></form></div><br />').fadeIn();
   var scrolltoh = $('.message_box')[0].scrollHeight;
   $('.message_box').scrollTop(scrolltoh);
}

function WriteGetMessageDashboard(msg,Nume,Prenume,media)
{
    var container = $('#MessageWrapper');
    var _html = ' <div class="MsgGet">\
                        <div class="TitleMsg">' +
                                Nume + " " + Prenume + 
                                '</div>\
                        <div id="contMsg">' +
                        msg +
                    '</span><form class="inline" action = "message/DownloadFile/'+ media + '"><a href = "#" onclick = "$(this).parent().submit()" title="Download Atasament"><div class="atach">' + media + '</div></a></form></div><br />';
    container.append(_html);
       var scrolltoh = $('#MessageWrapper')[0].scrollHeight;
   $('#MessageWrapper').scrollTop(scrolltoh);
}
function WriteSendMessageDashboard(msg,Nume,Prenume,media)
{

       var container = $('#MessageWrapper');
       var _html = '<div class="MsgSend">\
                  <div class="TitleMsg">' + Nume + " " + Prenume + '</div> \
                  <div id="contMsg">' + 
                        msg + 
                     '</span><form class="inline" action = "message/DownloadFile/'+ media + '"><a href = "#" onclick = "$(this).parent().submit()" title="Download Atasament"><div class="atach">' + media + '</div></a></form></div><br />';
       container.append(_html);
        var scrolltoh = $('#MessageWrapper')[0].scrollHeight;
   $('#MessageWrapper').scrollTop(scrolltoh);

}

function UpMessage(evt,name,id)
{
   if(evt.which == 13) 
   {
                var _dataUser = JSON.parse(localStorage["database"]);
                var _image = _dataUser[0].Photo_Profil; 
                var _ID = _dataUser[0].ID;
                var imessage = $(evt.target).val();
                var media = $(evt.target).prev().prev().find('#fileInput_2').attr('title').trim();
                var str = '<img class="image_small" src = "' + _image +  '"/>';
                var box_msg = $(evt.target).parent().prev();
                box_msg.append(str + ' <div class = "text_Send _left"><span>' +  imessage + 
                   '</span><form class="inline" action = "message/DownloadFile/'+ media + '"><a href = "#" onclick = "$(this).parent().submit()" title="Download Atasament"><div class="atach">' + media + '</div></a></form></div><br />').fadeIn();
                var scrolltoh = $('.message_box')[0].scrollHeight;
                $('.message_box').scrollTop(scrolltoh);
                $(evt.target).focus().val('');
                resetCursor($(evt.target));
                 if(media == "")
                  media = 'null';
                if(imessage.trim() == "")
                  imessage = 'null';
                var wsIp = "localhost";
                var wsPort = 2345;
                var _dataUser = JSON.parse(localStorage["database"]);
                var _image = _dataUser[0].Photo_Profil; 
                var srcId = _dataUser[0].ID;
                var url = "http://" + wsIp + ":" + wsPort + "/chat/postMessage/" + srcId + "/" + id;
                $.ajax({
                      url:url,
                      dataType: 'text',                       
                      type: 'post',
                      data : 
                      {
                        msg : imessage,
                        media : media
                      },
                      success: function(php_script_data)
                      {
                          $(evt.target).prev().prev().find('#fileInput_2').attr('title','');
                          var _dataUser = JSON.parse(localStorage["database"]);
                         if(localStorage['directory'].toString() == "message")
                          { 
                            var id_s = localStorage['id_s'];
                            if(id_s.toString() == id.toString())
                            {
                            	if(media == 'null')
                            		media = "";
                               WriteSendMessageDashboard(imessage,_dataUser[0].Nume,_dataUser[0].Prenume,media);
 
                            }
                          }  
                      }
      });     
      }
}
function GetMessage(data,sourceBox)
{
      var _image = data.image; 
      var _ID = data.Sender;
      var imessage = data.Mesaje;
      if(data.Media == 'null')
        data.Media = "";
      if(imessage == "null")
        imessage == "";
      var str = '<img class="image_small _right" src = "' + _image +  '"/>';
      var box_msg = sourceBox.last().first();
      box_msg.append(str + ' <div class = "text_Send _right"><span>' +  imessage + 
        '</span><form class="inline" action = "message/DownloadFile/'+ data.Media + '"><a href = "#" onclick = "$(this).parent().submit()" title="Download Atasament"><div class="atach">' + media + '</div></a></form></div><br />').fadeIn();
      var scrolltoh = $('.message_box')[0].scrollHeight;
      $('.message_box').scrollTop(scrolltoh);
      $('#chatAudio')[0].play();
      
}
function SearchFr(event)
{
  $(event.target).parent().next().fadeIn();
}
function Finalize(event,name) 
{
    var _dataUser = JSON.parse(localStorage["database"]);
    var _image = _dataUser[0].Photo_Profil; 
    var _ID = _dataUser[0].ID;
    var val = $(event.target).prev().val() + name ;
    var id = $(event.target).parent().closest('.shout_box').attr('title');
    var val2 = name.split(",");
    var array = val.split(",");
    var url ="conferinta/OnCreateConference/" + val2 + "/" + localStorage['ids'] ;
    if(localStorage['level'] == 3)
    {
        url = "../conferinta/OnCreateConference/"+ val2 + "/" + localStorage['ids'] ;
    }

    if(val2.length >1)
    {
      if(array.length > 2)
      {
         tmp = array[array.length-1] + " si alti " + (array.length-1);
      }
      $(event.target).closest('.shout_box').find('.header').find('._max').html(tmp);
      $(event.target).closest('.shout_box').find('.header ._max').attr('title',val);
    }
    else
    {
      tmp=val;
      if(array.length > 2)
      {
         tmp = name + " si alti " + (array.length-1);
      }
      url += id;
      url += "," + _ID;
      localStorage['ids'] += _ID;
       $.get(url,function(result){
          Add_New_Window(tmp,val,localStorage['ids'],"",result.trim());
          $('.shout_box').last().find('#close_conf').show();
          localStorage['ids'] = "";
       });
    }

 
}
function Show_Emoticon(event)
{
  var pos = $(event.target).parent().parent().parent();
  var html = $('.Wrap_Emo').first().clone();
  html.show();
  pos.append(html);
  html.css('position','relative');
  html.css('top','-200px');

}
function poll_Message()
{

   var wsIp = "localhost";
   var wsPort = 2345;
    var _dataUser = JSON.parse(localStorage["database"]);
    var _image = _dataUser[0].Photo_Profil; 
    var srcId = _dataUser[0].ID;
   $.ajax({
      url: "http://" + wsIp + ":" + wsPort + "/chat/getAllMessages/" + srcId,
      type: "get",
      dataType: "json",
      success: function(data)
        {
            if(data.length > 0)
               {
                  for (var i =0 ;i< data.length;i++) 
                  {
                     Add_New_Window(data[i].Nume + " " + data[i].Prenume,data[i].Nume + " " + data[i].Prenume,data[i].Sender);
                     $( ".shout_box" ).each( function( index, element )
                     {
                       if($(this).attr('title') == data[i].Sender)
                       {
                            var _image = data[i].image; 
                            var _ID = data[i].Sender;
                            var imessage = data[i].Mesaje;
                            if(data[i].Media == 'null')
                              data[i].Media = "";
                            if(imessage == 'null')
                            {
                               imessage = "";
                            }
                            var str = '<img class="image_small _right" src = "' + _image +  '"/>';
                            var box_msg = $(this).children().find('.message_box');
                            box_msg.append(str + ' <div class = "text_Send white _right"><span>' +  
                              imessage + 
                              '</span><form class="inline" action = "message/DownloadFile/'+ data[i].Media + '"><a href = "#" onclick = "$(this).parent().submit()" title="Download Atasament"><div class="atach">' + data[i].Media + '</div></a></form></div><br />').fadeIn();
                            var scrolltoh = $('.message_box')[0].scrollHeight;
                            $('.message_box').scrollTop(scrolltoh);
                            if(localStorage['directory'].toString() == "message")
                            {
                              if(localStorage['id_s'] == _ID)
                              {
                                  WriteGetMessageDashboard(imessage,data[i].Nume,data[i].Prenume,data[i].Media);
                              }
                            }
                       }
                    });
                  }
            }
      },
      error: function(jqXHR, textStatus, errorThrown ){
        console.log(textStatus);
      }
    });
}
 function Append_Text_Area(event,text)
 {
   var old =  $(event.target).closest('.Wrap_Emo').prev().find('#shout_message').val();
    $(event.target).closest('.Wrap_Emo').prev().find('#shout_message').val(old+text);
   $(event.target).closest('.Wrap_Emo').remove();
 }
 function Append_Filename(event)
 {
   var file = $(event.target).val();
   $(event.target).closest('.user_info').find('textarea').val(file);
 }
 function AddUser(event)
 {
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
         var url2 = "home/GetPeopleGroups" ; 
          if(localStorage["level"] == 3)
          {
             url2 = "../home/GetPeopleGroups";
          }
          if(localStorage["level"] == 4)
          {
             url2 = "../../home/GetPeopleGroups";
          }
      $.ajax({
                url: url2,
                dataType: "json",
                success: function(data)
                {
                     var data = $(data).map(function()
                     {
                          return {
                                    value: this.Nume + " " + this.Prenume, 
                                    id: this.ID,
                                    image: this.Photo_Profil,
                                    category : this.category
                                  };
                    }).get();
                   if ( event.keyCode === $.ui.keyCode.TAB && $( this ).autocomplete( "instance" ).menu.active ) 
                   {
                      event.preventDefault();
                   }
                   $('#box_add_f').autocomplete
                  ({
                      source: function( request, data )
                      {
                            data( $.ui.autocomplete.filter(data, extractLast( request.term ) ) );
                      },
                      create: function () 
                      {
                            $(this).data('uiAutocomplete')._renderItem = customRenderItem;
                      },
                      focus: function() 
                       {
                            return false;
                       },
                      select: function( event, ui ) 
                      {
                            var terms = split( this.value );
                            terms.pop();
                            terms.push( ui.item.value );
                            terms.push( "" );
                            this.value = terms.join( "," );
                            localStorage['ids'] += ui.item.id + ",";
                            return false;
                      }
                  });
                }
      });
 }
 function Reload()
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
 function Load_Active_Conversations()
 {
 	 
 }


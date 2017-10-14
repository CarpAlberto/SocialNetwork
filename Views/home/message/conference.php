<div id="CenterPage" title="">
               <div class="Title">
                    Conferinta : <span  id="name_conferinta">Carp Alberto</span>
               </div>
               <hr \>
              <div id="MessageWrapper">
                 <div class="MsgSend">

                   <div class="TitleMsg">
                       Alberto Carp:
                  </div>
                  <div id="contMsg">
                      Whats'up!!!
                  </div>
                 </div>
              </div>
              <div id="Message_Sender">
                  <form action="#">
                     <textarea rows="3" id="MsgDashBoard" placeholder="Scrie aici mesajul" autofocus >
                     </textarea>
                     <input type="submit" value = "Trimite"  
                     onclick="Send_Message_()">
                      <div class="BrowseFile">
                           <input type="file"  
                                  name="pic" 
                                  id="fileInput2"
                                  value="Upload File"
                                  onchange="$('#MsgDashBoard').val($(this).val());"
                                  />
                             <input type="file"  
                                  name="pic" 
                                  accept="image/x-png, image/gif, image/jpeg"
                                  id="fileInput3"
                                  value="Upload File"
                                  onchange="$('#MsgDashBoard').val($(this).val());"
                                  />
                      </div>
                      <a title="Adauga un fisier" onclick="triggerClick('#fileInput2')">
                          <img class="_img_Small left" src="../../public/images/attach.png"/>
                      </a>
                          <a title="Adauga un fotografie" onclick="triggerClick('#fileInput3')">
                          <img class="_img_Small left" src="../../public/images/camera.png"/>
                      </a>

                  </form>
                  
              </div>
            </div>  
            <div id="LeftPage">
                  <div class="BigTitle_2 Super_Mini">Persoane in conferinta </div>
                 <div id="ListHistory">
                    <div class="ListItem" title="">
                           <div  class="ImageFriend">
                             <img id="owner" src ="">
                           </div>
                           <div class="Preview">
                                <span class="Title" id="name"></span><br\>
                           </div>
                    </div>
                </div>
                    <div>
                         <div id="last">
                            <input class="Search2 TextInput center Margin_B" type="text" placeholder = "Adauga Useri,Grupuri la conferinta "/>
                          
                        </div>
                        <div id="last2">
                            <input class="button3  Margin_B" type="submit" value = "Iesi din Conferinta " onclick="$('#ListHistory').empty();
                                     $('#last_h,#last2_h').show();
                                     $('#name_conferinta').html('Carp Alberto');"/>
                            <input class="button3 " type="submit" value = "Inapoi la mesaje " onclick="document.location.href = 'index.html'"/>
                        </div>
                   </div>
           </div>
           </div>

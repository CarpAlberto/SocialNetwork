<div id="CenterPage">
               <div class="Title">
                    <span id="_title" title=""></span>
               </div>
               <hr \>
              <div id="MessageWrapper">
              
                
              </div>
              <div id="Message_Sender">
                  <form action="#">
                     <textarea rows="3" title="" id="MsgDashBoard" placeholder="Scrie aici mesajul" autofocus >
                     </textarea>
                     <input type="submit" title="" value = "Trimite"   
                     id="trig"
                     onclick="return Upload_Message($('#MsgDashBoard').val(),$('#MsgDashBoard').attr('title'));"/>
                      <div class="BrowseFile">
                           <input type="file"  
                                  name="pic" 
                                  id="fileInput2"
                                  value="Upload File"
                                  onchange="PostFotografie.call(this,event,'#fileInput2')"
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
                          <img class="_img_Small _left " src="<?php echo URL;?>/Views/public/images/attach.png"/>
                          <p id="add_txt_file"class="ShadowTitle">Adauga un fisier </p>
                      </a>
                      <a  id="send_photo" title="Adauga un fotografie" onclick="triggerClick('#fileInput3')">
                          <img id="l" class="_img_Small _left" src="<?php echo URL;?>/Views/public/images/camera.png"/>
                          <p id="add_txt_photo" class="ShadowTitle">Adauga o fotografie </p>
                      </a>
                  </form>
                  
              </div>
            </div>  
            <div id="LeftPage">
                <div id="history">
                   <div class="Title" id="titlu_msg">
                       Istoric Mesaje
                   </div>
                   <hr>
                   <div id="ListHistory">
                       <input class="Search3 TextInput center Margin_B" type="text" placeholder = "Cauta Useri "/>
                       <div class="ListItem Title Big " id="idconf">
                            <form class="inline" action="../conferinta/index">
                              <a href="#" onclick="$(this).parent().submit()">Incepeti o conferinta </a>
                            </form>
                       </div>
                   </div>
                </div>
            </div>
        </div>
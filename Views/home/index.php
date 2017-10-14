          <div id="CenterPage">
               <div id="FirstPost"> 
                 <div id="InputFirstPost">
                    <textarea type="text"  rows="2" cols="85"  
                        id="post" placeholder="What's up!" 
                        onfocus="Popup('HiddenFirstPost');$('#InputFirstPost textarea').css('height','60px');"
                        onKeyUp="UploadPost(event);"
                      ></textarea>
                 </div>
                 <div id="HiddenFirstPost">
                     <div class="Padding_T">
                        <div>
                              <a href="#" onclick="ShowWhereToPost();">
                                  <img src="<?php echo URL;?>Views/public/images/down_arrow.png" class="_right arrow" alt="bla"/></a>
                                  <a class="button3 _right" id="Posteaza" 
                                  title="Unde Postez?"><pre>Doar eu     </pre> </a>
                                  <a class="button3 _right" onclick="UploadPost(event);" >Posteaza</a>
                        </div>
                        <div class="Box Auto where">
                          <div class="Title Medium Border_B">Unde Postez? </div>
                          <hr>
                            <ul class="list_where">
                                <div>
                                  <li class="Title SmallText li white_col" onclick="$('#Posteaza').find('pre').html('Doar Eu    ');Close_Where();">
                                    <img  class="_img_Small" src="<?php echo URL;?>Views/public/images/me.png"/>
                                     <span class="pos"> Doar eu      </span>
                                  </li>
                                  </div>
                                <div>
                                  <li class="Title SmallText li white_col" onclick="$('#Posteaza').find('pre').html('Doar Prietenii     ');Close_Where();">
                                    <img class="_img_Small" src="<?php echo URL;?>Views/public/images/friends.png"/>
                                    <span class="pos"> Doar Prietenii    </span>
                                  </li>
                                  </div>
                                <div>
                                  <li class="Title SmallText li white_col" onclick="$('#Posteaza').find('pre').html('Intreaga Lume      ');Close_Where();">
                                    <img class="_img_Small" src="<?php echo URL;?>Views/public/images/world.png"/>
                                    <span class="pos"> Intreaga Lume    </span>
                                  </li>
                                  </div>
                            </ul>
                        </div>
                          <form class="black" method="post" id="formPostPhoto" enctype="multipart/form-data">
                            <div class="BrowseFile">
                                  <input 
                                  type="file" 
                                  id="fileInput2" 
                                  name="fileInput"
                                  title=""
                                  onchange="PostFotografie.call(this,event,'#fileInput2')" />
                            </div>
                            <a title="Incarca o fotografie" 
                               onclick="triggerClick('#fileInput2')">
                              <img class="_img_Small" src="<?php echo URL;?>Views/public/images/camera.png"/>
                            </a>
                            <label id="image"></label>
                         </form>
                        </div>
                   </div>
               </div>
               <div id="updates">
               
               </div>      

               
            </div>
	           <div id="LeftPage">
		            <div id="PageAvatar" name="home" clss="Black">
		               <div id="TopAvatar"> 
		                   <h2></h2><br />
                       <form class="inline" action="edit/IndexEdit">
    		                   <img src="<?php echo URL;?>Views/public/images/user.jpg">
    		                     <a href= "#" onclick="$(this).parent().submit()">Editeaza Profil</a>
                        </form>
                         <form id="link_admin" class="Margin_T green_col hide" action="admin">
                          <a href="#" onclick="$(this).parent().submit()">Administreaza Conturi</a>
                        </form>
		               </div> <!-- End of TopAvatar  -->
		                <div id="bottomAvatar">
                     <form action = "<?php echo URL;?>signup/Finish_Signup" method="post" id="formUp" enctype="multipart/form-data">
                          <div class="BrowseFile">
                             <input type="file" id="fileInput" onchange="AdaugaFotografie.call(this,event,'#fileInput')" name="file" />
                          </div>
                          <div class="center">
    		                     <a class="button3 Add_Icon" onclick="triggerClick('#fileInput');">Adauga o fotografie</a>
                          </div>
                      </form>
		               </div><!--EndOfBottomAvatar-->
		            </div><!--EndOfPageAvatar-->
                <br>
                <div class="Box Auto Bordered" id="grupuri">
                  <h2 id="title_groups">Grupuri</h2><br />
                  <ul  class="groups_item">
                  
                  </ul>
                  <div class="center">
                      <a class="button3 Add_Icon" id="add_g" href="#modal">
                      Adauga grup nou</a>
                        <div class="remodal" data-remodal-id="modal">
                                <form class="form" action="home/PrepareAddGroup/" id="ad_group" method="POST">
                                      <h3 class="Title"> Adauga un grup Nou</h3>
                                      <label class="Title Medium">Numele Grupului:</label>
                                      <input type="text" class="TextInput" name="NumeGrup" id="name" placeholder="Name"/> <br />
                                      <label class="Title Medium">Introduceti persoanele pe care doriti sa le adaugati: </label>
                                      <input type="text" name="Lista_Useri" title=""  class="TextInput Search_Add_g"/> <br />
                                      <input type="hidden" id="hidden" name="info" value="">
                                      <input type="submit" class="button3 " id="renunta" onclick="$(#Add_Group_Div).hide()" value="Creeaza"/>
                                      <input type="submit" class="button3" id="creeaza" onclick="" value="Renunta"/>
                                      <br/>
                                </form>
                        </div>
                  </div>
                  </div>
	            </div><!--EndOfLeftPage-->
</div><!--EndOfPageContent-->
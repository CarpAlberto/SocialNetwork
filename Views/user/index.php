<div id="CenterPage" title="<?php echo $this->_id ?>">
                <div id='cssmenu'>
                    <ul>
                        <li class='active'> <form action="<?php echo $this->_id ?>" method="post">
                            <a href='#' onclick="$(this).parent().submit()"> TimeLine </a>
                            </form>
                        </li>
                        <li> 
                          <form action="../UserAbout/<?php echo $this->_id ?>" method="post">
                            <a href='#' onclick="$(this).parent().submit()"> Despre </a>
                            </form>
                        </li>
                        <li>
                          <form action="../UserPhotos/<?php echo $this->_id ?>" method="post">
                                <a class="Last" href='#' onclick="$(this).parent().submit()"> Fotografii </a>
                          </form>
                        </li>
                    </ul>
                </div>
                <div id="FirstPost">
                 <div id="InputFirstPost">
                    <textarea type="text"  rows="1" cols="85"  
                        id="post" placeholder="Whats up!" 
                        onfocus="Popup('HiddenFirstPost');$('#InputFirstPost textarea').css('height','60px');"
                        onKeyUp="UploadPost(event);">
                      </textarea>
                 </div>
                 <div id="HiddenFirstPost">
                     <div class="Padding_T">
                        <div>
                         <a class="button3 _right" onclick="UploadPost(event);" >Posteaza</a>
                        </div>
                          <form class="black">
                            <a title="Incarca o fotografie"><img class="_img_Small" src="../public/images/camera.png"/></a>
                         </form>
                        </div>
                  </div>
              </div>
               <div id="updates">
               
               </div>      

            </div>
            <div id="LeftPage">
                <div id="BigAvatar">
                   <div id="c">
                        <a href="#" onclick="Popup('FullScreen')">
                           <img class="Big_Image" id="src_avatar_2" src = "#"/>
                        </a>
                   </div>
                   <div class="center" id="popIM">
                     <div class="_pupUp" id="FullScreen">
                        <form class="form" action="#" id="im">
                              <img  src="../public/images/close_2.png" class="img" id="cancel" onclick="Hide('FullScreen');">
                            <img class="Super_Big_Image" src ="#" >
                        </form>         
                     </div>
                    </div>
                   <div id="short_description">
                        <div class="BigTitle_2 Mini Margin_B">
                              <span id="TitluUser">  
                                 
                             </span>
                       </div>
                       <div class ="BigTitle_2 Super_Mini_2">
                           <span class="desc" id="data_birth"></span> </span> 
                           <span class="desc" id="locatie"></span> </span>
                           <span class="desc" id="relatie"></span> </span>
                       </div>
                    </div>
                 
                         <a class="button3  " id="Status_Prietenie" onclick="UpdateFriends();"><pre>Prieteni  </pre> </a>
                    <a href="#" onclick="ShowWhereToPost();">
              <img src="<?php echo URL;?>Views/public/images/down_arrow.png" class=" arrow_2 _right _mod" id="butt_fr" alt="bla">
            </div>
        </div>

</div><!--End of page content-->
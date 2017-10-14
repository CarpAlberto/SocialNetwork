<div id="CenterPage" title="<?php echo $this->_id ?>">
                <<div id='cssmenu'>
                    <ul>
                        <li > <form action="<?php echo $this->_id ?>" method="post">
                            <a href='#' onclick="$(this).parent().submit()"> TimeLine </a>
                            </form>
                        </li>
                        <li class="active"> 
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
                 <div class="Title Underlined"> Descriere generala! </div>
               <HR>
            <div class="Box_Auto">

                 <div class=" SmallText Date_Contact Bordered">
                        <ul>
                           <li>
                             <div class = "Ico_Contact_General Phone"></div>
                             <div class =  "Phone_Records">
                                 <div class="PhoneRecord Big_Title_2 Super_Mini_2">
                                    <span id="Phone_Record">0745457478</span>
                                 </div>
                             </div>
                           </li>
                           <li>
                            <div class = "Ico_Contact_General Email"></div>
                            <div class="Email_Records">
                                <div class ="Email_Record Big_Title_2 Super_Mini_2">
                                   <span id="Mail_Record">alberto_car@yahoo.com</span>
                                </div>
                            </div>
                           </li>
                            <li>
                             <div class = "Ico_Contact_General Birthday"></div>
                             <div class =  "Date_Records Big_Title_2 Super_Mini_2">
                                 <div class="DateRecord">
                                    <span id="Data_Birth_Record">24 August 1993 </span>
                                 </div>
                             </div>
                           </li>
                        </ul>
                      
                 </div><!--EndOfDateContact-->

                 <div class ="Info">
                     <ul>
                         <li id="ad">
                             <div class=" SmallText Adr center">
                                <div class="center">
                                      <img src="<?php echo URL;?>Views/public/images/loc.jpeg">
                                 </div>
                                 <div class = "Name">
                                        <span id="pre"> Din: </span>
                                         <span id="Oras">Iasi</span> 
                                         <span id="Tara">Romania</span>
                                 </div>
                     
                            </div>
                         </li>
                         <li id="st">
                             <div class="SmallText Studii center">
                                <div class="center">
                                      <img src="<?php echo URL;?>Views/public/images/study.png">
                                 </div>
                                 <div class="Name">
                                      <span id="pr"> A studiat la: </span>
                                                              <br />
                                      <span id= "Liceu"></span>
                                      <span id= "Facultate"></span>
                                 </div>
                                
                            </div>
                         </li>
                     </ul>
                 </div>
             </div>
             <div class="Title Underlined">
                  Prieteni
              </div>
              <HR>
              <div class="List" id="photo_wrapper">
                
             </div>
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
                 
                         <a class="button3  " id="Status_Prietenie" onclick="UpdateFriends();"><pre></pre> </a>
                    <a href="#" onclick="ShowWhereToPost();">
              <img src="<?php echo URL;?>Views/public/images/down_arrow.png" class=" arrow_2 _right _mod" id="butt_fr" alt="bla"></a>
                      
                    </div>
                  
                  </div>

</div><!--End of page content-->
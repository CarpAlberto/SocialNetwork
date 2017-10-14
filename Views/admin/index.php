
            <div class="RightPage">
                <div id="PageAvatar" name="home" class="Black Margin_L">
                   <div id="TopAvatar"> 
                       <h2 id="title_avatar"></h2><br />
                       <img id="img_avatar" src="">
                           <form class="inline"  action=<?php echo $this->_level . 'edit/IndexEdit' ?> >
                                <a href="#" onclick="$(this).parent().submit()">Editeaza Profil</a>
                            </form>
                   </div> <!-- End of TopAvatar  -->
                    <div id="bottomAvatar">
                      <div class="BrowseFile">
                         <input type="file" id="fileInput" name="fileInput" />
                      </div>
                      <div class="center">
                         <a class="button3 Add_Icon" onclick="triggerClick('#fileInput')">Adauga o fotografie</a>
                      </div>
                   </div><!--EndOfBottomAvatar-->
                </div><!--EndOfPageAvatar-->
            </div>
            <div id="CenterPage">
                       <div class="Title_Adm">
                          <h1> Cauta Conturi </h1> 
                       </div>
                       <div class="Center_Right">
                          <div class="Title_Adm Min ">
                              <h1> Detalii</h1>
                          </div>
                          <div class="Box Auto Margin_T">
                            <div class="Title Medium Margin_B " id="boxDetails">
                                Nume:<span id="Nume" class="white_col">Carp</span> <br />
                                Prenume:<span id="Prenume" class="white_col">Alberto</span> <br />
                                Email:<span  id="Email" class="white_col">alberto_carp@yahoo.com</span> <br />
                                Hash:<span  id="hash" class="white_col">47587689576967589765896</span> <br />
                                Status:<span id="priv" class="white_col">Blocat</span> <br />
                            </div>
                       </div>
                       </div>
                       <div class="Center_Left">
                 
                          <div class="Title_Adm Min">
                            <h1> Conturi curente pe chat </h1>
                          </div>    
                          <nav>
                                  <ul id="Wrap_Users">
                                     
                                  </ul>
                          </nav>
                        <div class="Title_Adm Min">
                            <h1> Conturi blocate pe chat </h1>
                          </div>
                  
                 <nav>
                    <ul id="Wrap_Blocked">
                                     
                    </ul>
                </nav>
              </div>
            </div><!--End of Centere Page-->
	           <div id="LeftPage">
                  <div class="Title_Adm Margin_B">
                    <h1><pre> </pre></h1>
                  </div>
		             <div class="Title_Adm Min" id="arh_msg">
                    <h1> Arhiva mesaje </h1>
                  </div>
                  <div class="Box_auto">
                      <div id="Wrap_Msgs" >
                         
                      </div>
                          
                      </div>
                  </div>
            </div>
  </div><!--EndOfPageContent-->
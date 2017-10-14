<div id="CenterPage">
                <div class="Box_auto" id="search">
                   <div class="BigTitle_2 Mini center">
                        Cautare avansata useri
                   </div>
                     <div class="Box_auto Min_Height" id="head_a_useri">
                          <div class="BigTitle_2 Super_Mini sh_black">
                          <hr>
                           <div class="search_item">
                              Cauti : <input type="checkbox" id="sex_check">
                              <div class="_right Super_Mini_2">
                                  <input type="radio" id="btn_sex_barbat" name="sex"/>Barbat
                                  <input type = "radio" name="sex"/>Femeie
                              </div>
                            </div>
                            <div class="search_item">
                            <hr>
                              Varsta: <input type="checkbox" id="age_check">
                               <div class="_right Super_Mini_2">
                                  <input name="varsta" type="radio" id="1_tn"/> sub 15 ani
                                  <input name="varsta" type="radio" id="2_tn"/> 15-20 ani
                                  <input name="varsta" type="radio" id="3_tn"/> 20-25 ani
                                  <input name="varsta" type="radio" id="4_tn"/> 25-30 ani
                                  <input name="varsta" type="radio" id="5_tn"/> peste 30 ani
                               </div>
                            </div>
                            <hr>
                            <div>
                              Email: <input id="email_check"  type="checkbox">
                               <div class="_right Super_Mini_2">
                                  <input type="email" class="TextInput" id="email_input" placeholder="Emailul"/>
                               </div>
                            </div>
                             <hr>
                          <div>
                              Adresa: <input type="checkbox" id="check_locatie">
                               <div class="_right Super_Mini_2">
                                  <input type="text" id="input_locatie" class="TextInput" placeholder="Orasul,localitatea aici"/>
                               </div>
                            </div>
                            <div>
                            <hr>
                            Studii: <input type="checkbox" id="check_studii">
                               <div class="_right Super_Mini_2">
                                  <input type="text" class="TextInput" id="input_studii" placeholder="Liceu,facultate aici"/>
                               </div>
                            </div>
                             <hr>
                          </div>
                            <div class="center">
                              <input type="submit" class="button3 " value="          cauta         " onclick="Advanced_Search()">
                              </div>
                          </div>
                      </div>
                      <div id="HiddenResult" class="hide center">
                         <div class="Title"><pre>    <input class="button3" type = "submit" value="Inapoi" onclick="$('#search').addClass('show');$('#search').removeClass('hide');$('#HiddenResult').addClass('hide');$('#HiddenResult').removeClass('show')">  </pre> </div>
                          <div class="Title" id="title_res">
                               Rezultate
                          </div>
                          <div id="NoResults">
                            Nu exista niciun rezultat care sa corespunda cautarilor
                          </div>
                          <div class="List">
                             
                          </div>
                      </div>
                      </div>
                </div>
	            <div id="LeftPage">
                <div id="PageAvatar" name="home" class="Black">
                   <div id="TopAvatar"> 
                       <a href="../../user/index.html"><h2>User</h2><br /></a>
                         <a onclick="Popup('FullScreen')">
                            <img src="../../../public/images/user.jpg"/>
                        </a>
                        <div class="center" id="popIM">
                            <div class="_pupUp" id="FullScreen">
                                <form class="form" action="#" id="im">
                                    <img  class="img" id="cancel" onclick="Hide('FullScreen')"/>
                                    <img class="Super_Big_Image" src = "../../public/images/resources/Alberto_Carp_Max.jpg" /> 
                                </form>         
                              </div>
                          </div>

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
                <br>
                <div class="Box Auto Bordered" id="grupuri">
                  <h2 id="title_groups">Grupuri</h2><br />
                  <ul  class="groups_item">
                           <a class="group_item" href = "#">
                                 <li>Familie</li> 
                           </a>
                           <a class="group_item" href="#"> 
                                 <li>Academia Tehnica</li>
                           </a>
                  </ul>
                  <div class="center">
                      <a class="button3 Add_Icon" id="add_g" onclick="Add_Group();" href="#">Adauga grup nou</a>
                      <div id="Add_Group_Div">
                       <form class="form" action="#" id="ad_group">
                            <img src="../../../public/images/close_2.png" class="img" id="cancel" onclick="Close();" />
                            <h3 class="Title" id="add_g_title">Adauga un grup Nou</h3>
                            <label class="Title Medium">Numele Grupului:</label>
                                  <input type="text" class="TextInput" id="name" placeholder="Name"/> <br />
                            <label class="Title Medium">Introduceti persoanele pe care doriti sa le adaugati: </label>
                                       <input type="text" placeholder="Adauga Useri"   class="TextInput Search_Add_g"/> <br />
                            <input type="button" class="button3 right" id="creeaza" onclick="Close();" value="Creeaza"/>
                            <input type="button" class="button3 right" id="renunta" onclick="Close();" value="Renunta"/>
                            <br/>
                        </form>
                      </div>  
                  </div>
                </div>
              </div><!--EndOfLeftPage-->
              </div><!--EndOfPageContent-->
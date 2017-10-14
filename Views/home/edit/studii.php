
         <div id="CenterPage">
            <div class="Box_auto Underlined Margin_B Margin_T" >
               <div class="Title ShadowTitle Underlined">
                  Facultate:
              </div>
               <div class="Box_Auto Padded">
                 <ul>
                    <li id="Edit_Faculty">
                         <div class="Box_60p_80px _right SmallText " name="Phone">
                                <div class="Box_30p_30p _right">
                                    <a id="link_faculty" class="Link" href="#" 
                                    onclick="$('#hidden_faculty').show();
                                    $('#link_faculty').hide();
                                    return false;">Editeaza</a>
                             </div>
                         </div>
                        <div class="Title Medium _left">
                           <span id="Facultate"></span>
                        </div>
                    </li>
                </ul>
                <div class="Box_60p_80px _right SmallText hide Big_2" id="hidden_faculty" name="Phone"> 
                          <input type="text" id="txtBoxFacultate" class="TextInput" placeholder="Introduceti facultate"/> 
                          <input class="button" onclick="UpdateFacultate();return false;" type="submit" value="Salveaza Modificarile"/> 
                          <input class="button" onclick="$('#hidden_faculty').hide();
                                    $('#link_faculty').show();
                                    return false;" type="submit" value="Renunta"/> 
               </div>
              </div>
          </div>
          <div class="Box_auto Underlined Margin_B Margin_T" >
               <div class="Title ShadowTitle Underlined">
                  Liceu:
              </div>
               <div class="Box_Auto Padded">
                 <ul>
                    <li id="Edit_HighSchool">
                         <div class="Box_60p_80px _right SmallText" name="Phone">
                                      <div class="Box_30p_30p _right">
                                          <a id="link_highschool" class="Link" href="#" 
                                          onclick="$('#hidden_highschool').show();
                                          $('#link_highschool').hide();
                                          return false;">Editeaza</a>
                                      </div>
                         </div>
                        <div class="Title Medium _left">
                             <span id="Liceu"></span>
                        </div>
                    </li>
                </ul>
                 <div class="Box_60p_80px _right SmallText hide Big_2" id="hidden_highschool" name="Phone"> 
                       <input type="text" id="txtBoxLiceu" class="TextInput" placeholder="Introduceti Liceul"/> 
                       <input class="button" onclick="UpdateLiceu();return false;" type="submit" value="Salveaza Modificarile"/> 
                      <input class="button" onclick="$('#hidden_highschool').show();
                                    $('#link_highschool').show();
                                    return false;" type="submit" value="Renunta"/>  
                </div>
              </div>
          </div>
          </div>
           <div id="LeftPage">
           <div id="HeaderProfile" class="BigTitle_2 Super_Mini">
               Profil
               <hr>
            </div>
            <nav id="Vertical">
                <ul>
                   <li class="button active"> <form class="inline" action="IndexEdit" method="post"> <a href="#" onclick="$(this).parent().submit()">
                                    <span class="Small_Cursive">Prezentare Generala </span></a></form></li>
                   <li class="BigTitle Padding button"> <form class="inline" action="InfoEdit" method="post"> <a href="#" onclick="$(this).parent().submit()">
                                    <span class="Small_Cursive">Informatii de contact</span> </a></form></li>
                   <li class="BigTitle Padding button"> <form class="inline" action="RelatiiEdit" method="post"> <a href="#" onclick="$(this).parent().submit()">
                                    <span class="Small_Cursive">Familie si relatii</span> </a></form></li>
                  <li class="BigTitle Padding button"> <form class="inline" action="StudiiEdit" method="post"> <a href="#" onclick="$(this).parent().submit()">
                                    <span class="Small_Cursive">Studii</span> </a></form></li>
               </ul>
            </nav>
        </div>
        </div><!--END of page content-->

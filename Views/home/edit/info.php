<div id="CenterPage">
            <div class="Box_100p_400px Underlined" >
               <div class="Title ShadowTitle Underlined">
                  Date de contact
              </div>
                     <div class="Box_auto Underlined">
                               <ul>
                                  <li id="EditPhone">
                                        <div class="Box_60p_80px _right SmallText" name="Phone">
                                                  <div class="Box_30p_30p _right">
                                                      <a class="Link" href="#" id="link_edit_phone" onclick="$('#hidden_phone').show();$('#link_edit_phone').hide();return false;">Editeaza</a>
                                                  </div>
                                                  <div class="Box">
                                                      <ul>
                                                         <li class="Number">
                                                            <span id="Phone_Record">0745457478</span>
                                                        </li>
                                                      </ul>
                                                  </div>
                                        </div>
                                      <div class="Title ShadowTitle Medium _left">
                                          Telefon Mobil
                                      </div>
                                  </li>
                              </ul>
                           <div class="Box_20p_100p hide" id="hidden_phone"> 
                              <input type="text" class="TextInput" id="textPhone"/> 
                              <input type="submit" class="button" value="Update" onclick="UpdatePhone($('#textPhone').val().trim()); " /> 
                              <input type="submit" class="button" value="Renunta" onclick="$('#hidden_phone').hide();$('#link_edit_phone').show(); return false;"/> 
                          </div> 
                        </div>
                      
                  <div class="Box_auto Underlined">
                   <ul>
                    <li id="Edit_Mail">
                            <div class="Box_60p_80px _right Underlined SmallText" name="Email">
                                      <div class="Box_30p_30p _right">
                                          <a class="Link"  href="#"  id="link_edit_mail" 
                                          onclick="$('#hidden_mail').show();
                                                  $('#link_edit_mail').hide();
                                                  return false;">Editeaza</a>
                                      </div>
                                      <div class="Box">
                                        <ul>
                                          <li class="Email">
                                              <span id="Mail_Record"></span>
                                          </li>
                                      </ul>
                                      </div>
                            </div>
                             <div class="Title ShadowTitle Medium _left">
                                Adresa E-mail
                            </div>
                      </li>
                 </ul>
                 <div class="Box_20p_100p hide" id="hidden_mail"> 
                              <input type="text" class="TextInput" id="textMail"/> 
                              <input type="submit" class="button" value="Update" onclick="UpdateEmail($('#textMail').val().trim()); " /> 
                              <input type="submit" class="button" value="Renunta" onclick="$('#hidden_mail').hide();$('#link_edit_mail').show(); return false;"/> 
                 </div> 
            </div>
             <div class="Box_auto Underlined">
              <ul>
                  <li id="Mod_Adress">
                       <div class="Box_60p_80px _right SmallText" name="Phone">
                                        <div class="Box_30p_30p _right">
                                            <a id="link_edit_adress" class="Link" href="#" onclick="$('#hidden_address').show();$('#link_edit_adress').hide();return false;">Editeaza</a>
                                        </div>
                                        <div class="Box_Adresa">
                                                <span id="oras"> </span> 
                                                <span id="tara"> </span>
                                        </div>
                        </div> 
                        <div class="Title ShadowTitle Medium _left">
                              Adresa
                        </div>
                  </li>
              </ul> 
                 <div class="Box_20p_100p hide Big_2" id="hidden_address" name="Phone"> 
                      <label>Tara:</label><br/><input class="TextInput" id="loc" type="text"/><br/> 
                      <label>Oras:</label><br/><input class="TextInput" id="oras2" type="text"/> 
                      <div class="btn_weap"> 
                          <input type="submit" class="button" value="Update" onclick="UpdateOrasTara($('#oras2').val().trim(),$('#loc').val().trim());"/>
                          <input type="submit" class="button" value="Renunta" onclick="$('#hidden_address').hide();$('#link_edit_adress').show(); return false;"/> 
                     </div> 
                </div> 
           </div>
        </div>
        <div class="Box_100p_400px Underlined">
           <div class="Title ShadowTitle Underlined">
                  Informatii generale
          </div>     
           <div class="Box_auto Underlined">
                <ul>
                    <li id="Mod_Birthday">
                         <div class="Box_60p_80px Big_2 _right SmallText" name="Phone">
                                          <div class="Box_30p_30p _right">
                                              <a id="link_edit_birth" class="Link" href="#" onclick="$('#hidden_birth').show();$('#link_edit_birth').hide();return false;">Editeaza</a>
                                          </div>
                                          <div class="Box ">
                                              <span id="Ziua"></span> 
                                              <span id="Luna"></span> 
                                              <span id="An"></span> 
                                          </div>
                          </div>
                         <div class="Title ShadowTitle Medium _left">
                               Data Nasterii 
                         </div>          
                    </li>
                </ul> 
                <div class="hide" id="hidden_birth">
                        <div class="Box_Auto _right SmallText" name="Phone"> 
                                <form name="FRM" id="data_picker" class="center"> 

                                </form> 
                        </div> 
                        <div class="Box_60p_80px _right SmallText Big_3 " name="Phone"> 
                              <input type="submit" class="button" value="Update" onclick="UpdateBirth()"/>
                              <input type="submit" class="button" value="Renunta" onclick="$('#hidden_birth').hide();$('#link_edit_birth').show(); return false;"/> 
                        </div>
                </div>
                </div>
            <div class="Box_auto Underlined">
              <ul>
                  <li id="Mod_Sex">
                    <div class="Box_60p_80px _right SmallText" name="Phone">
                                        <div class="Box_30p_30p _right">
                                            <a id="link_edit_sex" class="Link" href="#" onclick="$('#hidden_sex').show();$('#link_edit_sex').hide();return false;">Editeaza</a>
                                        </div>
                                        <div class="Box " id="sex">
                                           
                                        </div>
                     </div>
                    <div class="Title ShadowTitle Medium _left"> 
                           Sex 
                    </div> 
               </li>
              </ul> 
              <div class="hide" id="hidden_sex">
                  <div class="Box_60p_80px Big_3 _right SmallText">
                            <form> 
                               <select id="soflow-color" name="sex"> 
                                   <option>Masculin</option> 
                                   <option>Feminin</option> 
                               </select> 
                            </form>
                   </div> 
                     <div class="Box_60p_80px _right Big_3 SmallText" name="Phone"> 
                          <input class="button" type="submit" onclick="UpdateSex()" value="Update"/> 
                          <input class="button" type="submit" value="Renunta" onclick="$('#hidden_sex').hide();$('#link_edit_sex').show(); return false;"/> 
                     </div>
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
<div id="CenterPage">
            <div class="Box_100p_400px Underlined" >
               <div class="Title ShadowTitle Underlined">
                  Relatie
              </div>
               <div class="Box_auto Underlined">
                 <ul>
                    <li id="EditPhone">
                         <div class="Box_60p_80px _right SmallText Big_2" name="Phone">
                                      <div class="Box_30p_30p _right" id="edit_rel" >
                                          <a id="link_edit_relatie" onclick ="$('#relatie_select_hidden').show();$('#link_edit_relatie').hide();return false;" class="Link" href="#">Editeaza</a>
                                      </div>
                         </div>
                         <div class = "Ico_Contact_General Relatie">
                             
                         </div>
                        <div class="Title Medium" id="Relatie_">
                           Singur
                        </div>
                    </li>
                </ul>
                   <div class="Box_60p_80px  Big_4 _right SmallText hide" id="relatie_select_hidden">
                            <label class="Title Medium rel">Schimba statusul:</label>
                            <form> 
                               <select id="soflow-color" class="_left" name="relatie"> 
                                   <option>Nespecificat</option> 
                                   <option>Intr-o relatie</option> 
                                   <option>Intr-o relatie complicata </option> 
                                   <option>Vaduv/a</option>
                                   <option>Logodit/a</option>
                                   <option>Singur/a </option>
                                   <option>Casatorit/a</option>
                                   <option>Despartit/a </option>
                                   <option>Divortat/a </option>
                               </select> 
                            </form>
                            <div class="_right SmallText " name="Phone"> 
                               <input class="button" type="submit" onclick="UpdateRelatie()" value="Update"/> 
                               <input class="button" type="submit" value="Renunta" onclick="$('#relatie_select_hidden').hide();$('#link_edit_relatie').show(); return false;"/> 
                     </div>
                   </div> 
              </div>
          </div>
          <div class="Box_100p_400px Underlined" >
               <div class="Title ShadowTitle Underlined">
                  Familie
              </div>
               <div class="Box_auto Underlined">
                   <ul>
                     <li id="EditFamily">
                        <div class="Box_60p_80px _right SmallText" name="Phone">
                           <div class="Box_30p_30p _right ">
                                  <a id="link_family" class="Link" href="#" 
                                  onclick="$('.hidden_family').show();
                                     $('#link_family').hide();
                                      $('#fam_bot').show();
                                     return false;">Editeaza</a>
                           </div>
                           </div>
                          <div class="Box_auto" id="Wrapper_Relatie">
                          </div>
                          <div class="hide" id="fam_bot">
                              <input type="checkbox" name="add_f"/>
                              <label>Membru Nou:</label><br/><input class="TextInput" id="loc" type="text"/><br/> 
                              <form class="hide hidden_family"> 
                                    <select id="soflow-color" class="_right Item_Familie" name="familie"> 
                                           <option>Frate</option> 
                                           <option>Sora</option> 
                                           <option>Mama </option> 
                                           <option>Tata</option>
                                           <option>Nepot</option> 
                                           <option>Unchi</option> 
                                           <option>Bunic </option> 
                                           <option>Var</option>
                                   </select> 
                                 </form>   
                              <div class="_right"> 
                                  <input type="submit" class="button" value="Update" onclick="UpdateFamilie();"/>
                                  <input type="submit" class="button" value="Renunta" onclick="$('#hidden_address').hide();$('#link_edit_adress').show(); return false;"/> 
                             </div> 
                          </div>
                    </li>
                    </ul>
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
</div>

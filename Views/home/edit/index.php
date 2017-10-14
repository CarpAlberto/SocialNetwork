<div id="CenterPage">
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
                        <form class="inline" action = "../edit/InfoEdit">
                             <a  onclick="$(this).parent().submit()" class="SmallText Link">Modifica Date </a>
                        </form>
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
                                  <form class="inline" action = "../edit/StudiiEdit">
                                     <a onclick="$(this).parent().submit()" class="SmallText Link">Editeaza Locatia </a>
                                  </form>
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
                                  <form class="inline" action = "../edit/InfoEdit">
                                     <a onclick="$(this).parent().submit()" class="SmallText Link">Editeaza Locatia </a>
                                  </form>
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
        </DIV>
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

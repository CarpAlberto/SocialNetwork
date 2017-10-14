<div class="PageContent" id="search_box">
        <form action="<?php echo URL;?>signup/Finish_Signup" method="post" onsubmit="Check_Finalizing_Data.call(this,event);return(false);" enctype="multipart/form-data">
             <div class="BigTitle Mini Margin">
                Completeaza campurile de mai jos pentru a avea un profil mai bun:
             </div>
             <div id="Details">
                  <div class="Margin_B">
                      <h3 class="Small_Cursive black center Margin_B"> Data Nasterii: </h3>
                      <center>
                         <div name="FRM" id="data_picker">
                          
                          </div>
                      </center>
                </div> <!--EndOfMarginB-->
                <div class="Margin_B">
                    <h3 class="Small_Cursive center black Margin_B">
                      Telefon:
                    </h3>
                    <div class="center">
                        <input class="TextInput Width_50 center" type="text" name="phone" onblur="isPhoneValid(this,getElementById('phone_help'))"/><br />
                        <span id="phone_help"></span>
                    </div>
                </div><!--EndOfPhone-->
                <div class="Margin_B center">
                      <h3 class="Small_Cursive center black Margin_B">Selectati tara:</h3>
                      <select class = "soflow yellow Width_50 center" id="country" name="country">
                        
                      </select>
                    <h3 class="Small_Cursive center black Margin_B">Selectati orasul:</h3>
                         <select class = "soflow yellow Width_50 center" name="state" id="state">
                    </select>
            
                </div>
            <div  class="center">
                     <h3 class="Small_Cursive center black Margin_B">
                      Upload Fotografie
                    </h3>
                      <input type="file" name="file" value="Browse" size="80" id="i_file" onchange="UploadImage.call(this,event)">
                    <div id="PreviewPhoto"> 
                      <img src="" width="270" height="100px" style="display:none;" />
                    </div>
              </div><!--EndOfPhoto-->

             <div class="center Margin">
                  <input id="inreg_f" name="submit" type="submit" class = "button Smile_Icon" value="Inregistrare!"/>
                  <a href="../index.html">Sari peste acest pas </a>
             </div>
              <div id="error_inregistrare" class="black_col">
             <div class="center">
                 <img src = "<?php echo URL;?>Views/public/images/sad.png">
              </div>
              <div > Erori : </div>
             <pre id="errors">
               
             </pre>
        </div>
        </div> <!--EndOfDetails-->
           
      </form>
</div><!--EndOfPageContent-->

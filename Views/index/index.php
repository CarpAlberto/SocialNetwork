<div class = "PageContent">
  <div class="RIGHT">
    <div class = "FormaAutentificare rounded">
      <form action="#" method="POST" onsubmit="return LoginWebService();">
          <p id="LabelNew"><span>Autentificare! </span></p>
          <hr>
          <input id = "Username" class="TextInput" name="Mail_Login" type="text" value="" placeholder="Introduceti Emailul!" onblur="isEmailValid(this,getElementById('username_help'))"/><br />
          <span id ="username_help"></span><br />
          <input id = "Password" class="TextInput" type="password" name="Parola_Login" value= "" placeholder = "Introduceti parola!" onblur="isPasswordValid(this,getElementById('pass_help'))"/>
          <input id = "Submit" class="button Margin" type="submit" name="submit" value = "Logare"/> <br />
          <span id ="pass_help"> </span><br />
              <label id = "CheckBox">
                   <input type="checkbox" checked/>Pastreaza-ma autentificat!
              </label>
          <a href="login/Password_Recovery/index.html" >Ati uitat parola?</a>
      </form>
    </div><!--EndOfFormaAutentificare-->

     <div class = "FormaInregistrare rounded">
         <form id="inregForm" action="<?php echo URL;?>signup/VerifyMail/" method="post" onsubmit="Check_Existing_Mail.call(this,event);return(false)">
            <p id="LabelNew"><span>Nu ai inca cont? </span>Sign Up!</p>
             <hr>
            <input id = "Name" name="Nume" type="text" class="TextInput" placeholder="Introduceti numele!" value="" onblur="isNameValid(this,getElementById('name_help'))"/><br />
             <span id ="name_help"> </span><br />
             <input id = "Name" name="Prenume" type="text" class="TextInput" placeholder="Introduceti prenumele !" value="" onblur="isNameValid(this,getElementById('name_help'))"/><br />
             <span id ="name_help"> </span><br />
            <input id = "Password" name="Parola" class="TextInput" type="password" name="pass" value="" placeholder = "Introduceti parola!" onblur="isPasswordValid(this,getElementById('pass2_help'))"/> <br/>
            <span id ="pass2_help"> </span><br />
            <input id = "Email" name="Email" class="TextInput" type="email" name="email" placeholder="Introduceti mailul!"  onblur="isEmailValid(this,getElementById('email_help'))"/><br />
            <span id ="email_help"> </span> <br />
            <input id = "Submit" class="button" name="submit" type="submit" onclick="" value = "Inregistrare!"/>
            <input type="radio" checked="true"  name="sex"/><span class="white_col">Barbat</span>
            <input type="radio" checked="false" class="white_col" name="sex"/><span class="white_col">Femeie</span>
        </form>
     </div> <!--EndOfFormaInregistrare-->
      <div id="error_inregistrare">
             <div class="center">
                 <img src = "<?php echo URL;?>Views/public/images/sad.png">
              </div>
              <div > Erori : </div>
             <pre id="errors">
               
             </pre>
        </div>
  </div>  <!--END of RIGHT -->

     <div class="LEFT">
      <div id = "FrontWelcomeText">
             <h2 class="BigTitle_2"> Bine ati venit la Atm Chat!<br /></h2>
          <section>
             <p> Conecteaza-te cu prietenii si alti oameni fascinanti.Fii la curent <br />
             cu ultimile noutati si priveste tot ce te intereseaza din orice pozitiw.<br />
             </p>
          </section>
      </div>
    </div> <!--End Of Left-->
  </div> <!--EndOfPageContent-->
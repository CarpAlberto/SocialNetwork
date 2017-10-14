<div class="PageContent">
       <div id="TitleLoginFailed">
           Oops!Numele de utilizator sau parola au fost introduse incorect
       </div>
       <div class="FormaLogare" id="LogError">
          <h1>Autentificare nereusita!</h1>
          <form action="<?php echo URL;?>login/OnLogin/" method="post">
                <div id="boxUsername">
                <input type="text" 
                       class="text" 
                       name="Mail_Login"
                       id="username"
                       placeholder="Introduceti e-mailul!"
                       onblur="isUsernameValid(this,getElementById('username_help'))" />
                      <span id="username_help"> </span>
              </div>
              <div id="boxPassword">
                <input type="password" 
                id="password"
                name="Parola_Login"
                placeholder="Introduceti parola!"
                onblur="isPasswordValid(this,getElementById('pass_help'))" 
                 />
               <span id="pass_help"> </span>
              </div>  
             <div id ="ForgetPass">
              <h3>
                 <a href="../login/Password_Recovery/index.html">
                   Ati uitat parola?
                 </a>
               </h3>
              <input type="submit" value="Sign In" />
                   <a href="#" class=" icon_arrow">
                </a>
            </div>
          </form>
       </div>
    </div> <!--EndOfPageContent-->
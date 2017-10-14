<!docktype html>
<html>  
<head>
 <title>Home</title>
     <!--Pt a spune dispozitivelor mobile sa dezvaluie adevarata  dimensiune(latime)-->
     <meta name="viewport" content="width = device-width,initial-scale=1,maximum-scale=1">
    <!--  Adaug link catre  o versiune a jquery-->
     <link  href= "<?php echo URL;?>Views/public/css/libs/jquery-ui.css" rel="stylesheet">
     <script src ="<?php echo URL;?>Views/public/js/libs/jquery.js"></script>
     <script src ="<?php echo URL;?>Views/public/js/libs/jquery-ui.js"></script>
     <script src ="<?php echo URL;?>Views/public/js/libs/jquery.nicescroll.js"></script>
     <script src ="<?php echo URL;?>Views/public/js/libs/jquery.linkify.min.js"></script>
     <script src ="<?php echo URL;?>Views/public/js/libs/jquery.livequery.js"></script>
     <?php
             if(isset($this->_JS))
        {
            foreach ($this->_JS as $js)
            {
              echo '<script type="text/javascript" src="'.URL.'Views/public/js/'.$js.'"></script>';
            }
        }
      ?>
    <!-- Linkez fisierele javascript aditionale -->
    <link href="<?php echo URL;?>Views/public/css/basic/reset.css"        rel="stylesheet">
    <link href="<?php echo URL;?>Views/public/css/basic/helpers.css"      rel="stylesheet">
    <link href="<?php echo URL;?>Views/public/css/basic/text.css"         rel="stylesheet">
    <link href="<?php echo URL;?>Views/public/css/basic/boxes.css"        rel="stylesheet">

     <!--Linkez catre fonturile publice--> 
    <link href="http://fonts.googleapis.com/css?family=Just+Another+Hand" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" type="text/css">
     <?php
  
        if(isset($this->_CSS))
        {
            foreach ($this->_CSS as $css) {
              echo '<link rel="stylesheet" href="'.URL.'Views/public/css/'.$css.'">';
  
            }
        }
        if(isset($this->_Ajax))
        {
            foreach ($this->_Ajax as $js)
            {
              echo '<script type="text/javascript" src="'.URL.'Views/public/ajax/'.$js.'"></script>';
            }
        }
    ?>
     <link href="<?php echo URL;?>Views/public/css/basic/colors.css"       rel="stylesheet">
     <link href="<?php echo URL;?>Views/public/css/basic/controllers.css"  rel="stylesheet">

</head>
     <body> 
    <div class="PageContainer">
        <header>
           <div class="language">
            <span>Limba: </span>
                <select id="select" width="20px" onchange = "var a = window.location.href;run(a);">
                   <form class="black">
                      <option id="romana" value="romana">Romana</option>
                      <option id="english" value="english">English</option>
                   </form>
                </select>
          </div>
            <form class="inline" id ="LogoMini" action=<?php echo $this->_level . 'home' ?> >
              <a href="#" onclick="$(this).parent().submit()"> <img src = "<?php echo URL;?>Views/public/images/logo.jpeg" alt = "logo"/></a>
            </form>
             <hgroup>
                  <h1 class="BigTitle Mini">ATM Chat</h1>
              </hgroup>
              <div>
                 <form class="inline" action=<?php echo $this->_level . 'Advanced_Search/Index' ?> method="post" >
                      <input class="Search TextInput" type="text" placeholder = "Cauta Useri,Grupuri"/>
                      <a id="lucky" href = "#" class="Link" onclick="$(this).parent().submit()">Ma simt norocos</a>
                 </form>
              </div>
              <div id = "GoProfile">
                    <form class="inline" action=<?php echo $this->_level .'user/User'?> method="post">
                          <a href="#" title="Pagina Profil" onclick="$(this).parent().submit()"> 
                          <img src="<?php echo URL;?>Views/public/images/profile.jpeg"></img> </a>
                    </form>
                    <form class="inline" action=<?php echo $this->_level . 'message/message' ?> method="post">
                       <a href="#" title="Mesaje" onclick="$(this).parent().submit()";>
                        <img src="<?php echo URL;?>Views/public/images/message.png"></img></a>
                    </form>
                      <form class="inline" method="post" action=<?php echo $this->_level . 'login/OnLogout' ?> >
                         <a href="#" title="Logout" onclick="$(this).parent().submit();">
                         <img src="<?php echo URL;?>Views/public/images/logout.png"></img></a>
                      </form>
              </div>
              <ul id="nav">
                  <li id="notification_li" class="not_pos">
                      <span id="notification_count" class="hide"></span>
                         <a href="#" class="notif_base notif_icon" id="seen_notif"></a>
                        <div id="notificationContainer">
                             <div id="notificationTitle">Notificari</div>
                        <div id="notificationsBody_2" class="notifications">
                           <ul> 
                           </ul>
                        </div>
                        <div id="notificationFooter"><a href="#">Vezi Tot</a></div>
                        </div>
                  </li>
                   <li id="notification_li_f">
                          <span id="notification_count_p" class="hide"></span>
                          <a href="#" class="notif_base friends_icon" id="seen_req"></a>
                          <div id="friends_requestContainer">
                             <div id="notificationTitle">Cereri de prietenie</div>
                             <div id="notificationsBody" class="notifications">
                                 <ul> 
                                     
                                  </ul>
                            </div>
                            <div id="notificationFooter"><a href="#">Vezi Tot</a>
                            </div>
                        </div>
                  </li>
              </ul>
         </header>
           
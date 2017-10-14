<!docktype html>
<html lang="ro">
     <head>
         <!--Titlul paginii index.html -- >
       <title>
         <?php
            if(isset($this->title))
              $this->title;
            else
              'Chat';
         ?>
       </title>
     <!--Pt a spune dispozitivelor mobile sa dezvaluie adevarata  dimensiune(latime)-->
     <meta name="viewport" content="width = device-width,initial-scale=1,maximum-scale=1">
     <!--Adaug link catre  o versiune a jquery-->
       <link  href= "<?php echo URL;?>Views/public/css/libs/jquery-ui.css" rel="stylesheet">
     <script src ="<?php echo URL;?>Views/public/js/libs/jquery.js"></script>
     <script src ="<?php echo URL;?>Views/public/js/libs/jquery-ui.js"></script>
    <script src ="<?php echo URL;?>Views/public/js/libs/sha256.js"></script>
       <!--Link-urile catre css-urile din folderle locale basic  -->
    <link href="<?php echo URL;?>Views/public/css/basic/reset.css"    rel="stylesheet">
    <link href="<?php echo URL;?>Views/public/css/basic/controllers.css"      rel="stylesheet">
    <link href="<?php echo URL;?>Views/public/css/basic/colors.css"      rel="stylesheet">
    <link href="<?php echo URL;?>Views/public/css/basic/text.css"     rel="stylesheet">
    <link href="<?php echo URL;?>Views/public/css/basic/boxes.css"     rel="stylesheet">
    <link href="<?php echo URL;?>Views/public/css/basic/helpers.css"     rel="stylesheet">
         <script src ="<?php echo URL;?>Views/public/js/libs/jquery.linkify.min.js"></script>
     <script src ="<?php echo URL;?>Views/public/js/libs/jquery.livequery.js"></script>
     <!--Linkez catre fonturile publice--> 
    <link href="http://fonts.googleapis.com/css?family=Just+Another+Hand" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" type="text/css">


    <?php
        if(isset($this->_JS))
        {
            foreach ($this->_JS as $js)
            {
              echo '<script type="text/javascript" src="'.URL.'Views/public/js/'.$js.'"></script>';
            }
        }
        if(isset($this->_CSS))
        {
            foreach ($this->_CSS as $css) {
              echo '<link rel="stylesheet" href="'.URL.'Views/public/css/'.$css.'"></link>';
  
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
</head>
  <body>
  <div class = "PageContainer">
    <header>
        <div class="language">
            <span>Limba:</span>
                <select id="select" width="30px" onchange = "var a = window.location.href;run(a);">
                   <form class="black">
                     <option id="romana" value="romana">Romana</option>
                      <option id="english" value="english">English</option>
                   </form>
                </select>
          </div>
          <form class="inline" id ="LogoMini" action=<?php echo $this->_level . 'index' ?> >
              <a href="#" onclick="$(this).parent().submit()"> 
                 <img src = "<?php echo URL;?>Views/public/images/logo.jpeg" alt = "logo"/></a>
          </form>>
       <hgroup>
            <h1 class="BigTitle">atm chat</h1>
            <h2 class="BigTitle Mini">Web Developement Project </h2>
        </hgroup>
    </header> <!--EndOfHeader-->

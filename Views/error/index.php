<!DOCTYPE HTML>
<html>
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
     <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js'></script>
     <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js'></script>


     <script type="text/javascript"src = "<?php echo URL;?>Views/public/js/language.js"></script>
       <!--Link-urile catre css-urile din folderle locale basic  -->
    <link href="<?php echo URL;?>Views/public/css/basic/reset.css"    rel="stylesheet">
    <link href="<?php echo URL;?>Views/public/css/basic/controllers.css"      rel="stylesheet">
    <link href="<?php echo URL;?>Views/public/css/basic/collors.css"      rel="stylesheet">
    <link href="<?php echo URL;?>Views/public/css/basic/text.css"     rel="stylesheet">
     <link href="<?php echo URL;?>Views/public/css/basic/boxes.css"     rel="stylesheet">
      <link href="<?php echo URL;?>Views/public/css/basic/helpers.css"     rel="stylesheet">
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
    ?>
</head>
<body>
	<div class="PageContainer">
	    <header>
	    	<div class="language">
		      Limba:
				      <select id="select" width="20px" onchange = "var a = window.location.href;run(a);">
				         <form class="black">
				         	<option id="english" value="english">Romana</option>
				      	 	<option id="romana" value="romana">English</option>
				      	 </form>
				      </select>
		     </div>
	    </header>
		<div class="PageContent">
			<div class="logo">
				<h1><a href="#"><img src="<?php echo URL;?>Views/public/images/404.png"/></a></h1>
				<span>
				     <img src="<?php echo URL;?>Views/public/images/excl.png"/>Oops!Pagina solicitata nu a fost gasita!
				</span>
			</div> <!--End Of Logo-->
			<div class="buttom">
				<div class="seach_bar">
					<p>poti merge la <span>
					     <a href="#">Pagina_Principala</a></span>sau sa-ti pierzi timmpul cautand aici</p>
					<div class="search_box">
					<form>
					   <input type="text" value="Search"
					    onfocus="this.value = '';" 
					    onblur="if (this.value == '') {this.value = 'Search';}">
					    <input type="submit" value="Submit">
				    </form>
					</div><!--EndOfSearchBox-->
				</div><!--EndOfSearchBar-->
			</div>
		</div>
<!DOCTYPE html>
<html>
<?php
session_start();
require_once('i18n/Language.php');
Lang::initLang($_SESSION["lang"]);

if(!isset($_SESSION['id']) || $_SESSION["type"] != 3){
  header('Location: index.php');
}


include("config.php");

?>
<head>
    <?php include("header.php");?>
    <title>Espace personnel - COMMERCANT</title>
</head>

    </div><!--/#home-slider-->
    <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">
            <h1><img src="images/logo.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll"><a href="index.php"><?php Lang::i18n("home"); ?></a></li>
            <li class="scroll active"><a href="#"><?php Lang::i18n("myspace"); ?></a></li>
            <li class="scroll"><a href="deconnect.php"><?php Lang::i18n("deconnect"); ?></a></li>      
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

  <body>
    
    <script>
      
    </script>

</body>
</html>
    
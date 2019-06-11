<!DOCTYPE html>
<html>
<?php
session_start();
require_once('i18n/Language.php');
Lang::initLang($_SESSION["lang"]);

if(!isset($_SESSION['id']) || $_SESSION["type"] != 0){
  header('Location: index.php');
}
include("header.php");

include("config.php");

if(!isset($_POST["ok"])){
    $request = $bdd->prepare("SELECT * FROM USERS
    WHERE id=:id");
    $request->execute(array(":id"=>$_SESSION["id"]));
    
    $USER = $request->fetch();
}else{

    $prerequest=$bdd->prepare("SELECT id FROM SECTEUR WHERE cp = :cp");
    $prerequest->execute(array(
    ":cp"=>$_POST["cp"]
    ));
    
    $secteur = $prerequest->fetch();
    if(!isset($secteur["id"])){
        $err="<span style='color:red;'>".Lang::valueof("cantmatchcp")."</span>";
    }else{

        $request = $bdd->prepare("UPDATE USERS
        SET cp=:cp, fk_secteur=:secteur,nb_addr=:nb,voie_addr=:voie,tel=:tel
        WHERE id=:id ");
        $answer = $request->execute(array(":id"=>$_SESSION["id"],
        ":cp"=>$_POST["cp"],
        ":secteur"=>$secteur["id"],
        ":nb"=>$_POST["nb_addr"],
        ":voie"=>$_POST["voie_addr"],
        ":tel"=>$_POST["tel"],
        ));
        if($answer){
            $err="<span style='color:green;'>".Lang::valueof("updatedatas")."</span>";
        }
    }
    $USER = $_POST;   
}



?>
<head>
    <title><?php Lang::i18n("profileedit"); ?></title>
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
            <li class="scroll"><a href="espace_personel_particulier.php"><?php Lang::i18n("myspace"); ?></a></li>
            <li class="scroll active"><a href="#"><span class="glyphicon glyphicon-cog"></a></span></li>
            <li class="scroll"><a href="deconnect.php"><?php Lang::i18n("deconnect"); ?></a></li>      
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

  <body>

    <form method="POST" action="#" class="row">
    <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <h2><?php Lang::i18n("profileedit"); ?></h2>
        <p><?php echo $err;?></p>
        <input class="form-control" maxlength="10" placeholder="<?php Lang::i18n("phone"); ?>" type="phone" name="tel" value="<?php echo $USER["tel"]; ?>"/>
        <input class="form-control" placeholder="<?php Lang::i18n("noaddress"); ?>" type="number" name="nb_addr" value="<?php echo $USER["nb_addr"]; ?>"/>
        <input class="form-control" placeholder="<?php Lang::i18n("addressname"); ?>" type="text" name="voie_addr" value="<?php echo $USER["voie_addr"]; ?>"/>
        <input class="form-control"  maxlength="5" placeholder="<?php Lang::i18n("cedex"); ?>" type="text" name="cp" value="<?php echo $USER["cp"]; ?>"/>
        <input type="submit" class="btn btn-primary" name="ok" value="<?php Lang::i18n("send"); ?>">
      </div>
    </form>

    </body>
</html>
    
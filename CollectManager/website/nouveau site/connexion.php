<?php
session_start();
?>

<!DOCTYPE html>
<html>
<?php include("header.php");

require_once('i18n/Language.php');
if ( !isset( $_SESSION['lang'] ) )
{
    $_SESSION['lang'] = 'fr';
}
Lang::initLang($_SESSION["lang"]);
?>

<head>
	<title>Fight Food Waste</title>
</head>
<body>
  <section id="pageConnexion" class="parallax">
    <div class="container">
      <div class="row">
         <div class="heading text-center col-sm-8 col-sm-offset-3 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
         	<br/><br/>
              <?php

              if(isset($_GET['err'])){
                if($_GET['err'] == 1){
                  echo "<p style='color:red;'>";
                    Lang::i18n("wrongident");
                  echo "</p>";
                }
              }

              ?>
              <div>
              <form id="main-contact-form" name="contact-form" method="POST" action="treatment_connexion.php" class="row">
                <h2 style="text-align: left;color:black"><?php Lang::i18n('loggin'); ?></h2>
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-12 row">
                    <div class="col-sm-4">
                      <div class="form-group">
                      <select name="typeCon" class="form-control black" required="required">
                        <option value="" disabled selected><?php Lang::i18n('typecon'); ?></option>
                        <option value="staff"><?php Lang::i18n('staff'); ?></option>
                        <option value="technician"><?php Lang::i18n('technician'); ?></option>
                        <option value="adherent"><?php Lang::i18n('member'); ?></option>
                        <option value="volunteer"><?php Lang::i18n('volunteer'); ?></option>
                        <option value="trader"><?php Lang::i18n('trader'); ?></option>
                      </select>
                    </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="email" name="mail" class="form-control black" placeholder="<?php Lang::i18n('mail'); ?>" required="required">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="password" name="pwd" class="form-control black" placeholder="<?php Lang::i18n('password'); ?>" required="required">
                    </div>
                  </div>
                </div> 
                <div class="col-sm-4 col-sm-offset-2">                       
                <div class="form-group">
                  <button type="submit" class="btn-submit"><?php Lang::i18n('loggin'); ?></button>
                </div>
            </div>
              </form>
            </div>
</div>
</div>
</div>
</section>
</body>
</html>

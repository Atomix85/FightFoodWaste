
<!DOCTYPE html>
<html>
<head>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<?php include("header.php");?>
</head>
<body>
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
            <li class="scroll active"><a href="index.php">Home</a></li>
            <li class="scroll"><a href="index.php#services">Services</a></li> 
            <li class="scroll"><a href="index.php#about-us">About Us</a></li>                     
            <li class="scroll"><a href="index.php#portfolio">Portfolio</a></li>
            <li class="scroll"><a href="index.php#team">Team</a></li>
            <li class="scroll"><a href="inscription.php">S'inscrire</a></li>
            <li class="scroll"><a href="index.php#contact">Contact</a></li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->

<section id="team">
    <div class="container row ">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>Inscription</h2>
          <p>Quelle est votre situation ?</p>
        </div>
      </div>
      <dir class="col-sm-3"></dir>
      <div class="team-members col-sm-6">
        <div class="row">
          <div class="col-sm-6">
            <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="member-image">
                <a href="inscription_commercant.php"><img class="img-responsive" src="images/commercant.jpg" alt=""></a>
              </div>
              <div class="member-info">
                <h3>Je suis un commercants</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="800ms">
              <div class="member-image">
                <a href="inscription_particulier.php"><img class="img-responsive" src="images/adherent.jpg" alt=""></a>
              </div>
              <div class="member-info">
                <h3>Je suis un particulier</h3>
              </div>
            </div>
          </div>
        </div>
      </div>            
    </div>
  </section><!--/#team-->

     



</body>
</html>




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
            <li class="scroll"><a href="#services">Services</a></li> 
            <li class="scroll"><a href="#about-us">About Us</a></li>                     
            <li class="scroll"><a href="#portfolio">Portfolio</a></li>
            <li class="scroll"><a href="#team">Team</a></li>
            <li class="scroll"><a href="inscription.php">S'inscrire</a></li>
            <li class="scroll"><a href="#contact">Contact</a></li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->

 <section id="contact">
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>S'inscrire</h2>
            <p>Commercant</p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <form id="main-contact-form" name="contact-form" method="post" action="treatment_inscription_commercant.php">

            <div class="row">
              <div class="col-sm-6">

                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="Nom" required="required">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="fristname" class="form-control" placeholder="Prenom" required="required">
                    </div>
                  </div>


                </div>

                 <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Addresse mail" required="required">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                    </div>
                  </div>
                </div>

                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="tel" name="tel" class="form-control" placeholder="Telephone" required="required">
                    </div>
                  </div>

                  
                </div>

              </div>
             

              <div class="col-sm-6">

                <div class="form-group">
                  <input type="text" name="name_business" class="form-control" placeholder="Nom de l'entreprise" required="required">
                </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <input type="number" name="number_adress_business" class="form-control" placeholder="Numero de rue" required="required">
                </div>
              </div>

              <div class="col-sm-8">
                <div class="form-group">
                  <input type="text" name="adress_business" class="form-control" placeholder="Adresse de  l'entreprise" required="required">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <input type="number" name="postal_code" class="form-control" placeholder="Code Postal" required="required">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" name="country" class="form-control" placeholder="Pays" required="required">
                </div>
              </div>

              </div>
              <div class="col-sm-4 col-sm-offset-4">
                <div class="form-group">
                  <button type="submit" class="btn-submit">Send Now</button>
                </div>
              </div>


              </form>   
            </div>
          </div>
        </div>
      </div>
    </div>        
  </section><!--/#contact-->

     



</body>
</html>



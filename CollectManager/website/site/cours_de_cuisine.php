<?php
session_start();

//ini_set('display_errors',1);
?>
<!DOCTYPE html>
<html>
<?php include("header.php");
?>

<head>
  <title>20 conseils essentiels pour réduire le gaspillage de vos aliments</title>
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
</head>
<body>

  <?php
  include("isMember.php");

    if(isset($_SESSION['mail'])){
      $email = $_SESSION['mail'];
      if(isMember($email)==1){
        ?>
        <meta http-equiv="refresh" content="0; url=inscription_adherent.php">
        <?php
      }else{
        ?>
       

  <section class="panier parallax">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h1>20 conseils essentiels pour réduire le gaspillage de vos aliments</h1>


  <p> Dans le monde chaque jour, ce sont 25% des denrées alimentaires qui sont immédiatement jetées à la poubelle. Gaspiller, surtout de la nourriture, n’est ni écologique, ni acceptable d’un point de vue éthique.</p>

  <p>De plus, en amont de notre assiette se cache toute une production, consommatrice d’énergie, d’eau, et d’intrants (fertilisants, pesticides…) et productrice de déchets. Jeter signifie également enlèvement et transport, collecte et infrastructure des déchets, puis incinération. Toutefois, le <em>gaspillage alimentaire</em> ne concerne pas tous les aliments de la même manière : on gaspille davantage le pain, et en saison les fruits et légumes. Voici donc 20 astuces, simples mais incontournables, pour limiter le gaspillage alimentaire.</p>

  <h3>Les astuces pour limiter le gaspillage alimentaire</h3>
  <p>Dans l’ordre, voici 20 conseils qui vont permettre de réduire fortement votre gaspillage alimentaire. En France, chaque personne jette ainsi en moyenne 20 kg par an de produits comestibles, dont 7 kg encore emballés.</p>
</div>
</div>
</div>
</div>
</section>
 <section id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
        <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

  <h4>Achetez mieux !</h4>
  <ul>
    <li>Faites vos achats dans votre quartier, cela permet de gérer plus quotidiennement l’approvisionnement alimentaire et permet également un service mieux adapté à la demande : découpe, possibilité d’acheter des demi-pains, fruits et légumes en vrac.</li>
    <li>Rédiger votre liste de courses évite les achats impulsifs et permet de mieux adapter les achats aux repas prévus.</li>
    <li>Adaptez les quantités achetées au besoin de votre famille.</li>
    <li>Vérifiez les dates de péremption avant d’acheter vos aliments et transportez vos produits surgelés dans un sac isotherme ou achetez-les en dernier lieu pour respecter la chaîne de froid !</li>
    <li>Faites l’inventaire de votre frigo et de vos armoires à victuailles avant vos achats.</li>
    <li>Établissez les menus de la semaine en tenant compte de ce dont vous disposez déjà.</li>
  </ul>
    </div>
</div>
</div>
</div>
</section>

  <section class="panier parallax">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
  <h4>Conservez mieux les aliments !</h4>
  <ul>
    <li>Conservez les aliments frais au réfrigérateur à la température idéale (+5°C) et au congélateur (-18°C) pour les produits surgelés.</li>
    <li>Rangez à l’avant du frigo ce qui doit être mangé rapidement.</li>
    <li>Laissez refroidir vos restes 30 minutes avant de les conserver au réfrigérateur, sans attendre plus de deux heures pour des raisons sanitaires.</li>
    <li>Conservez vos restes de façon hermétique dans un récipient en verre afin d’éviter l’humidité qui entraînerait une surconsommation d’électricité, mais également une prolifération des bactéries et des odeurs.</li>
    <li>Avant d’entreposer des denrées dans votre congélateur, pensez à inscrire la date d’emballage.</li>
    <li>Ne remplissez pas complètement votre réfrigérateur pour faciliter la circulation d’air permettant de mieux gérer la température de vos aliments.</li>
    <li>Gérez votre stock de denrées alimentaires surgelées en mettant régulièrement au-dessus ou avant les dates les plus éloignées.</li>
  </ul>
  </div>
</div>
</div>
</div>
</section>

 
  <section id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
        <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">  <h4>Cuisinez les restes !</h4>
  <ul>
    <li>Cuisinez les restes !</li>
    <li>Faites de la compote ou des tartes avec vos fruits et légumes un peu abîmés ou trop mûrs ;</li>
    <li>Les restes de pâtes et de riz peuvent s’arranger en salade ou gratin.</li>
    <li>Les viandes et les poissons peuvent finir en hachis parmentier, en brochettes ou en croquettes</li>
    <li>Le pain peut facilement se décliner en pain perdu, en croûtons, en bruschetta ou en pan con tomate.</li>
    <li>Les blancs d’oeuf en meringue et les yaourts en gâteau ou en sauce à la ciboulette ou au concombre.</li>
    <li>Par ailleurs, il faut veiller à ne préparer que la quantité nécessaire ou même un peu moins, en vous basant sur votre expérience ou les dosages conseillés.</li>
    <li>Si vous n’utilisez pas tout le contenu d’une boîte ouverte ou d’un légume coupé, conservez-le dans un récipient.</li>

  </ul>

    </div>
</div>
</div>
</div>
</section>

  <section class="panier parallax">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

  <h4>Compostez vos déchets !</h4>
  <p>Si vous êtes contraints de jeter des aliments, n’oubliez pas de composter vos déchets. Cela permet de les valoriser de manière écologique et économique. La présence d’animaux domestiques peut également vous aider à réduire le gaspillage : en dernier recours, vous pouvez leur donner vos restes à manger.</p>

  <h4>Les durées de conservation des aliments</h4>

<div class="col-sm-6">
  <table class="table table-sm ">
  <thead>
   <tr>
       <th scope="col"></th>
       <th scope="col">Réfrigérateur</th>
       <th scope="col">Congélateur</th>
   </tr>
   </thead>
   <tr>
       <td>Viandes et volailles cuites</td>
       <td>3 - 4 jours</td>
       <td>2 - 3 mois</td>
   </tr>
   <tr>
    <td>Poisson cuit</td>
    <td>1 - 2 jours</td>
    <td>4 - 6 mois</td>
   </tr>
   <tr> 
       <td>Pommes de terre cuites</td>
        <td>3 jours</td>
        <td>non</td>
    </tr>
    <tr>
       <td>Riz cuit et pâtes cuites</td>
      <td>3 jours</td>
      <td>3 mois</td>
    </tr>
    <tr>
      <td>Ragoûts,quiches</td>
      <td>2 - 3 jours</td>
      <td>3 mois</td>
    </tr>

     <tr>
       <td>Soupes</td>
        <td>3 - 4 jours</td>
       <td>2 - 3 mois</td>
    </tr>

</table>
            
          </div>
        </div>
      </div>
    </div>
  </section>
      
<div class="row">
       

</div>

        <?php
      }
    }else{
    ?>
      <meta http-equiv="refresh" content="0; url=connexion.php">
      <?php
    }
?>


</body>
</html>
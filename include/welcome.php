<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: logare.php");
    exit;
}
?>
 



<!DOCTYPE html>
<html lang="en">
<head>
  <title>> BuyCGames - acasa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/66f412a3fd.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script></head>
  <link href="include/style.css" rel="stylesheet">	
<body background="https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/original/28.jpg">

<div class="container-fluid no-padding text-center bg-light pt-5 pb-5" style="background:url(https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/4k/original/09.jpg)">
  <h1 class="p-3 mb-2 text-white">BuyCGames - online games shop</h1>
  <h5 class="my-5">Salut, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bine ai venit pe site-ul nostru.</h1>
  <p>
        <a href="resetare-parola.php" class="btn btn-warning" style="text-decoration:none">Reseteaza parola</a>
        <a href="delogare.php" class="btn btn-danger ml-3" style="text-decoration:none">Delogheaza-te de pe cont</a>
    </p>
</div>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <i class="fas fa-store fa-2x pl-3" style="color:white;"></i><br>
    <a class="navbar-brand px-2" href="#">BuyCGames</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" href="index.html" aria-current="page">Acasa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cum-cumpar.html">Cum cumpar?</a>
        </li>
	<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Platforme</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li><a class="dropdown-item" href="steam.html">Steam</a></li>
              <li><a class="dropdown-item" href="microsoft.html">Microsoft</a></li>
              <li><a class="dropdown-item" href="playstation.html">Playstation</a></li>
	      <li><a class="dropdown-item" href="xbox.html">XBox</a></li>
            </ul>
          </li>
       </ul>
    </div>
  </div>
</nav>

<div class="container-xl pt-5">
<div class="row">
		<div class="col-xs-1 center-block text-center">
			<h3 class="text-white">INFORMATII</h3>
		</div>
	</div>

<hr class="bg-white">	
	<div class="row">
		<div class="col-xs-1 center-block text-center pb-2">
			<h3 class="text-white">Magazin online de Jocuri PC Originale - Jocuri PS4 Noi - Jocuri XBOX One de Vanzare - Jocuri Nintendo Switch 2021</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-1 center-block text-center pb-2">
			<h5 class="text-white"> BuyCGames.ro - Magazin de jocuri Originale pentru PC si console XBOX One, XBOX 360, PS4, PS3, PS2, PS Vita, PSP, DS, 3DS, Nintendo WII, Nintendo Switch.</h5>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-1 center-block text-center pb-2">
			<div class="alert alert-info">
				Comanda acum online Jocurile tale favorite navigand prin meniul de sus in magazinul de jocuri originale si noi aparute!
			</div>
		</div>
	</div>
</div>

<div class="container-xl pt-5 pb-5 justify-content-center" >
	<div class="row">
		<div class="col-xs-1 center-block text-center">
			<h3 class="text-white">REDUCERI</h3>
		</div>
	</div>
		<hr class="bg-white">
	<div class="row ">
		<div class="card pr-3 pl-2 pt-2 pb-2 mx-2 my-2" style="width: 16rem;">
  			<img class="card-img-top" src="http://media.steampowered.com/apps/csgo/blog/images/fb_image.png?v=6">
			<div class="card-body">
   		 	<h5 class="card-title">CS:GO Prime</h5>
   		 	<p class="card-text">10 euro</p>
  			 	<a href="#" class="btn btn-primary">Adauga in cos</a>
  			</div>
		</div>
		<div class="card pr-3 pl-2 pt-2 pb-2 mx-2 my-2" style="width: 16rem;">
  			<img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Rocket_League_coverart.jpg">
  			<div class="card-body">
   		 	<h5 class="card-title">Rocket League</h5>
   		 	<p class="card-text">10 euro</p>
  			 	<a href="#" class="btn btn-primary">Adauga in cos</a>
  			</div>
		</div>
		<div class="card pr-3 pl-2 pt-2 pb-2 mx-2 my-2" style="width: 16rem;">
  			<img class="card-img-top embed-responsive-item" src="https://store-images.s-microsoft.com/image/apps.20615.14094456225993959.2d017079-463a-4bd6-ac7a-2fb4f65673e9.0faeefd3-4ad9-4634-98df-75b9aeb92d48?mode=scale&q=90&h=300&w=200">
  			<div class="card-body">
   		 	<h5 class="card-title">Forza Horizon 4</h5>
   		 	<p class="card-text">30 euro</p>
  			 	<a href="#" class="btn btn-primary">Adauga in cos</a>
  			</div>
		</div>
		<div class="card pr-3 pl-2 pt-2 pb-2 mx-2 my-2"   style="width: 16rem;">
  			<img class="card-img-top embed-responsive-item" src="https://geeki.ro/wp-content/uploads/2021/04/Call-of-Duty-Warzone.jpg">
  			<div class="card-body">
   		 	<h5 class="card-title">Call Of Duty Warzone</h5>
   		 	<p class="card-text">5 euro</p>
  			 	<a href="#" class="btn btn-primary">Adauga in cos</a>
  			</div>
		</div>
	</div>
	<div class="row card-columns">
		<div class="card pr-3 pl-2 pt-2 px-2 mx-2 my-2" style="width: 16rem;">
  			<img class="card-img-top embed-responsive-item" src="https://www.idevice.ro/wp-content/uploads/2020/08/GTA-5-neconditionat.jpg">
  			<div class="card-body">
   		 	<h5 class="card-title">Grand Theft Auto V</h5>
   		 	<p class="card-text">10 euro</p>
  			 	<a href="#" class="btn btn-primary">Adauga in cos</a>
  			</div>
		</div>
		<div class="card pr-3 pl-2 pt-2 pb-2 mx-2 my-2" style="width: 16rem;">
  			<img class="card-img-top embed-responsive-item" src="https://image.api.playstation.com/cdn/EP4529/CUSA04099_00/gICDNHi83meNszd0q0uNfEETnjWDe1HG.png">
  			<div class="card-body">
   		 	<h5 class="card-title">Sniper Elite 4</h5>
   		 	<p class="card-text">30 euro</p>
  			 	<a href="#" class="btn btn-primary">Adauga in cos</a>
  			</div>
		</div>
		<div class="card pr-3 pl-2 pt-2 pb-2 mx-2 my-2" style="width: 16rem;">
  			<img class="card-img-top embed-responsive-item" src="https://upload.wikimedia.org/wikipedia/en/thumb/4/43/Counter-Strike_Source_%28box_art%29.jpg/220px-Counter-Strike_Source_%28box_art%29.jpg">
  			<div class="card-body">
   		 	<h5 class="card-title">CS:Source</h5>
   		 	<p class="card-text">10 euro</p>
  			 	<a href="#" class="btn btn-primary">Adauga in cos</a>
  			</div>
		</div>
		<div class="card pr-3 pl-2 pt-2 pb-2 mx-2 my-2"   style="width: 16rem;">
  			<img class="card-img-top embed-responsive-item" src="https://www.incomod.info/wp-content/uploads/2020/06/counter_strike2.jpg">
  			<div class="card-body">
   		 	<h5 class="card-title">CS 1.6</h5>
   		 	<p class="card-text">5 euro</p>
  			 	<a href="#" class="btn btn-primary">Adauga in cos</a>
  			</div>
		</div>
	</div>

</div>


<div class="container-xl pt-5 pb-5">
  <div class="row">
    <div class="col-sm-4">
      <h3 class="text-white"><i class="fab fa-steam" aria-hidden="true"></i> Steam</h3>
      <p class="text-white">Lorem ipsum dolor..</p>
    </div>
    <div class="col-sm-4">
      <h3 class="text-white"><i class="fab fa-microsoft" aria-hidden="true"></i> Microsoft</h3>
      <p class="text-white">Lorem ipsum dolor..</p>
    </div>
    <div class="col-sm-4">
      <h3 class="text-white"><i class="fab fa-playstation" aria-hidden="true"></i> Playstation</h3>
      <p class="text-white">Lorem ipsum dolor..</p>
    </div>
  </div>
</div>
<footer class="footer text-white">
	<div class="container-fluid bg-dark">
		<div class="cotainer p-4">
		<div class="row">
			<div class="col-lg-4 col-md-12 mb-4 mb-md-0">
				<h4 class="text-uppercase divider">> Asistenta clienti</h3>
				<hr class="bg-white">
				<ul>
					<li><a href="inregistrare.php">Inregistrare</a>	</li>		
					<li><a href="logare.php">Logare</a>	</li>
					<li><a href="resetare-parola.php">Resetare parola</a>	</li>
					<li><a href="contact.html">Contact</a>	</li>		
				</ul>		
			</div>		
			<div class="col-lg-4 col-md-12 mb-4 mb-md-0">
				<h4 class="text-uppercase divider" >> Produse</h3>
				<hr class="bg-white">
      		<ul>
					<li><a href="steam.html">Steam</a>	</li>		
					<li><a href="microsoft.html">Microsoft</a>	</li>
					<li><a href="playstation.html">Playstation</a>	</li>
					<li><a href="xbox.html">XBox</a>	</li>		
				</ul>			
			</div>	
			<div class="col-lg-4 col-md-12 mb-4 mb-md-0">
				<h4 class="text-uppercase divider">> Informatii</h3>
				<hr class="bg-white">
      		<ul>
					<li><a href="cum-cumpar.html">Cum cumpar?</a>	</li>		
					<li><a href="despre-noi.html">Despre noi</a>	</li>
					<li><a href="plati.html">Modalitati de plata</a>	</li>
					<li><a href="tc.html">Termeni si conditii</a>	</li>		
				</ul>				
			</div>		
		</div>
		</div>
	</div>
	<div class="text-center p-3">
    © 2021 Copyright:
    <a  href="https://buycgames.com/">BuyCGames.ro v1.0</a>
  </div>
</footer>
</body>
</html>

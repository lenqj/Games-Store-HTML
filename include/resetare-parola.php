<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: logare.php");
    exit;
}
 
require_once "config.php";
 
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Te rog introdu o parola noua.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Parola trebuie sa contina cel putin 6 caractere.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Te rog confirma parola.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Parola nu este aceeasi.";
        }
    }
        
    if(empty($new_password_err) && empty($confirm_password_err)){
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            if(mysqli_stmt_execute($stmt)){
                session_destroy();
                header("location: logare.php");
                exit();
            } else{
                echo "Oops! Ceva nu a mers bine. Incearca din nou mai tarziu.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>> BuyCGames - resetare parola</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/66f412a3fd.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script></head>
  <link href="include/style.css" rel="stylesheet">	
<body background="https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/non-4k/original/28.jpg">
<style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
<div class="container-fluid no-padding text-center bg-light pt-5 pb-5" style="background:url(https://assets.hongkiat.com/uploads/minimalist-dekstop-wallpapers/4k/original/09.jpg)">
  <h1 class="p-3 mb-2 text-white">BuyCGames - online games shop</h1>
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
          <a class="nav-link" href="index.html">Acasa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cum-cumpar.html">Cum cumpar?</a>
        </li>
	<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false" aria-current="page">Platforme</a>
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
			<h3 class="text-white">Reseteaza parola<h3>
			
		</div>
	</div>

<hr class="bg-white">	
	<div class="row">
		<div class="col-xs-1 center-block pb-2 text-white"><p class="text-center">Completeaza campurile de mai jos pentru a reseta parola.</p>
		<div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group">
                <label>Parola Noua</label>
                <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirma Parola</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link ml-2" href="welcome.php" style="text-decoration:none">Anuleaza</a>
            </div>
        </form>
    </div> 
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
					<li><a href="include/inregistrare.php">Inregistrare</a>	</li>		
					<li><a href="include/logare.php">Logare</a>	</li>
					<li><a href="include/resetare-parola.php">Resetare parola</a>	</li>
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

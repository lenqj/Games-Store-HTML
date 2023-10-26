<?php
require_once "config.php";
 
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Completeaza campul cu un nume.";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_username);
 
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Acest nume este deja folosit.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Ceva nu a mers bine. Incearca din nou mai tarziu.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Te rog introdu o parola.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Parola trebuie sa contina cel putin 6 caractere.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Te rog confirma parola.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Parola nu este aceeasi.";
        }
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            

            if(mysqli_stmt_execute($stmt)){

                header("location: logare.php");
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
  <title>> BuyCGames - inregistrare</title>
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
			<h3 class="text-white">Inregistreaza-te<h3>
			
		</div>
	</div>

<hr class="bg-white">	
	<div class="row">
		<div class="col-xs-1 center-block pb-2 text-white"><p class="text-center">Completeaza campurile de mai jos pentru a crea un cont.</p>
		<div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nume</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Parola</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirma Parola</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Ai deja un cont? <a href="include/logare.php">Logheaza-te aici</a>.</p>
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

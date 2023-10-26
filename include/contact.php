<?php
  
if($_POST) {
    $nume = "";
    $prenume = "";
    $email = "";
    $problema = "";
    $mesaj = "";
    $email_body = "<div>";
      
    if(isset($_POST['nume'])) {
        $nume = filter_var($_POST['nume'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Nume:</b></label>&nbsp;<span>".$nume."</span>
                        </div>";
    }

    if(isset($_POST['prenume'])) {
        $nume = filter_var($_POST['prenume'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Prenume:</b></label>&nbsp;<span>".$prenume."</span>
                        </div>";
    }
 
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Email:</b></label>&nbsp;<span>".$email."</span>
                        </div>";
    }
      
    if(isset($_POST['problema'])) {
        $problema = filter_var($_POST['problema'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Problema:</b></label>&nbsp;<span>".$problema."</span>
                        </div>";
    }
      
    if(isset($_POST['mesaj'])) {
        $mesaj = htmlspecialchars($_POST['mesaj']);
        $email_body .= "<div>
                           <label><b>Mesaj:</b></label>
                           <div>".$mesaj."</div>
                        </div>";
    }
      
    if($problema == "Plata") {
        $recipient = "plati@buycgames.ro";
    }
    else if($problema == "Transfer-bancar") {
        $recipient = "transfer-bancar@buycgames.ro";
    }
    else {
        $recipient = "contact@buycgames.ro";
    }
      
    $email_body .= "</div>";
 
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
      
    if(mail($recipient, $problema, $email_body, $headers)) {
        echo "<p>Multumim ca ne-ai contactat, $nume $prenume. O sa primesti un raspuns in urmatoarele 24 ore.</p>";
    } else {
        echo '<p>Ne cerem scuze, dar emailul nu a fost trimis.</p>';
    }
      
} else {
    echo '<p>Ceva nu a mers bine!</p>';
}
?>
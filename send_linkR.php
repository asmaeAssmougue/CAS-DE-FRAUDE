<?php
 include("connexion.php");

 session_start(); 

if(isset($_POST['submit_email']) && !empty($_POST['email']) && !empty($_POST['username']))
{
  $email = $_POST['email'];
  $username = $_POST['username'];
  $select="SELECT `login`, `password` FROM `responsablebureauexam` WHERE login = '$username'";
  $reslt=mysqli_query($link, $select);
  if($reslt)
  {
    while($row=mysqli_fetch_assoc($reslt))
    {
      $email=md5($email);
      $pass=md5($row['password']);
    }
    $link="<a href='www.eFraude.com/CASDEFRAUDE/resetR.php?key=".$email."&reset=".$pass."&user=".$username."'>Clicker pour récupérer le mot de passe</a>";
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require("/PHPMailer-master/src/PHPMailer.php");
    require("/PHPMailer-master/src/SMTP.php");
    require("/PHPMailer-master/src/Exception.php");


    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); 

    $mail->CharSet="UTF-8";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPDebug = 1; 
    $mail->Port = 465 ; //465 or 587

     $mail->SMTPSecure = 'ssl';  
    $mail->SMTPAuth = true; 
    $mail->IsHTML(true);

    //Authentication
    $mail->Username = "efraudefsjesagdal@gmail.com";
    $mail->Password = "agdalfsjes";

    //Set Params
    $mail->SetFrom("efraudefsjesagdal@gmail.com");
    $mail->AddAddress("bar@gmail.com");
    $mail->Subject = "Récupérer le mot de passe";
    $mail->Body = "'Clicker sur ce lien pour récupérer votre mot de passe '.$pass.''";


     if(!$mail->Send()) {
        header("Location:resetPasswordR.php?echec=errorSend");
        exit();
     } else {
         echo "email de récupération de votre mot de passe est envoyé , vérifiez votre mail";
     }
   
    }else{
      header("Location:resetPasswordR.php?echec2=حدث خطأ المرجوا المحاولة$select");
      exit();
  }	
}else{
   header("Location:resetPasswordR.php?error=emptyField");
  exit();
}
?>
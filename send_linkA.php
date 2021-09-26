<?php
   include("connexion.php");
    use PHPMailer\PHPMailer\PHPMailer;
  
 session_start(); 

if(isset($_POST['submit_email']) && !empty($_POST['email']) && !empty($_POST['username']))
{
  $email = $_POST['email'];
  $username = $_POST['username'];
  $select="SELECT * FROM `admin` WHERE login = '$username'";
  $reslt=mysqli_query($link, $select);
 
  if(mysqli_num_rows($reslt) === 1)
  {
  
      $link="<a href='www.eFraude.com/CASDEFRAUDE/resetA.php?key=".$email."&user=".$username."'>Clicker pour récupérer le mot de passe</a>";
    
   
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

$mail = new PHPMailer();
//SMTP Settings
        $mail->CharSet = 'UTF-8'; 
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "efraudefsjesagdal@gmail.com"; //enter you email address
        $mail->Password = 'agdalfsjes'; //enter you email password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom("efraudefsjesagdal@gmail.com");
        $mail->addAddress($email); //enter you email address
        
        $mail->Subject = 'Récupérer le mot de passe';
        $mail->Body = 'Clicker sur ce lien pour récupérer votre mot de passe '.$link.'';
        
       if(!$mail->Send()) {
        $error = $mail->ErrorInfo;
        header("Location:resetPasswordA.php?errorSend=حدث خطأالمرجو المحاولة$error");
        exit();
     } else {
         header("Location:resetPasswordA.php?succes=تم إرسال بريد إلكتروني لاستعادة كلمة المرور ، تحقق من بريدك الإلكتروني");
         exit();
     }
 
    
   
    }
     else{
      header("Location:resetPasswordA.php?echec2=المعلومات غير صحيحة");
      exit();
  }

}else{
   header("Location:resetPasswordA.php?error=emptyField");
  exit();
}
?>
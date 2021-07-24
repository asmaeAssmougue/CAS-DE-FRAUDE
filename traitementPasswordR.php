<?php
include('connexion.php');
session_start();
if(isset($_POST['reset-request-submit'])){
   
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = "localhost/casDeFraude/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
    $expires = date("U") + 1800;

    $userEmail = $_POST['email'];
    $sql = "DELETE FROM `pwdreset` WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($link);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "there was an error";
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s", $userEmail);
        mysqli_stmt_execute($stmt);
    }
    $sql = "INSERT INTO `pwdreset`(`pwdResetId`,`pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($link);

    if(!mysqli_stmt_prepare($stmt,$sql)){
       
        echo "there was an error";
        exit();
    }
    else{
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"ssss", $userEmail, $selector, $hashedToken, $expires);
       
        mysqli_stmt_execute($stmt);
    }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
        $to = $userEmail;
        $subject = 'Reset your password for cas de fraude ';
        $message = '<p>We recieved a password reset request.The link to reset your password
        is below , if you did not make  this request, you can ignore 
        this email</p>';
        $message .= '<p>Here is your password reset link: <br>';
        $message .=  '<a href="' . $url . '">' . $url . '</a></p>';
        
        $headers = "From: casDeFraude <usecasDeFraude@gmail.com>\r\n";
        $headers .= "Reply-To: usecasDeFraude@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";
        
        mail($to, $subject, $message, $headers);
        header("Location: resetPasswordR.php?reset=success");
    
    
}
else{
    header('Location:connexionResponsable.php');
}



?>
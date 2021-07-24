<?php
session_start();
include ('connexion.php');    
if(isset($_POST['submit'])){
    if(isset($_POST['email']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

$email = validate($_POST['email']);
$pass = validate($_POST['password']);
if(empty($email)){
    header("Location: connexionResponsable.php?error=email is required");
    exit();
}else if(empty($pass)){
    header("Location: connexionResponsable.php?error=password is required");
    exit();
}else{ 
    $sql = "SELECT * FROM `responsablebureauexam` WHERE login ='$email' AND password = '$pass'";
    $reslt = mysqli_query($link, $sql);
    if(mysqli_num_rows($reslt) === 1){
        $row = mysqli_fetch_assoc($reslt);
        if($row['login'] == $email && $row['password'] == $pass){
            $_SESSION['password'] = $row['password'];
           
            $_SESSION['login'] = $row['login'];
            header("Location: enregistrerFraude.php?succes=1");
            exit();
        }
        }
    else{
           header("Location: connexionResponsable.php?error=the password or login is incorrect!!");
           exit();
           
        }
    }
    
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>loginForm</title>
</head>
<body>
     <div class="container">
         <form action="" method="POST" class="login-email">
             <p class="login-text" style="font-size:2rem; font-weight: 800;">Login</p>
          <?php if(isset($_GET['error'])){ ?>
          
          <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
           <div class="input-group">
               <input type="email" name="email" placeholder="Email" required="required">
           </div>
           <div class="input-group">
               <input type="password" placeholder="Password" name="password" required="required">
           </div>
           <div class="input-group">
               <button name="submit" class="btn">Login</button>
           </div>
           <?php
           if(isset($_GET["newpwd"])){
               if($_GET["newpwd"] == "passwordupdated"){
                   echo '<p class="success">Your password has been reset!</p>';
               }
           }
           ?>
           <p class="forgetP"><a href="resetPasswordR.php">Forget your password ?</a></p>
         </form>
     </div>
</body>
</html>
<?php  mysqli_close($link); ?>
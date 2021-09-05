<?php

include('connexion.php');
session_start();
if(isset($_POST['submit_password']) && isset($_GET['user']) && !empty($_POST['password']))
{
  $user=$_GET['user'];
  $pass=$_POST['password'];
  $query1="UPDATE `responsablebureauexam` SET `password`='$pass' WHERE login = '$user'";
  $select1=mysqli_query($link,$query1);
  if($select1){
      header("Location: connexionResponsable.php?newpwd=passwordupdated");
      exit();
  }
  else{
      header("Location: resetPasswordR.php?echec=true");
      exit();
  }
}
else if($_GET['key'] && $_GET['reset'])
{
  $email=$_GET['key'];
  $pass=$_GET['reset'];
  $username=$_GET['user'];
  $select="SELECT `login`, `password` FROM `responsablebureauexam` WHERE login = '$username' and md5(password)='$pass'";
  $reslt=mysqli_query($link, $select);
 
  if(mysqli_num_rows($reslt)==1)
  {

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/712b6663e3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style3.css">
    <title>ResetPassword</title>
</head>
<body>
    <section>
     
               <form action="" method="post" class="container">
                  <div class="input-group" style="display:flex; flex-direction: row;">
                   <input type="hidden" name="email" value="<?php echo $email;?>">
                   </div>
                   <div class="input-group" style="display:flex; flex-direction: row;">
                    <label style="position:relative; left:390px;" for="pwd">Entrez le nouveau mot de passe</label>
                    <input type="password" name='password' id="password">
                    <span class="eye"><i class="bi bi-eye-slash" id="togglePassword"></i></span>
                   </div>
                   <div class="input-group" style="display:flex; flex-direction: row;">
                    <input type="submit" name="submit_password">
                    </div>
                         
    
                <script type="text/javascript">
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            togglePassword.addEventListener('click', function (e) {
         
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
     
            this.classList.toggle('bi-eye');
        });
       </script>
               </form>

 
    </section>
</body>
</html>
         
      <?php
  }
}
?>
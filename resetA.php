<?php

include('connexion.php');
session_start();
if(isset($_POST['submit_password']) && !empty($_POST['username']) && !empty($_POST['password']))
{
  $user=$_POST['username'];
  $pass=$_POST['password'];
  $query1="UPDATE `admin` SET `password`='$pass' WHERE login = '$user'";
  $select1=mysqli_query($link,$query1);
  if($select1){
      
      header("Location: adminAute.php?newpwd=passwordupdated");
      exit();
  }
  else{
      header("Location: resetPasswordA.php?echec=هناك مشكلة ، حاول مرة أخرى");
      exit();
  }
}
else if($_GET['key'] && $_GET['user'])
{
  $email=$_GET['key'];
 
  $username=$_GET['user'];
  $select="SELECT * FROM `admin` WHERE login = '$username'";
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
    <title>UpdatePasswordA</title>
</head>
<body>
    <section>
     
               <form action="" method="post" class="container">
                <p class="login-text" style="font-size:1.3rem; font-weight: 680;">تعيين كلمة المرور</p>
                  
                   <div class="input-group" style="display:flex; flex-direction: row;">
                   
                    <input type="password" placeholder="new Password" name='password' id="password" required="required">
                    <span class="eye"><i class="bi bi-eye-slash" id="togglePassword"></i></span>
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
                   <div class="input-group" style="display:flex; flex-direction: row;">
                   <input type="hidden" name="username" value="<?php echo $username;?>">
                   </div>
                   <div class="input-group" style="display:flex; flex-direction: row;">
                    <button name="submit_password" class="btn">إرسال</button>
                    </div>
                   
                     <p class="forgetP"><a href="acceuil.php">خروج</a></p>    
                 
               
               </form>

 
    </section>
</body>
</html>
      
      <?php
  }else{
     header("Location: resetPasswordA.php?echec3=المعلومات غير صحيحة");
      exit();
  } 
} 
?>
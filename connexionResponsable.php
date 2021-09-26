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
    header("Location: connexionResponsable.php?error=الرجاء إدخال اسم المستخدم");
    exit();
}else if(empty($pass)){
    header("Location: connexionResponsable.php?error1=من فضلك أدخل رقمك السري");
    exit();
}else{ 
    $sql = "SELECT * FROM `responsablebureauexam` WHERE login ='$email' AND password = '$pass'";
    $reslt = mysqli_query($link, $sql);
    if(mysqli_num_rows($reslt) === 1){
        $row = mysqli_fetch_assoc($reslt);
        if($row['login'] == $email && $row['password'] == $pass){
            $_SESSION['password'] = $row['password'];
           
            //$_SESSION['loginR'] = $row['login'];
            $loginR = $row['login'];
            header("Location: enregistrerFraude.php?succes='مرحبًا بك'&loginR=$loginR");
            exit();
        }
        }
    else{
           header("Location: connexionResponsable.php?error2=كلمة السر أو اسم المستخدم غير صحيحة");
           exit();
           
        }
    }
    
}
}
else{
    if(isset($_POST['retour'])){
        
        header('Location: acceuil.php?success=1');
        exit();
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
     <script src="https://kit.fontawesome.com/712b6663e3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>loginFormR</title>
</head>
<body>
     <div class="container">
         <form action="" method="POST" class="login-email">
             <p class="login-text" style="font-size:2rem; font-weight: 800;">Login</p>
              <?php
           if(isset($_GET["newpwd"])){
               if($_GET["newpwd"] == "passwordupdated"){
                   echo '<p class="success">تم إعادة تعيين كلمة المرور الخاصة بك</p>';
               }
           }
           
          if(isset($_GET['error'])){ ?>
          
          <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } 
            if(isset($_GET['error1'])){ ?>
          
          <p class="error"><?php echo $_GET['error1']; ?></p>
            <?php } 
             if(isset($_GET['error2'])){ ?>
          
          <p class="error"><?php echo $_GET['error2']; ?></p>
            <?php } ?>
           <div class="input-group">
               <input type="text" name="email" placeholder="username" required="required">
           </div>
           <div class="input-group">
               <input type="password" placeholder="Password" name="password" required="required" id="password">
               <span class="eye"><i class="bi bi-eye-slash" id="togglePassword"></i></span>
           </div>
           <script type="text/javascript">
     const togglePassword = document.querySelector('#togglePassword');
     const password = document.querySelector('#password');
     togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});
    
         </script>
           <div class="input-group">
               <button name="submit" class="btn">Login</button>
              
           </div>
          
           <p class="forgetP"><a href="resetPasswordR.php">نسيت كلمة المرور ؟</a></p>
                <p class="forgetP"><a href="acceuil.php">خروج</a></p>
         </form>
     </div>
</body>
</html>
<?php  mysqli_close($link); ?>
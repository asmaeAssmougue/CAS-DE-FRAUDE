<?php

 include("connexion.php");
 session_start();
 

  if(isset($_POST['submit'])){
    if(empty($_POST['delete']) || empty($_POST['username']) || empty($_POST['password'])){
    
        header("Location: ajouterCompte.php?error=المرجو ملىء جميع الخانات");
        exit(); 
    }else{
        $pwd=htmlspecialchars($_POST['password']);
        $username=htmlspecialchars($_POST['username']);
        $compteDel=htmlspecialchars($_POST['delete']);
       if($compteDel=='respo'){
        $query="INSERT INTO `responsablebureauexam`(`login`, `password`) VALUES ('$username','$pwd');";
        $result=mysqli_query($link, $query);
        if($result){
              
             header('Location: ajouterCompte.php?success=تم إضافة الحساب بنجاح');
             exit();
              
        }
        else{
           header('Location: ajouterCompte.php?recupId=الاسم المستخدم  قيد الاستخدام  ، جرب اسمًا آخر');
              exit();
        
        }
       }
       elseif($compteDel=='secret'){
        
             $query="INSERT INTO `secretaire`(`login`, `password`) VALUES ('$username','$pwd');";
        $result=mysqli_query($link, $query);
        if($result){
             header('Location: ajouterCompte.php?success=تم إضافة الحساب بنجاح');
             exit();
              
        }
        else{
           header('Location: ajouterCompte.php?recupId=الاسم المستخدم  قيد الاستخدام  ، جرب اسمًا آخر');
              exit();
        
        }
       }else{
         $query="INSERT INTO `admin`(`login`, `password`) VALUES ('$username','$pwd');";
        $result=mysqli_query($link, $query);
        if($result){
             header('Location: ajouterCompte.php?success=تم إضافة الحساب بنجاح');
             exit();
              
        }
        else{
           header('Location: ajouterCompte.php?recupId=الاسم المستخدم  قيد الاستخدام  ، جرب اسمًا آخر');
              exit();
        
        }
       }

        
  }
  }
 
  
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/712b6663e3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  width: 100%;
  min-height: 100vh;

  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
    url(images/fac.png);
  background-attachment: fixed;
  background-position: center;
  background-size: cover;
  display: flex;
  justify-content: center;
  align-items: center;
}

.container {
  width: 500px;
  min-height: 620px;
  background: #fff;
  border-radius: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  padding: 40px 30px;
  border: 2px solid rgb(12, 78, 10);
}

.container .fraude .input-group {
  width: 100%;
  height: 50px;
  margin-bottom: 65px;
}

.container .fraude .input-group input {
  width: 100%;
  height: 100%;
  border: 2px solid #a09797;
  padding: 15px 20px;
  font-size: 1rem;
  border-radius: 10px;
  background: transparent;
  outline: none;
  transition: 0.3s;
}

.container .fraude .input-group select {
  width: 100% !important;
  height: 100% !important;
  border: 2px solid #a09797 !important;
  font-size: 1rem !important;
  border-radius: 10px !important;
  background: transparent !important;
  outline: none !important;
  transition: 0.3s !important;
}

.container .fraude .input-group .btn {
  display: inline-block;
  width: 30%;
  padding: 10px 20px;
  text-align: center;
  border: 1px solid #448ce9;
  outline: none;
  border-radius: 30px;
  font-size: 1.2rem;
  color: rgb(24, 21, 21);
  cursor: pointer;
  transition: 0.3s;
  margin-right: 5px;
  margin-top: 10px;
}
.container .fraude .input-group .btn a {
  color: #000 !important;
  text-decoration: none !important;
  font-size: 1em !important;
}
.container .fraude .input-group .btn:hover {
  transform: translateY(-5px);
}
.error {
  background: #f2dede;
  color: #a94442;
  padding: 10px;
  width: 95%;
  border-radius: 5px;
  margin: 20px auto;
  text-align: right;
}
.logo {
  position: relative;
  left: 0px;
  margin-bottom: 40px;
}
label {
  color: rgba(0, 9, 139, 0.911);
  font-size: 1.3em;
  font-weight: bold;
}

.succes {
  background: #fcf8f8;
  color: #33ff44;
  padding: 10px;
  width: 95%;
  border-radius: 5px;
  margin: 20px auto;
  font-size: 1.4em;
  text-align: right;
}

a {
  color: #070707;
  text-decoration: none;
  background-color: transparent;
}
a:hover {
  color: #070707;
  text-decoration: none;
}
.eye{
  
  float: right;
  /*margin-top: -55px;*/
  position: relative;
  z-index: 1;
  cursor:pointer;
  left:400px;
  top:-35px;
}
@media (max-width: 430px) {
  .container {
    width: 300px;
  }
}
</style>
    <title>ajouterCompte</title>
  </head>
  <body>
    <div class="container">
        <form action="" method="POST" class="fraude">
          <div class="logo">
                  <img src="images/logo3.png" alt="logo">
          </div>
          
          <?php if(isset($_GET['recupId'])){ ?>
          
          <p class="error"><?php echo $_GET['recupId']; ?></p>
            <?php } ?>
          
             
          <?php if(isset($_GET['error'])){ ?>
          
          <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
           
            

             <?php if(isset($_GET['success'])){ ?>
          
          <p class="succes"><?php echo $_GET['success']; ?></p>
            <?php } ?>

         
           
             <div class="input-group" style="display:flex; flex-direction: row;">

              
               <select name="delete" class="form-select">
                  <option value="respo" >مكتب الامتحانات</option>
                  <option value="secret">الكتابة العامة</option>
                     <option value="admin">admin</option>
            </select>
            <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="username" style="position:relative; left:330px;">:الاسم المستخدم</label>
               <input type="text" name="username" id="username" placeholder="Nom d'utilisateur">
           </div>
             <div class="input-group">
                  <label for="username" style="position:relative; left:330px;">: كلمة السر</label>
               <input type="password" placeholder="mot de passe" name="password" required="required" id="password">
               <span class="eye"><i class="bi bi-eye-slash" id="togglePassword"></i></span>
           </div>
           <div class="input-group">
               <button type="submit" class="btn btn-primary" name="submit">إضافة</button>
               <button  class="btn waves-effect waves-light reset" type="reset" value="Reset" >إلغاء</button>
                <button type="submit" class="btn btn-primary"><a href="admin.php">رجوع</a></button>
           </div>
           
           
         </form>
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
    </div>


    
  </body>
</html>
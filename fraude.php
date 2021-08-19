<?php

 include("connexion.php");
 session_start();
 if(isset($_GET['id'])){
   $mainid = $_GET['id'];
   $sql2 = "UPDATE `notification` SET `status`='1' WHERE id = '$mainid'";
  $reslt2 = mysqli_query($link, $sql2);

  if(isset($_POST['submit'])){
    if(empty($_POST['date'])){
    
        header("Location: fraude.php?error2=المرجو ملىء جميع الخانات");
        exit(); 
    }else{
        $query="SELECT * FROM `notification` WHERE id='$mainid';";
        $resultQ=mysqli_query($link, $query);
        if(!$resultQ){
              header('Location: fraude.php?recupId=حدث خطأ ، حاول مرة أخرى');
              exit();
        }
        else{
          if($dataQ=mysqli_fetch_assoc($resultQ)){
                $numApogee=$dataQ['numApogee'];
                
                $date=addslashes(htmlspecialchars($_POST['date']));
      $loginS=$_SESSION['login'];
      $_SESSION['date']=$date;
    
      $sql0 = "INSERT INTO `conseildiscipline`(`loginS`, `date`, `PV`, `numApogee`) VALUES ('$loginS','$date','الملف في طور المعالجة','$numApogee') ON DUPLICATE KEY UPDATE loginS='$loginS', date='$date', PV='الملف في طور المعالجة';";
        $reslt0 = mysqli_query($link,$sql0);
        if(!$reslt0){
            
            header("Location: fraude.php?inscrire=حدث خطأ أثناء الإدراج ، حاول مرة أخرى");
            exit();
        }
        else{
             
           $_SESSION['numApogee']=$numApogee;
            header("Location: listeSansPV.php?id=$numApogee");
            exit();
        
        }
    
          }
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
    <link rel="stylesheet" href="style7.css">
    <title>Fraude</title>
  </head>
  <body>
    <div class="container">
        <form action="" method="POST" class="fraude">
          <div class="logo">
                  <img src="images/logo3.png" alt="logo">
          </div>
           <?php if(isset($_GET['error2'])){ ?>
          
          <p class="error"><?php echo $_GET['error2']; ?></p>
            <?php } ?>
          <?php if(isset($_GET['recupId'])){ ?>
          
          <p class="error"><?php echo $_GET['recupId']; ?></p>
            <?php } ?>
           <?php if(isset($_GET['error1'])){ ?>
          
          <p class="error"><?php echo $_GET['error1']; ?></p>
            <?php } ?>
          <?php if(isset($_GET['error'])){ ?>
          
          <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
           <?php if(isset($_GET['inscrire'])){ ?>
          
          <p class="error"><?php echo $_GET['inscrire']; ?></p>
            <?php } ?>
            
             <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="date" style="position:relative; left:350px;">:تاريخ الجلسة</label>
               <input type="text" name="date" id="date">
           </div>
             
           <div class="input-group">
               <button type="submit" class="btn btn-primary" name="submit">حفظ</button>
               <button  class="btn waves-effect waves-light reset" type="reset" value="Reset" >إلغاء</button>
                <button type="submit" class="btn btn-primary"><a href="modifierFraude.php">رجوع</a></button>
           </div>
           
         </form>
    </div>

  </body>
</html>
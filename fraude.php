<?php
 
 include("connexion.php");
 session_start();
 if(isset($_GET['id'])){
   $main_id = $_GET['id'];
   $sql2 = "UPDATE `notification` SET `status`='1' WHERE id = '$main_id'";
  $reslt2 = mysqli_query($link, $sql2);

  if(isset($_POST['submit'])){
    if(empty($_POST['anneeUnv'])||empty($_POST['session'])||empty($_POST['date'])){
    
        header("Location: fraude.php?error=veuillez remplir tous les champs");
        exit(); 
    }else{
      $anneeUnv=$_POST['anneeUnv'];
      $session=$_POST['session'];
      switch ($session) {
                case 'hiverAutomne':
                    $session="خريف-شتاء";
                    break;
                case 'etePrint':
                    $session="ربيع-صيف";
                    break;
               
                default:
                    header("Location: fraude.php?error1=choisissez une valeur valide!");
                    exit();
            }
      $date=$_POST['date'];
      $loginS=$_SESSION['login'];
      $numApogee=$_SESSION['numApogee'];
      $_SESSION['session']=$session;
      $_SESSION['anneeUnv']=$anneeUnv;
      $_SESSION['date']=$date;
      $sql0 = "INSERT INTO `conseildiscipline`(`loginS`, `date`, `PV`, `numApogee`) VALUES ('$loginS','$date','الملف في طور المعالجة','$numApogee')";
        $reslt0 = mysqli_query($link,$sql0);
        if(!$reslt0){
            
            header("Location: fraude.php?inscrire=une erreur est produite lors de l'insertion reessayez");
            exit();
        }
        else{
             $sql3 = "UPDATE `fraude` SET `anneeUniversitaire`='$anneeUnv',`session`='$session' WHERE numApogee = '$numApogee'";
             $reslt3 = mysqli_query($link, $sql3);
             if(!$reslt3){
            
            header("Location: fraude.php?update=une erreur est produite lors de l'insertion reessayez");
            exit();
        }
        else{
            header("Location: listeSansPV.php?success=1");
            exit();
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
              <img src="images/logo.png" alt="logo">
          </div>
           <?php if(isset($_GET['error1'])){ ?>
          
          <p class="error"><?php echo $_GET['error1']; ?></p>
            <?php } ?>
          <?php if(isset($_GET['error'])){ ?>
          
          <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
           <?php if(isset($_GET['inscrire'])){ ?>
          
          <p class="error"><?php echo $_GET['inscrire']; ?></p>
            <?php } ?>
             <?php if(isset($_GET['update'])){ ?>
          
          <p class="error"><?php echo $_GET['update']; ?></p>
            <?php } ?>
            

             <?php if(isset($_GET['success'])){ ?>
          
          <p class="succes"><?php echo $_GET['success']; ?></p>
            <?php } ?>

           <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="anneeUnv" style="position:relative; left:350px;">:السنة الجامعية</label>
               <input type="text" name="anneeUnv" id="anneeUnv" value="<?php 
        
           echo (isset($row['anneeUniversitaire'])) ? $row['anneeUniversitaire'] : '';
         ?>" >
           </div>
             <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="session" style="position:relative; left:390px;">:الدورة</label>
               <select name="session" class="form-select">
                  <option value="hiverAutomne" >خريف-شتاء</option>
                  <option value="etePrint">ربيع-صيف</option>
                  
            </select>
           </div>
             <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="date" style="position:relative; left:350px;">:تاريخ الجلسة</label>
               <input type="text" name="date" id="date" value="<?php 
        
                echo (isset($row['date'])) ? $row['date'] : '';
         ?>" >
           </div>
                

           <div class="input-group">
               <button type="submit" class="btn btn-primary" name="submit">حفظ</button>
               <button  class="btn waves-effect waves-light reset" type="reset" value="Reset" >الغاء</button>
           </div>
           
           
         </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
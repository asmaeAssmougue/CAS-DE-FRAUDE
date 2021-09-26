<?php
  include("connexion.php");

session_start();
$loginS = $_GET['loginS'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/712b6663e3.js" crossorigin="anonymous"></script>
    
   
    
    <link rel="stylesheet" type="text/css" href="style6.css">
    <title>Modifier Fraude</title>
</head>
<body>
     <div class="container">
           <div class="logo">
              <img src="images/logo3.png" alt="logo" style="position:relative;left:230px;">
              
          </div>
           <div class="notif">
                                              <script>
                          let lastActionTaken = new Date().getTime();
                          function checkLastAction() {
                            let now = new Date().getTime();
                            if (now - lastActionTaken > 2000) window.location.reload();
                            else lastActionTaken = now;
                          }
                          window.addEventListener("mousemove", checkLastAction);
                          window.addEventListener("touchstart", checkLastAction);
                          window.addEventListener("keydown", checkLastAction);
                  </script>
                                              
                              
                            
                           <?php
                            $sql1 = "SELECT * FROM `notification` WHERE STATUS = 0";
                            $reslt1 = mysqli_query($link, $sql1);
                            if(mysqli_num_rows($reslt1)>0){
                              ?>
                                   
                         <table class="table table-bordered">
                          <thead class="border border-dark">
                          <tr>
                            
                            <th scope="col" style="width: 270px;text-align:right;">إضافة موعد انعقاد المجلس التأديبي</th>
                            <th scope="col" style="width: 450px;text-align:right;">المسلك</th>
                            <th scope="col" style="width: 100px;text-align:right;">ر.ط</th>
                            <th scope="col" style="width: 250px;text-align:right;">الاسم و النسب</th>
                            <th scope="col" style="width: 50px;text-align:right;">الرقم</th>
                            
                          </tr>
                        </thead>
             
                           
                        
                        <tbody class="border border-dark">

                   <?php
                      while($fetch = mysqli_fetch_assoc($reslt1)){
                          $numApogee = $fetch['numApogee'];
                          $_SESSION['numApogee']=$fetch['numApogee'];
                          $sql2 = "SELECT * FROM `etudiant` WHERE numApogee ='$numApogee';";
                          $reslt2 = mysqli_query($link, $sql2);
                           if(!$reslt2){
                          
                            header("Location: modifierFraude.php?error=هناك مشكلة ، حاول مرة أخرى&loginS=$loginS");
                            exit();
                           }
                           else{ 
                            
                             while($data1=mysqli_fetch_assoc($reslt2)){
                           ?>
                          <tr>
                            <td style="text-align:right;"><a href="fraude.php?id=<?php echo $fetch['id']; ?>&loginS=<?php echo $loginS; ?>" alt="">إضافة</a></td>
                            <td style="width: 450px;text-align:right;"><?php echo $data1['filliere']; ?></td>
                            <td style="width: 100px;text-align:right;"><?php echo $data1['numApogee']; ?></td>
                            <td style="width: 250px;text-align:right;"><?php echo $data1['prenom']." ".$data1['nom']; ?></td>
                            <td scope="col" style="width: 50px;text-align:left;"><?php echo $data1['numEtd']; ?></td>
                          </tr>  
                        </tbody> 
                             
                    <?php  }
                      }
                    }
                }

               

                else{
                  echo "<p class='succes'>ليس لديك اشعار جديد، تفقد اللائحة بدون  محضر</p><div class='dec'><a href='formSansPV.php?loginS=$loginS;' class='button'>فتح</a></div>";
                }    
  ?>
  </table>
           </div>
     
           <div class="input-group">
               <button type="button" class="btn btn-danger"><a href="listeFraudePV.php?&loginS=<?php echo $loginS; ?>">فتح اللائحة</a></button>
             <button type="button" class="btn btn-info"><a href="AjouterPV.php?&loginS=<?php echo $loginS; ?>">اضافة محضر</a></button>
             <button type="button" class="btn btn-danger"><a href="deconnexion.php">خروج</a></button>
           </div>
          
 
           
        
     </div>
</body>
</html>

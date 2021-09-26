<?php

 include("connexion.php");
 session_start();


 $loginS = $_GET['loginS'];
  if(isset($_GET['id']) && isset($_GET['loginS'])){
    $loginS = $_GET['loginS'];
   $mainid = $_GET['id'];
   $sql2 = "UPDATE `notification` SET `status`='1' WHERE id = '$mainid'";
  $reslt2 = mysqli_query($link, $sql2);
 

 
  
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
        <form action="traitFraude.php?loginS=<?php echo $loginS; ?>&id=<?php echo $mainid; ?>" method="POST" class="fraude">
          <div class="logo">
                  <img src="images/logo3.png" alt="logo">
          </div>
           <?php if(isset($_GET['errorEmpty'])){ ?>
          
          <p class="error"><?php echo $_GET['errorEmpty']; ?></p>
            <?php } ?>
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
                <button type="submit" class="btn btn-primary"><a href="modifierFraude.php?loginS=<?php echo $loginS; ?>">رجوع</a></button>
           </div>
           
         </form>
    </div>

  </body>
</html>
<?php } 
else{
  header("Location: modifierFraude?loginS=$loginS");
  exit();
}

?>
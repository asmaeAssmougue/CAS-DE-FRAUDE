<?php
 
 include("connexion.php");
 session_start();
  if(isset($_POST['submit'])){
      if(empty($_POST['numApogee']) || empty($_POST['PV'])){     
    header("Location: AjouterPV.php?error=veuillez remplir tous les champs");
    exit();       
   }
   else{
       $numApogee=$_POST['numApogee'];
       $PV=$_POST['PV'];
       $sql2="UPDATE `conseildiscipline` SET `PV`='$PV'  WHERE numApogee='$numApogee';";
       $reslt=mysqli_query($link, $sql2);
       if(!$reslt){
           header("Location: AjouterPV.php?update=un problem est introduite!!");
           exit();
       }
       else{
          header("Location: AjouterPV.php?succes=le proces verbal est ajouté avec succes!");
           exit();
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
    <title>Ajouter PV</title>
  </head>
  <body>
    <div class="container">
        <form action="" method="POST" class="ajouPV">
            
          <div class="logo">
              <img src="images/logo.png" alt="logo">
          </div>
          <?php if(isset($_GET['error'])){ ?>
          
          <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['update'])){ ?>
          
          <p class="error"><?php echo $_GET['update']; ?></p>
            <?php } ?>

             <?php if(isset($_GET['succes'])){ ?>
          
          <p class="succes"><?php echo $_GET['succes']; ?>   <button type="submit" class="btn btn-outline-primary"><a href="listeFraudePV.php">voir la liste</a></button></p>
            <?php } ?>
          <div class="input-group" style="display:flex; flex-direction: row;">
              <label for="numApogee" style="position:relative; left:370px;">:رقم الطالب</label>
             
             <select class="form-select" name="numApogee">
                  <?php
              $sql1="SELECT * FROM `etudiant`";
              $reslt1=mysqli_query($link, $sql1);
              while($row1=mysqli_fetch_assoc($reslt1)){

              ?>
                <option value="<?php echo $row1['numApogee']; ?>"><?php echo $row1['numApogee']; ?></option>
                 <?php } ?>
                </select>
               
          </div>
          
          
          
           <label for="PV" style="position:relative; left:350px;">:قرار المجلس</label>
              <div class="text" style="display:flex; flex-direction: row;">

              
               <textarea name="PV" id="PV" cols="70" rows="6"></textarea>
           </div>
            
           <div class="input-group">
               <button type="submit" class="btn btn-primary" name="submit">اضافة</button>
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
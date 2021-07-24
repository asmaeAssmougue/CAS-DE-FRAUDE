<?php
  include("connexion.php");
  session_start();
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
              <img src="images/logo.png" alt="logo">
          </div>
          <div class="notification">
               <nav class="navbar navbar-expand-lg navbar-light bg-light">
       
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php
     $sql = "SELECT * FROM `notification` WHERE STATUS = 0";
     $reslt = mysqli_query($link, $sql);
     $count = mysqli_num_rows($reslt);
  ?>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
     
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-bell"></i><span class="badge badge-danger" id="count"><?php echo $count ?></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
                $sql1 = "SELECT * FROM `notification` WHERE STATUS = 0";
                $reslt1 = mysqli_query($link, $sql1);
                if(mysqli_num_rows($reslt1)>0){
                      while($fetch = mysqli_fetch_assoc($reslt1)){
                          echo '<a class="dropdown-item text-primary"  font-weight-bold href="fraude.php?id='.$fetch['id'].'">une nouvelle fraude est ajouté  <button type="button" class="btn btn-primary">ouvrir</button></a>';
                      }
                }else{
                  echo '<a class="dropdown-item text-success"  font-weight-bold href="#"><i class="far fa-frown"></i>  Vous n\'avez aucune fraude à ajouter</a>';
                } 
               
  ?>
          
        
        </div>
      </li>
     
    </ul>
    
  </div>

</nav>
          </div>
     
           <div class="input-group">
               <button type="button" class="btn btn-danger"><a href="listeFraudePV.php">Voir liste de fraude</a></button>
             <button type="button" class="btn btn-info"><a href="AjouterPV.php">Ajouter procès verbal</a></button>
           </div>
           <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
           
        
     </div>
</body>
</html>

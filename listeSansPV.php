<?php
 
 include("connexion.php");
 session_start();
  $session=$_SESSION['session'];
  $annUniv=$_SESSION['anneeUnv'];
  $dateC=$_SESSION['date'];
    

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
    
    <title>Fraude</title>
    <style>
          @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
  margin: auto;
  width: 75%;
  position:relative;
}
section {
  margin-top: 10px;
  text-align: center;
}

#logo {
  position: absolute;
  left: 220px;
  top: 0px;
  width: 80%;
  height: 597px;
  margin-bottom:40px;
}
.p {
  padding-top: 130px;
  width: 70%;
  margin: auto;
  text-align: center;
  font-size: 1.4em;
  color: #333333;
  font-family: "Source Sans Pro", "Trebuchet MS", Arial;
  padding-bottom: 30px;
  font-weight:bold;

}
.btn-info {
  border-radius: 20px !important;
 
  border: 0 !important;
  margin-right: 30px !important;
  width: 220px !important;
}

.btn-info a {
  text-decoration: none;
  color: aliceblue;
  font-size: 1.2em;
}
table thead tr th, table tbody tr td{
      border:1px solid #000 !important;
      font-size:1.3em;
      color:#000;
}
@media (max-width: 430px) {
    .container {
        width: 300px;
    }
   
}
    </style>
  </head>
  <body>
    <div class="container">
          <div id="logo">
              <img src="images/logo.png" alt="logo">
          </div>
                

           <section>
      <p class="p">
       اجتماع المجلس التاديبي المنعقد بتاريخ <?php echo $dateC; ?> حول حالات الغش <br>
       اساءة الادب و عرقلة السير العادي للا متحانات  
  <br>
                        <?php echo $annUniv ." ". $session; ?>   المراقبة النهائية لدورة 
   

  <br>
طبقا للمرسوم رقم 2.06.619 الصادر في 28 من شوال 28/1429 اكتوبر 2008 المتعلق بالمجلس التاديبي الخاص بالطلبة
    
 (الجريدة الرسمية5681)
    <br>
 بتاريخ 10 نونبر 
        2008
        

</p>
    <table class="table table-bordered">
     <thead>
    <tr>
      <th scope="col">طبيعة الغش</th>
      <th scope="col">المسلك</th>
      <th scope="col">ر.ط</th>
      <th scope="col">الاسم و النسب</th>
       <th scope="col">الرقم</th>
      
    </tr>
  </thead>
   <?php
        
      $sql1="SELECT etudiant.numApogee, etudiant.numEtd, etudiant.nom, etudiant.prenom, etudiant.filliere, etudiant.optionFill, fraude.idFraude, fraude.description, fraude.anneeUniversitaire, fraude.session, fraude.loginR, conseildiscipline.idConseil, conseildiscipline.loginS, conseildiscipline.date, conseildiscipline.PV
FROM etudiant 
INNER JOIN conseildiscipline ON conseildiscipline.numApogee = etudiant.numApogee 
INNER JOIN fraude ON fraude.numApogee = etudiant.numApogee
      WHERE fraude.anneeUniversitaire = '$annUniv'  AND fraude.session = '$session' AND conseildiscipline.date = '$dateC'
      ORDER BY fraude.idFraude ASC;";
          $reslt1=mysqli_query($link, $sql1);
          if(!$reslt1){
              header("Location: listeSansPV.php?error=une erreur est produite lors de l'insertion reessayez");
              exit();
          }
          else{
              while($row=mysqli_fetch_assoc($reslt1)){

    ?>
  <tbody>
   
    <tr>
      <td scope="row"><?php echo $row['description']; ?></td>
      <td><?php echo $row['filliere']; ?></td>
      <td><?php echo $row['numApogee']; ?></td>
      <td><?php echo $row['prenom']." ".$row['nom']; ?></td>
       <td scope="col"><?php echo $row['numEtd']; ?></td>
     
    </tr>
    
              </tbody> 
        <?php 
      }
    }
    ?>
</table>
      <div>
       
      
      </div>
    </section>
           
           
      
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
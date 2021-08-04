<?php 
   include("connexion.php");
   session_start();
          $session=$_SESSION['session'];
          $annUniv=$_SESSION['anneeUnv'];
          $dateC=$_SESSION['date'];
?>

<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/712b6663e3.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>listePVFraude</title>
     
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
  width: 90%;
  position:relative;
}
section {
  margin-top: 10px;
  text-align: center;
}

#logo {
  position: absolute;
 /* left: 220px;
  top: 0px;
  width: 500px;*/
  height: 597px;
  margin-bottom:40px;
  text-align:center;
}
.p {
  padding-top: 180px;
  width: 70%;
  margin: auto;
  text-align: center;
  font-size: 1.4em;
  color: #333333;
  font-family: "Source Sans Pro", "Trebuchet MS", Arial;
  padding-bottom: 30px;
  font-weight:bold;

}
.error {
  background: #f2dede;
  color: #a94442;
  padding: 10px 10px 10px 20px;
  width: 95%;
  border-radius: 5px;
  margin: 20px auto;
  text-align: right;
  font-size:1.1em;
}
.btn-info {
  border-radius: 20px !important;
 
  border: 0 !important;
  margin-right: 30px !important;
  width: 220px !important;
}
.btn-primary{
  border-radius: 20px !important;
  
  border: 0 !important;
  margin-right: 30px !important;
  width: 150px !important;
  height:40px !important;
  position:relative !important;
  left:-300px !important;
  margin-bottom:20px !important;
}
.btn-primary a {
  text-decoration: none;
  color: aliceblue;
  font-size: 1.2em;
}
.btn-info a {
  text-decoration: none;
  color: aliceblue;
  font-size: 1.2em;
}
table thead tr th{
      border:1px solid #000 !important;
      font-size:1.3em !important;
      color:#000 !important;
}
table tbody tr td{
      border:1px solid #000 !important;
      font-size:1.3em !important;
      color:#000 !important;
}
table tbody tr{
     border:1px solid #000 !important;
}
@media (max-width: 430px) {
    .container {
        width: 300px;
    }
   
}
@media print {
  #printPageButton {
    display: none;
  }
  #retour {
    display: none;
  }
}
@page { size: landscape; }

    </style>
  </head>
  <body>
    <div class="container">
          <div id="logo">
              <img src="images/logo2.jpg" alt="logo" width="1000px;">
          </div>
                

           <section>
      <p class="p">
            نتائج اجتماع المجلس التأديبي المنعقد بتاريخ <?php echo $dateC; ?> حول حالات الغش <br>
       إساءة الأدب و عرقلة السير العادي للا متحانات  
  <br>
                          المراقبة النهائية لدورة <?php echo  $session." ". $annUniv; ?>
   

  <br>
طبقا للمرسوم رقم 2.06.619 الصادر في 28 من شوال 28/1429 أكتوبر 2008 المتعلق بالمجلس التأديبي الخاص بالطلبة
    
 (الجريدة الرسمية5681)
    <br>
 بتاريخ 10 نونبر 
        2008
        

</p>

    
    <?php

        
      $sql1="SELECT etudiant.numApogee, etudiant.numEtd, etudiant.nom, etudiant.prenom, etudiant.filliere, etudiant.semestre, fraude.idFraude, fraude.description, fraude.anneeUniversitaire, fraude.session, fraude.loginR, conseildiscipline.idConseil, conseildiscipline.loginS, conseildiscipline.date, conseildiscipline.PV
FROM etudiant 
INNER JOIN conseildiscipline ON conseildiscipline.numApogee = etudiant.numApogee 
INNER JOIN fraude ON fraude.numApogee = etudiant.numApogee
      WHERE fraude.anneeUniversitaire = '$annUniv'  AND fraude.session = '$session' AND conseildiscipline.date = '$dateC'
      ORDER BY fraude.idFraude ASC;";
          $reslt1=mysqli_query($link, $sql1);
          if(!$reslt1){
          
              header("Location: listeFraudePV.php?error1=هناك مشكلة ، حاول مرة أخرى");
              exit();
          }
          else{
            if(mysqli_num_rows($reslt1)==0){
             
              header("Location: listeFraudePV.php?error=المعلومات غير صحيحة ، يرجى المحاولة مرة أخرى");
              exit();
            }
            else{
            ?>
        <table class="table table-bordered">
            <thead class="border border-dark">
            <tr>
                <th scope="col" style="width: 400px">قرار المجلس</th>
              <th scope="col" style="width: 460px">طبيعة الغش</th>
              <th scope="col" style="width: 250px">المسلك</th>
              <th scope="col">ر.ط</th>
              <th scope="col" style="width: 250px">الاسم و النسب</th>
              <th scope="col">الرقم</th>
              
            </tr>
          </thead>
          
          <tbody class="border border-dark">
            <?php
              while($row=mysqli_fetch_assoc($reslt1)){

    ?>
    <tr>
        <td scope="row"><?php echo $row['PV']; ?></td>
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
  }
    ?>
</table>
      <div class="text-center" >
       <?php if(isset($_GET['error'])){ ?>
          
          <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
       <button onclick="window.print();" class="btn btn-primary" id="printPageButton">طبع</button>
       <button type="submit" class="btn btn-primary" id="retour"><a href="listeFraudePV.php">رجوع</a></button>
    
      </div>
    </section> 
    </div>
  </body>
  
</html>

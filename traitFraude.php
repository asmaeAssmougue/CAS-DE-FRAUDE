<?php
include("connexion.php");
 session_start();
$loginS=$_GET['loginS'];
if(isset($_POST['submit']) && isset($_GET['id']) && isset($_GET['loginS'])){
    
    $mainid = $_GET['id'];
    if(empty($_POST['date'])){
    
        header("Location: fraude.php?error2=المرجو ملىء جميع الخانات&loginS=$loginS");
        exit(); 
    }else{
        $query="SELECT * FROM `notification` WHERE id='$mainid';";
        $resultQ=mysqli_query($link, $query);
        if(!$resultQ){
              header("Location: fraude.php?recupId=حدث خطأ ، حاول مرة أخرى&loginS=$loginS");
              exit();
        }
        else{
          if($dataQ=mysqli_fetch_assoc($resultQ)){
                $numApogee=$dataQ['numApogee'];
                
                $date=addslashes(htmlspecialchars($_POST['date']));
    
     
      $_SESSION['date']=$date;
    
      $sql0 = "INSERT INTO `conseildiscipline`(`loginS`, `date`, `PV`, `numApogee`) VALUES ('$loginS','$date','الملف في طور المعالجة','$numApogee') ON DUPLICATE KEY UPDATE loginS='$loginS', date='$date', PV='الملف في طور المعالجة';";
        $reslt0 = mysqli_query($link,$sql0);
        if(!$reslt0){
           
            header("Location: fraude.php?inscrire=حدث خطأ أثناء الإدراج ، حاول مرة أخرى&loginS=$loginS");
            exit();
        }
        else{
            
           $_SESSION['numApogee']=$numApogee;
            header("Location: listeSansPV.php?id=$numApogee&loginS=$loginS");
            exit();
        
        }
    
          }
        }

      
  
  
}
}else{
     header("Location: modifierFraude.php?errorEmpty=حدث خطأ ، حاول مرة أخرى&loginS=$loginS");
     exit();
}

?>
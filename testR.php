<?php

 include("connexion.php");
 session_start();
 
         if (empty($_POST['numApogee'])) {
        header("Location: rechercherEtud.php?error4=المرجو ملىء  جميع الخانات");
        exit(); 
    }else {
        $ident=$_POST['numApogee'];
        $query="SELECT * FROM `etudiant` WHERE numApogee = '$ident' OR CNE_CIN = '$ident';";
        $resultQ=mysqli_query($link, $query);
     
       if (!$resultQ || mysqli_num_rows($resultQ) == 0) {
             
             header('Location: rechercherEtud.php?recupId=رقم الطالب غير صحيح ، يرجى المحاولة مرة أخرى');
              exit();
        }
       else{
          
        if ($dataQ=mysqli_fetch_assoc($resultQ)) {
              
                $numApogee=$dataQ['numApogee'];
                 $_SESSION['numApogee']=$dataQ['numApogee'];
                $query2="SELECT * FROM `fraude` WHERE numApogee = '$numApogee';";
                 $reslt2=mysqli_query($link, $query2);
               
               if (!$reslt2) {
             
              header("Location: rechercherEtud.php?fraudeSave=حدث خطأ،حاول مرة أخرى");
              exit();
            }
            else{
            if ($reslt2) {
                 $rowr=mysqli_fetch_assoc($reslt2);
                 
                
                  $_SESSION['annUniv']=$rowr['anneeUniversitaire'];
                  $_SESSION['session']=$rowr['session'];
                  
                  $query3="SELECT * FROM `conseildiscipline` WHERE numApogee = '$numApogee';";
                 $reslt3 = mysqli_query($link, $query3);
                if (!$reslt3) {
                
                header("Location: rechercherEtud.php?fraudeSave2=حدث خطأ،حاول مرة أخرى");
                exit();
            }else{
            if ($fetch2=mysqli_fetch_assoc($reslt3)) {
                 
                $_SESSION['dateC']=$fetch2['date'];
                 header('Location: recherListeEtd.php');
                 exit();
                  }


               
                }  
            
    
          }
    
          }
        
        }
      
  
  }
       }
    
  
?>
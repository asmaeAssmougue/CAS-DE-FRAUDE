<?php
include('connexion.php');
session_start();
   if(empty($_POST['numEtd']) || empty($_POST['numApogee']) || empty($_POST['nom']) || empty($_POST['prenom']) || 
   empty($_POST['filliere']) || empty($_POST['optionF']) || empty($_POST['description']) || empty($_POST['anneeUnv']) || empty($_POST['session'])){     
    header("Location: enregistrerFraude.php?error=المرجو ملىء  جميع الخانات");
    exit();       
   }
   else{
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
                    header("Location: enregistreFraude.php?error1=المرجو الاختيار من الائحة");
                    exit();
            }
         $numEtd = $_POST['numEtd'];
         $numApogee = $_POST['numApogee'];
         $nom = $_POST['nom'];
         $prenom = $_POST['prenom'];
         $filliere = $_POST['filliere'];
         $querySel="SELECT `lib_fill` FROM `filliere` WHERE codeF = '$filliere';";
         $reseltSel=mysqli_query($link, $querySel);
         $dataSel=mysqli_fetch_assoc($reseltSel);
         $filliere=$dataSel["lib_fill"];
         $optionF = $_POST['optionF'];
         $description = $_POST['description'];
        
         $nom = addslashes(htmlspecialchars($nom));
         $prenom = addslashes(htmlspecialchars($prenom));
         $filliere = addslashes(htmlspecialchars($filliere));
         $optionF = addslashes(htmlspecialchars($optionF));
         $description = addslashes(htmlspecialchars($description));
         $anneeUnv = addslashes(htmlspecialchars($anneeUnv));
         $session = addslashes(htmlspecialchars($session));
         $loginR=$_SESSION['loginR'];
         $_SESSION['numApogee']=$numApogee;
        $sql0 = "INSERT INTO `etudiant`(`numApogee`, `numEtd`, `nom`, `prenom`, `filliere`, `semestre`) VALUES ('$numApogee','$numEtd','$nom','$prenom','$filliere','$optionF') ON DUPLICATE KEY UPDATE numEtd='$numEtd', nom='$nom', prenom='$prenom', filliere='$filliere', semestre='$optionF' ";
        $reslt0 = mysqli_query($link,$sql0);
        if(!$reslt0){
          
            header("Location: enregistrerFraude.php?inscrire=حدث خطأ أثناء الإدراج ، حاول مرة أخرى");
            exit();
        }
        else{
            $sql1 = "INSERT INTO `fraude`(`description`, `anneeUniversitaire`, `session`, `loginR`, `numApogee`) VALUES ('$description','$anneeUnv','$session','$loginR','$numApogee') ON DUPLICATE KEY UPDATE description='$description',anneeUniversitaire='$anneeUnv', session='$session', loginR='$loginR';";
            $reslt1 = mysqli_query($link,$sql1);
            if(!$reslt1){
         
            header("Location: enregistrerFraude.php?fraudeSave=حدث خطأ أثناء الإدراج ، حاول مرة أخرى$sql1");
            exit();
        }else{
          
           
            $date=date('y-m-d h:i:s');
            $sql="INSERT INTO `notification`(`numApogee`, `date`) VALUES ('$numApogee','$date')";
            $reslt=mysqli_query($link, $sql);
            if($reslt){
                header("Location: enregistrerFraude.php?success= تم إرسال الرسالة بنجاح!");
                exit();
            }else{
                header("Location: enregistrerFraude.php?errorEnvoie=هناك مشكلة ، حاول مرة أخرى");
                exit();
            }
           
        }

        }
            
   }
   mysqli_close($link);
?>

















?>
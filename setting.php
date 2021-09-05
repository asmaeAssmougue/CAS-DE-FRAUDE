<?php
include('connexion.php');
session_start();


   if(empty($_POST['numEtd']) || empty($_POST['numApogee']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['optionF']) || empty($_POST['description']) || empty($_POST['anneeUnv']) || empty($_POST['date']) || empty($_POST['PV'])){     
    header("Location: modifierInfo.php?error=المرجو ملىء  جميع الخانات");
    exit();       
   }
   else{
       $PV=addslashes(htmlspecialchars($_POST['PV']));
       $dateC=addslashes(htmlspecialchars($_POST['date']));
      $anneeUnv=$_POST['anneeUnv'];
      $session=$_POST['session'];
      $sess=$_SESSION['session'];
      $apo=$_SESSION['numApogee'];
      switch ($session) {
            
                case 'hiverAutomne':
                    $session="خريف-شتاء";
                    break;
                case 'etePrint':
                    $session="ربيع-صيف";
                    break;
               
                default:
                    $session=$sess;
                    break; 
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
        $sql0 = "UPDATE `etudiant` SET `numApogee` = '$numApogee', `numEtd` = '$numEtd', `nom` = '$nom', `prenom` = '$prenom', `filliere` = '$filliere', `semestre` = '$optionF'  WHERE numApogee = '$apo';";
        $reslt0 = mysqli_query($link,$sql0);
        if(!$reslt0){
          
            header("Location: modifierInfo.php?inscrire=حدث خطأ أثناء الإدراج ، حاول مرة أخرى");
            exit();
        }
        else{

            $sql1 = "UPDATE `fraude` SET `description`='$description',`anneeUniversitaire`='$anneeUnv',`session`='$session',`numApogee`='$numApogee' WHERE numApogee = '$apo';";
            $reslt1 = mysqli_query($link,$sql1);
            if(!$reslt1){

               header("Location: modifierInfo.php?inscrire=حدث خطأ أثناء الإدراج ، حاول مرة أخرى");
               exit();
            }
            else{
                $sql2 = "UPDATE `conseildiscipline` SET `date`='$dateC',`PV`='$PV',`numApogee`='$numApogee' WHERE numApogee = '$apo';";
                $reslt2 = mysqli_query($link,$sql2);
                if(!$reslt2){
                
                    header("Location: modifierInfo.php?inscrire=حدث خطأ أثناء الإدراج ، حاول مرة أخرى");
                    exit();
                }
                else{
                     header("Location: modifierInfo.php?succes=تم حفظ التغييرات بنجاح");
                     exit();
                }
            }
            
        }
   }
   mysqli_close($link);
?>

















?>
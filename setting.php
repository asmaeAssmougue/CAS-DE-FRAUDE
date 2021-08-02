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
          
          $fill=$_SESSION['filliere'];
            switch ($filliere) {
               
                case 'arabe':
                    $filliere="قانون بالعربية";
                    break;
                case 'francais':
                    $filliere="Droit en Français";
                    break;
                case 'economie':
                    $filliere="Economie de Gestion";
                    break;
                     case 'politique':
                $filliere="Sciences Politiques";
                    break;
                case 'LSEG':
                    $filliere="Licence D'études Fondamentales en Sciences Economiques et Gestion";
                    break;
                case 'LDF':
                    $filliere="Licence D'études Fondamentales en Droit Français";
                    break;
                    case 'LDA':
                    $filliere=" الاجازة في القانون بالعربية";
                    break;
                case 'LSEG':
                    $filliere="Licence D'études Fondamentales en Sciences Economiques et Gestion";
                    break;
                case 'LSG':
                    $filliere="Licence D'études Fondamentales D'exellence en Sciences de Gestion";
                    break;
                     case 'LSP':
                $filliere="Licence D'études Fondamentales D'exellence en Sciences de Politiques";
                    break;
                     case 'LPM':
                    $filliere="Licence Professionnelle en Management PME-PMI";
                    break;
                case 'juridique':
                    $filliere=" العلوم القانونية ";
                    break;
                case 'droit':
                    $filliere="القانون العام والعلوم السياسية";
                    break;
                     case 'DSP':
                $filliere="Droit Publiques et Sciences Politiques";
                    break;
                        case 'ET':
                    $filliere="Economie des Territoires";
                    break;
                case 'SG':
                    $filliere="Sciences de Gestion";
                    break;
                case 'SE':
                    $filliere="Sciences Economiques";
                    break;
                     case 'FP':
                $filliere="Finance Publiques et Fiscalité(MS)";
                    break;       
                     case 'SJ':
                    $filliere="Sciences Juridiques ";
                    break;
                case 'MS':
                    $filliere="Migration et Societés(MS)";
                    break;
                     case 'GPP':
                $filliere="Genre et Politiques Publiques(MS)";
                    break;
                        case 'FI':
                    $filliere="Finance Islamique(MS)";
                    break;
                case 'AI':
                    $filliere="Administration Internationale et Gestion des partenariats dans l'espace Euro Mediterranee(MS)";
                    break;
                case 'DHL':
                    $filliere="(ماستر متخصص)حقوق الانسان القانون الدولي الانساني";
                    break;
                     case 'EE':
                $filliere="Economie de l'environnement";
                    break;  
                       case 'EEP':
                $filliere="Economie et Evaluation des Politiques Publiques";
                    break;  
                       case 'GFC':
                $filliere="Gestion Finance Comptable et Fiscale(MS)";
                    break;  
                       case 'MSRH':
                $filliere="Management Stratégiques des Ressources Humaines";
                    break;  
                     
                default:
                   $filliere=$fill;
                    break; 
            }
         $optionF = $_POST['optionF'];
         $description = $_POST['description'];
        
         $nom = addslashes(htmlspecialchars($nom));
         $prenom = addslashes(htmlspecialchars($prenom));
         $filliere = addslashes(htmlspecialchars($filliere));
         $optionF = addslashes(htmlspecialchars($optionF));
         $description = addslashes(htmlspecialchars($description));
         $anneeUnv = addslashes(htmlspecialchars($anneeUnv));
         $session = addslashes(htmlspecialchars($session));
         $loginR=$_SESSION['login'];
         $_SESSION['numApogee']=$numApogee;
        $sql0 = "UPDATE `etudiant` SET `numApogee`='$numApogee',`numEtd`='$numEtd',`nom`='$nom',`prenom`='$prenom',`filliere`='$filliere',`semestre`='$session'  WHERE numApogee = $apo";
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
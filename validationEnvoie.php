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
                    header("Location: enregistreFraude.php?error1=المرجو الاختيار من الائحة");
                    exit();
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
        $sql0 = "INSERT INTO `etudiant`(`numApogee`, `numEtd`, `nom`, `prenom`, `filliere`, `semestre`) VALUES ('$numApogee','$numEtd','$nom','$prenom','$filliere','$optionF')";
        $reslt0 = mysqli_query($link,$sql0);
        if(!$reslt0){
          
            header("Location: enregistrerFraude.php?inscrire=حدث خطأ أثناء الإدراج ، حاول مرة أخرى");
            exit();
        }
        else{
            $sql1 = "INSERT INTO `fraude`(`description`, `anneeUniversitaire`, `session`, `loginR`, `numApogee`) VALUES ('$description','$anneeUnv','$session','$loginR','$numApogee')";
            $reslt1 = mysqli_query($link,$sql1);
            if(!$reslt1){
             //echo $sql1;
            header("Location: enregistrerFraude.php?fraudeSave=حدث خطأ أثناء الإدراج ، حاول مرة أخرى");
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
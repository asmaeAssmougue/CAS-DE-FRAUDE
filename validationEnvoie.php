<?php
include('connexion.php');
session_start();


   if(empty($_POST['numEtd']) || empty($_POST['numApogee']) || empty($_POST['nom']) || empty($_POST['prenom']) || 
   empty($_POST['filliere']) || empty($_POST['optionF']) || empty($_POST['description'])){     
    header("Location: enregistrerFraude.php?error=veuillez remplir tous les champs");
    exit();       
   }
   else{
         $numEtd = $_POST['numEtd'];
         $numApogee = $_POST['numApogee'];
         $nom = $_POST['nom'];
         $prenom = $_POST['prenom'];
         $filliere = $_POST['filliere'];
         $optionF = $_POST['optionF'];
         $description = $_POST['description'];

         $nom = addslashes(htmlspecialchars($nom));
         $prenom = addslashes(htmlspecialchars($prenom));
         $filliere = addslashes(htmlspecialchars($filliere));
         $optionF = addslashes(htmlspecialchars($optionF));
         $description = addslashes(htmlspecialchars($description));
         $loginR=$_SESSION['login'];
        
        $sql0 = "INSERT INTO `etudiant`(`numApogee`, `numEtd`, `nom`, `prenom`, `filliere`, `optionFill`) VALUES ('$numApogee','$numEtd','$nom','$prenom','$filliere','$optionF')";
        $reslt0 = mysqli_query($link,$sql0);
        if(!$reslt0){
            
            header("Location: enregistrerFraude.php?inscrire=une erreur est produite lors de l'insertion reessayez");
            exit();
        }
        else{
            $sql1 = "INSERT INTO `fraude`(`description`, `anneeUniversitaire`, `session`, `loginR`, `numApogee`) VALUES ('$description','NULL','NULL','$loginR','$numApogee')";
            $reslt1 = mysqli_query($link,$sql1);
            if(!$reslt1){
            
            header("Location: enregistrerFraude.php?fraudeSave=une erreur est produite lors de l'insertion reessayez plus tard");
            exit();
        }else{
          
           
            $date=date('y-m-d h:i:s');
            $sql="INSERT INTO `notification`(`numApogee`, `date`) VALUES ('$numApogee','$date')";
            $reslt=mysqli_query($link, $sql);
            if($reslt){
                header("Location: enregistrerFraude.php?success= Message envoyé avec succes!");
                exit();
            }else{
                header("Location: enregistrerFraude.php?errorEnvoie=un prb est introduite reesayez!!");
                exit();
            }
           
        }

        }
            


   }
   mysqli_close($link);
?>

















?>
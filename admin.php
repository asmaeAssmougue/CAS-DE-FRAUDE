<?php
 include('connexion.php');
 session_start();
 if(isset($_POST['submit'])){
     header('Location: changerPwd.php');
     exit();
 }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>

    <link href="style8.css" rel="stylesheet" media="all" type="text/css" />
    <title>Admin</title>
  </head>
  <body>
    <header>
      <div class="menu">
        <nav
          class="navbar navbar-expand-lg navbar-light"
          style="background-color: #Ffcc00;"
        >
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img
                src="images/logoYIA.png"
                alt="logo"
               width="60";height="40"; style="margin-left:40px;"
            />
              </a>
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#"
                    >Acceuil</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="ajouterCompte.php"
                    >إضافة حساب</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="supprimerCompte.php"
                    >مسح حساب</a
                  >
                </li>
              </ul>
            
                <button
                  class="btn btn-outline-success"
                  type="submit"
                
                >
                 <a href="deconnexion.php" alt="">خروج</a> 
                </button>
           
            </div>
          </div>
        </nav>
      </div>
    </header>
    <section>
      <div class="p">
        <h1>
          Bienvenue dans l'espace admin
        </h1>
        
      </div>
       <form class="d-flex" method="POST" action="">
      <div class="reche">
        <button type="submit" class="btn btn-danger" name="submit" id="rech">
        تعديل حساب
        </button>
       
       
      </div>
</form>
    </section>
  </body>
</html>

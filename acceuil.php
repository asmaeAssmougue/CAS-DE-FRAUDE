<?php 
   include("connexion.php");
   session_start();
   if(isset($_POST['admin'])){
     header('Location: adminAute.php?succes=1');
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

    <link href="style1.css" rel="stylesheet" media="all" type="text/css"/>
    <title>Acceuil</title>
  </head>
  <body>
    <header>
      <div class="menu">
        <nav
          class="navbar navbar-expand-lg navbar-light"
          style="background-color: #33ebdc"
        >
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img
                src="images/logo3.png"
                alt="logo1AgdalUniv"
                width="280"
                height="60"
            /></a>
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
                  <a class="nav-link" href="connexionResponsable.php"
                    >مكتب الامتحانات</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="connexionSecretaire.php"
                    >الكتابة العامة</a
                  >
                </li>
              </ul>
              <form class="d-flex" method="POST" action="">
                <button
                  class="btn btn-outline-success"
                  type="submit"
                  name="admin"
                >
                  admin
                </button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <section>
      <div class="p">
        <h1>
          FSJE-Agdal e-<span
            style="
              color: #08e2f2;
              font-family: 'Varela Round', sans-serif;
              font-weight: bold;
            "
            >FRAUDE</span
          >
        </h1>
        <h2>Bureau des exams</h2>
      </div>
      <div class="reche">
        <button type="submit" class="btn btn-danger" id="rech">
          <a href="rechercherEtud.php">بحث</a>
        </button>
       
       
      </div>
    </section>
  </body>
</html>

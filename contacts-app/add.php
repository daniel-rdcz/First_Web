<?php

  require "database.php";

  $error = null;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nombre"]) || empty($_POST["link"])) {
      $error = "Favor de rellenar todos los campos";
    } else if (strlen($_POST["link"]) < 9){
      $error = "El link debe de ser de por lo menos 9 caracteres";
    }
    else {
      $nombre = $_POST["nombre"];
      $link = $_POST["link"];
  
      $statement = $conn->prepare("INSERT INTO dispositivos (nombre, link) VALUES (:nombre, :link)");
      $statement->bindParam("nombre", $_POST["nombre"]);
      $statement->bindParam("link", $_POST["link"]);
      $statement->execute();
  
      header("Location: index.php");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/darkly/bootstrap.min.css"
    integrity="sha512-ZdxIsDOtKj2Xmr/av3D/uo1g15yxNFjkhrcfLooZV5fW0TT7aF7Z3wY1LOA16h0VgFLwteg14lWqlYUQK3to/w=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <script
    defer
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"
  ></script>

  <!-- Static Content -->
  <link rel="stylesheet" href="./static/css/index.css" />

  <title>Directorio</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand font-weight-bold" href="#">
        <img class="mr-2" src="./static/img/logo.png" />
        Directorio
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="./index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./add.php">Añadir Dispositivo</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="container pt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Añadir Nuevo Dispositivo</div>
            <div class="card-body">
              <?php if ($error): ?>
                <p class="text-danger">
                  <?= $error ?>
                </p>
              <?php endif ?>
              <form method="POST" action="add.php">
                <div class="mb-3 row">
                  <label for="nombre" class="col-md-4 col-form-label text-md-end">Nombre</label>
    
                  <div class="col-md-6">
                    <input id="nombre" type="text" class="form-control" name="nombre" required autocomplete="nombre" autofocus>
                  </div>
                </div>
    
                <div class="mb-3 row">
                  <label for="link" class="col-md-4 col-form-label text-md-end">Link</label>
    
                  <div class="col-md-6">
                    <input id="link" type="tel" class="form-control" name="link" required autocomplete="link" autofocus>
                  </div>
                </div>
    
                <div class="mb-3 row">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>

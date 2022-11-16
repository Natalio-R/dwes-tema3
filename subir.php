<!DOCTYPE html>
<?php
require 'lengua.php';

function validarNombre()
{
  if ($_POST) {
    $fichero = $_FILES['file'];
    $nombreValidado = htmlspecialchars(trim($_POST['nameArchive']," "));
    $patronTexto = "/^[0-9a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
    $extension = pathinfo($fichero["name"], PATHINFO_EXTENSION);

    if (!empty($_POST)) {
      if ($extension == "pdf" || 
          $extension == "png" || 
          $extension == "jpeg" || 
          $extension == "jpg" || 
          $extension == "gif") {
        if (isset($_POST['nameArchive'])) {
          if (empty($_POST['nameArchive'])) {
            echo "<div class='alert alert-warning position-absolute top-0 end-0 mt-5 me-4' role='alert'><i class='bi bi-info-circle'></i> El nombre del fichero no puede estar vacío</div>";
          } else {
            if (preg_match($patronTexto, $_POST['nameArchive'])) {
              $nombreValidado = htmlspecialchars(trim($_POST['nameArchive']," "));
              $rutaDestino = "ficheros/" . $nombreValidado . "." . $extension;
              if (file_exists($rutaDestino)) {
                echo "<div class='alert alert-danger position-absolute top-0 end-0 mt-5 me-4' role='alert'><i class='bi bi-shield-exclamation'></i> ¡El nombre ya existe! Escribe uno diferente</div>";
              } else {
                move_uploaded_file($_FILES['file']['tmp_name'], $rutaDestino);
                echo "<div class='alert alert-info position-absolute top-0 end-0 mt-5 me-4' role='alert'><i class='bi bi-info-circle'></i> El fichero " . $nombreValidado . " se ha subido correctamente :)</div>";
              }
            } else {
              echo "<div class='alert alert-danger position-absolute top-0 end-0 mt-5 me-4' role='alert'><i class='bi bi-shield-exclamation'></i> ¡El nombre sólo puede contener letras y espacios!</div>";
            }
          }
        } else {
          echo "<div class='alert alert-danger position-absolute top-0 end-0 mt-5 me-4' role='alert'><i class='bi bi-shield-exclamation'></i> ¡No se han especificado todos los campos requeridos!</div>";
        }
      } else {
        echo "<div class='alert alert-danger position-absolute top-0 end-0 mt-5 me-4' role='alert'><i class='bi bi-shield-exclamation'></i> El tipo de archivo no es compatible <br> Los ficheros han de ser .pdf, .png, .jpeg o .gif</div>";
      }
    }
  }
}

?>
<html lang="es-ES">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MiniMyCloud - by Natalio R</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
  <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php?idioma=<?= $idioma ?>">MiniMyCloud</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php?idioma=<?= $idioma ?>"><?php echo getCadena('menu.inicio'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="subir.php?idioma=<?= $idioma ?>"><?php echo getCadena('menu.subir'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cloud.php?idioma=<?= $idioma ?>"><?php echo getCadena('menu.ficheros'); ?></a>
          </li>
        </ul>
        <form class="d-flex" action="#" method="get">
          <select class="form-select form-select-md me-2" name="idioma" aria-label=".form-select-md example">
              <option value="es" <?php if ($idioma == 'es') { echo 'selected'; }?>><?php echo getCadena('idioma.español'); ?></option>
              <option value="en" <?php if ($idioma == 'en') { echo 'selected'; }?>><?php echo getCadena('idioma.ingles'); ?></option>
          </select>
          <input type="submit" class="btn btn-secondary" value="<?php echo getCadena('idioma.boton'); ?>"></input>
        </form>
      </div>
    </div>
  </nav>

  <div class="container-fluid my-5">
    <div class="container">
      <?php echo "<h1 class='h1 mb-4 text-center'>" . getCadena('subida.titulo') . "</h1>"; ?>
      <form action="subir.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="nameArchive">
            <?php echo getCadena('subida.nombreFichero'); ?>
          </label>
          <input type='text' class="form-control mt-2" name="nameArchive">
        </div>
        <div class="mb-4">
          <label for="archive">
            <?php echo getCadena('subida.fichero'); ?>
          </label>
          <input type="file" class="form-control mt-2" name="file">
        </div>
        <?php echo validarNombre(); ?>
        <div class="row d-flex justify-content-center">
          <a href="cloud.php?idioma=<?= $idioma ?>" class="btn btn-outline-success col-sm-5 col-xs-12 mx-2"><?php echo getCadena('subida.botonV'); ?></a>
          <input type="submit" class="btn btn-success col-sm-5 col-xs-12 mx-2" value="<?php echo getCadena('subida.botonS'); ?>">
        </div>
      </form>
    </div>
  </div>

  <div class="container-fluid">
    <div class="container">
      <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item"><a href="index.php?idioma=<?= $idioma ?>" class="nav-link px-2 text-muted"><?php echo getCadena('menu.inicio'); ?></a></li>
          <li class="nav-item"><a href="subir.php?idioma=<?= $idioma ?>" class="nav-link px-2 text-muted"><?php echo getCadena('menu.subir'); ?></a></li>
          <li class="nav-item"><a href="cloud.php?idioma=<?= $idioma ?>" class="nav-link px-2 text-muted"><?php echo getCadena('menu.ficheros'); ?></a></li>
        </ul>
        <p class="text-center text-muted">©2022 Natalio, Inc</p>
      </footer>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
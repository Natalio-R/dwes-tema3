<!DOCTYPE html>
<?php
require 'lengua.php';
?>
<html lang="es-ES">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MiniMyCloud - by Natalio R</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
            <a class="nav-link active" aria-current="page" href="index.php?idioma=<?= $idioma ?>"><?php echo getCadena('menu.inicio'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="subir.php?idioma=<?= $idioma ?>"><?php echo getCadena('menu.subir'); ?></a>
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
    <div class="container d-flex flex-column justify-content-center align-items-center">
      <?php echo "<h1 class='display-1 text-center'>" . getCadena('bienvenida') . "</h1>"; ?>
      <?php echo "<p class='fs-3 text-center'>" . getCadena('subparrafo') . "</p>"; ?>
      <?php echo "<a class='btn btn-primary text-center' title='". getCadena('inicio.subida.tooltip') ."' href='subir.php?idioma=<?= $idioma ?>'>" . getCadena('inicio.subida') . "</a>"; ?>
    </div>
  </div>

  <div class="container-fluid">
    <div class="container">
      <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted"><?php echo getCadena('menu.inicio'); ?></a></li>
          <li class="nav-item"><a href="subir.php" class="nav-link px-2 text-muted"><?php echo getCadena('menu.subir'); ?></a></li>
          <li class="nav-item"><a href="cloud.php" class="nav-link px-2 text-muted"><?php echo getCadena('menu.ficheros'); ?></a></li>
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
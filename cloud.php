<!DOCTYPE html>
<?php
require 'lengua.php';

function mostrarFicheros($file_ext)
{
  $ruta = "./ficheros/";
  $dir = dir($ruta);

  while ($archivo = $dir -> read()) {
    $archivoS = htmlspecialchars(trim($archivo, " "));
    $filN = $ruta . "/" . $archivo;
    $bytes = filesize($filN);
    $subida = date('d/m/Y - H:i:s', filemtime($filN));
    $download = getCadena('ficheros.descargar');
    $view = getCadena('ficheros.ver');
    $delete = getCadena('ficheros.eliminar');

    if ($archivo != "." && $archivo != ".") {
      if (strtolower(substr($archivo, -3) == $file_ext)) {
        if ($file_ext == "pdf") {
          echo <<<END
            <tr class="row">
              <th class="col-sm-4 col-xs-3 d-flex align-items-center">$archivo</th>
              <td class="col-sm-4 col-xs-3 d-flex align-items-center justify-content-center">$ruta$archivo</td>
              <td class="col-sm-4 col-xs-3 d-flex justify-content-end">
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-primary"><a title="$download" href="ficheros/$archivo" download="$archivo"><i class="bi bi-arrow-down-circle"></i></a></button>
                  <button type="button" class="btn btn-secondary"><a title="$view" href="ficheros/$archivo"><i class="bi bi-eye"></i></a></button>
                  <button type="button" class="btn btn-danger"><a title="$delete" href="eliminar.php?name=ficheros/$archivo"><i class="bi bi-trash"></i></a></button>
                </div>
              </td>
            </tr>
          END;
        } elseif ($file_ext == "png" || $file_ext == "gif" || $file_ext == 'jpg' || $file_ext == 'jpeg') {
          if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
          } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
          } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
          } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
          } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
          } else {
            $bytes = '0 bytes';
          }
          
          echo <<<END
            <div class='card col-md-4 col-sm-6 col-xs-12'>
              <div class='card-body'>
                <div class="card-img-top border border-1 rounded" style="width:100%;overflow:hidden;">
                  <img src="./ficheros/$archivoS" alt="Imagen" title="$archivoS">
                </div>
                <h5 class='card-title py-2'>$archivoS</h5>
                <p class="card-text"><b>Fecha subida:</b> $subida <br><b>Tamaño:</b> $bytes</p>
                  <div class="btn-group d-flex justify-content-center" role="group">
                    <button type="button" class="btn btn-primary"><i class="bi bi-arrow-down-circle"></i><a title="$download" href="ficheros/$archivo" download="$archivo"></a></button>
                    <button type="button" class="btn btn-secondary"><i class="bi bi-eye"></i><a title="$view" href="ficheros/$archivo"></a></button>
                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i><a title="$delete" href="eliminar.php?name=ficheros/$archivo"></a></button>
                  </div>
              </div>
            </div>
          END;
        }
      }
    }
  }
  $dir -> close();
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
  <style>
    a {
      text-decoration: none;
      color: #fff;
    }
    a:hover {
      color: #fff;
    }
    img {
      width: 100%;
    }
  </style>

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
            <a class="nav-link" href="subir.php?idioma=<?= $idioma ?>"><?php echo getCadena('menu.subir'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="cloud.php?idioma=<?= $idioma ?>"><?php echo getCadena('menu.ficheros'); ?></a>
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

  <div class="container-fluid">
    <div class="container pt-4 pb-4">
      <?php echo "<h1 class='h1 mb-2'>" . getCadena('ficheros.titulo1') . "</h1>"; ?>
      <table class="table table-striped">
        <thead>
          <tr class="row">
            <?php echo "<th class='col-sm-4'>" . getCadena('ficheros.nombre') . "</th>"; ?>
            <?php echo "<th class='col-sm-4 text-center'>" . getCadena('ficheros.ruta') . "</th>"; ?>
          </tr>
        </thead>
        <tbody>
          <?php echo mostrarFicheros("pdf"); ?>
        </tbody>
      </table>
      <?php echo "<h1 class='h1 mb-2 mt-5'>" . getCadena('ficheros.titulo2') . "</h1>"; ?>
      <div class="row">
        <?php echo mostrarFicheros("png"); ?>
        <?php echo mostrarFicheros("jpeg"); ?>
        <?php echo mostrarFicheros("jpg"); ?>
        <?php echo mostrarFicheros("gif"); ?>
      </div>
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
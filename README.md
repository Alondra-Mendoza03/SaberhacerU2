<html>
<html>
<head>
  <meta charset="utf-8">
  <title>Stackfindover: Sign in</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="http://blog.stackfindover.com/" rel="dofollow">Registrate con Nosotros</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15"></span>
              <form id="stripe-login" method="post">
              <div class="field padding-bottom--24">
                  <label for="text">Matricula</label>
                  <input type="text" name="matricula" id="matricula">
                </div>
                <div class="field padding-bottom--24">
                  <label for="text">Nombre Materia</label>
                  <input type="text" name="nombre" id="nombre">
                </div>
                <div class="field padding-bottom--24">
                  <label for="text">Carrera</label>
                  <input type="text" name="carrera" id="carrera">
                </div>
                
                <div class="field padding-bottom--24">
                  <label for="text">Grupo</label>
                  <input type="text" name="grupo" id="grupo">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="text">Clave</label>
                  </div>
                  <input type="number" name="clave" id="clave">
                </div>
               
                <div class="field padding-bottom--24">
                  <input type="submit" name="guardar" id="guardar" value="Continuar">
                </div>
                <div class="field">
                  <a class="ssolink" href="#"></a>
                </div>

                <div class="field padding-bottom--24">
                <a href="login.php" class="btn btn-primary">Inicia Sesion</a>

                </div>
                <div class="field">
                  <a class="ssolink" href="#"></a>
                </div>
              </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span>Don't have an account? <a href="">Sign up</a></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
        
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
</html>





<?php 
require_once 'db_conexion.php';

?>





<?php

class HashEncryption {
    public function hash($data) {
        return password_hash($data, PASSWORD_DEFAULT);
    }

    public function verify($data, $hash) {
        return password_verify($data, $hash);
    }
}

if(isset($_POST["guardar"])) {
    $nombre = $_POST['nombre'];
    $carrera = $_POST['carrera'];
    $matricula = $_POST['matricula'];
    $grupo = $_POST['grupo'];
    $clave = $_POST['clave'];
  
    // Crear una instancia de la clase de cifrado hash
    $hasher = new HashEncryption();
    
    // Aplicar hash a la contraseña
    $claveHash = $hasher->hash($clave);

    // Insertar los datos cifrados en la base de datos
    try {
        $sql = $cnnPDO->prepare("INSERT INTO tienda (nombre, carrera, matricula, grupo, clave)
            VALUES (:nombre, :carrera, :matricula, :grupo, :clave)");

        //Asignar los datos cifrados a los parámetros
        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':carrera', $carrera);
        $sql->bindParam(':matricula', $matricula);
        $sql->bindParam(':grupo', $grupo);
        $sql->bindParam(':clave', $claveHash);
        
        $sql->execute();
        unset($sql);

        header("location:index.php");
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

?>

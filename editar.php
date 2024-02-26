<?php
require 'db_conexion.php';
require 'SymmetricEncryption.php'; 

session_start();

if (isset($_POST['actualizar'])) {
    // Recuperar datos del formulario
    $nombre = $_POST['nombre'];
    $matricula = $_POST['matricula'];
    $carrera = $_POST['carrera'];
    
    // Establecer la clave de cifrado
    $encryptionKey = "8A!fz&2u9Dy@Q#Pb"; 
    
    
    $encryption = new SymmetricEncryption($encryptionKey);
    
    // Cifrar los datos
    $nombreCifrado = $encryption->encrypt($nombre);
    $matriculaCifrada = $encryption->encrypt($matricula);
    $carreraCifrada = $encryption->encrypt($carrera);

    // Actualizar los datos en la base de datos
    try {
        $sql = $cnnPDO->prepare("UPDATE tienda SET nombre = :nombre, matricula = :matricula, carrera = :carrera WHERE nombre = :nombre");
        $sql->bindParam(':nombre', $nombreCifrado);
        $sql->bindParam(':matricula', $matriculaCifrada);
        $sql->bindParam(':carrera', $carreraCifrada);
        
        $sql->execute();
        
        unset($sql);
        unset($cnnPDO);
        
        header("location: welcome.php");
        exit();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>

<html>
<head>
  <meta charset="utf-8">
  <title>Editar</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php 

include "conn.php";

$id=$_REQUEST['id'];

$sql = "SELECT * FROM tienda WHERE id =$id";
$resultado = $conexion->query($sql);

$Fila=$resultado->fetch_assoc();

 ?>
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
                  <input type="text" name="matricula" id="matricula" value="<?php echo $Fila['matricula'] ?>">
                </div>
                <div class="field padding-bottom--24">
                  <label for="text">Nombre Materia</label>
                  <input type="text" name="nombre" id="nombre"  value="<?php echo $Fila['nombre'] ?>">
                </div>
                <div class="field padding-bottom--24">
                  <label for="text">Carrera</label>
                  <input type="text" name="carrera" id="carrera"  value="<?php echo $Fila['carrera'] ?>">
                </div>
                
                
               
               
                <div class="field padding-bottom--24">
                  <input type="submit" name="actualizar" id="actualizar" value="actualizar">
                </div>
                <div class="field">
                  <a class="ssolink" href="#"></a>
                </div>

                
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</body>

</html>
    </div>
  </div>
</body>

</html>

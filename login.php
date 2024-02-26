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
          <h1><a href="http://blog.stackfindover.com/" rel="dofollow">Inicia Sesion</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15"></span>
              <form id="stripe-login" method="post">
                <div class="field padding-bottom--24">
                  <label for="text"> Matricula</label>
                  <input type="matricula" name="matricula" id="matricula">
                </div>
                <div class="field padding-bottom--24">
                  <label for="text">Contrasena</label>
                  <input type="password" name="password" id="password">
                </div>
                
               
                <div class="field padding-bottom--24">
                  <input type="submit" name="registrar" id="registrar" value="Registrar">
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
            <span> <a href=""></a></span>
          
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
</html>



<?php

require 'db_conexion.php';

class AsymmetricEncryption {
    private $publicKeyFile;
    private $privateKeyFile;

    public function __construct($publicKeyFile, $privateKeyFile) {
        $this->publicKeyFile = $publicKeyFile;
        $this->privateKeyFile = $privateKeyFile;
    }

    public function encrypt($data) {
        $publicKey = openssl_pkey_get_public(file_get_contents($this->publicKeyFile));
        openssl_public_encrypt($data, $encryptedData, $publicKey);
        return base64_encode($encryptedData);
    }

    public function decrypt($data) {
        $privateKey = openssl_pkey_get_private(file_get_contents($this->privateKeyFile));
        openssl_private_decrypt(base64_decode($data), $decryptedData, $privateKey);
        return $decryptedData;
    }
}

if(isset($_POST["registrar"])) {
    $matricula = $_POST['matricula'];
    $password = $_POST['password'];

    // Rutas a los archivos de clave pública y privada
    $publicKeyFile = 'ruta/a/tu/clave_publica.pem'; // Cambia esta ruta por la ruta real de tu clave pública
    $privateKeyFile = 'ruta/a/tu/clave_privada.pem'; // Cambia esta ruta por la ruta real de tu clave privada
    
    // Crear una instancia de la clase de cifrado asimétrico
    $encryption = new AsymmetricEncryption($publicKeyFile, $privateKeyFile);
    
    // Cifrar la contraseña
    $passwordCifrado = $encryption->encrypt($password);

    try {
        $sql = $cnnPDO->prepare("INSERT INTO registros (matricula, password) VALUES (:matricula, :password)");

        //Asignar los datos cifrados a los parámetros
        $sql->bindParam(':matricula', $matricula);
        $sql->bindParam(':password', $passwordCifrado);
     
        $sql->execute();
        unset($sql);

        header("location:welcome.php");
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

?>


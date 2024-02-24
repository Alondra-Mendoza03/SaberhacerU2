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
                  <label for="text">Nombre</label>
                  <input type="nombre" name="nombre" id="nombre">
                </div>
                <div class="field padding-bottom--24">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email">
                </div>
                <div class="field padding-bottom--24">
                  <label for="text">Celular</label>
                  <input type="celular" name="celular" id="celular">
                </div>
                <div class="field padding-bottom--24">
                  <label for="text">Matricula</label>
                  <input type="matricula" name="matricula" id="matricula">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">Password</label>
                  </div>
                  <input type="password" name="password" id="password">
                </div>
               
                <div class="field padding-bottom--24">
                  <input type="submit" name="guardar" id="guardar" value="Continue">
                </div>
                <div class="field">
                  <a class="ssolink" href="#">Use single sign-on (Google) instead</a>
                </div>
              </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span>Don't have an account? <a href="">Sign up</a></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <span><a href="#">© Stackfindover</a></span>
              <span><a href="#">Contact</a></span>
              <span><a href="#">Privacy & terms</a></span>
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
if(isset($_POST["guardar"]))
{
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $matricula = $_POST['matricula'];
    $password = $_POST['password'];
  

       // $imgContent = addslashes(file_get_contents($imagen));     

        $sql=$cnnPDO->prepare("INSERT INTO tienda
            (nombre, email, celular, matricula, password ) VALUES (:nombre, :email, :celular, :matricula, :password)");

        //Asignar el contenido de las variables a los parametros
        $sql->bindParam(':nombre',$nombre);
        $sql->bindParam(':email',$email);
        $sql->bindParam(':celular',$celular);
        $sql->bindParam(':matricula',$matricula);
        $sql->bindParam(':password',$password);
       
      
            header("location:index.php");

        //Ejecutar la variable $sql
        $sql->execute();
        unset($sql);   

    }

?>

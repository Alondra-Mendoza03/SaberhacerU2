
<html>
<head>
  <meta charset="utf-8">
  <title>Materias registradas</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <div class="login-root" >
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--84">
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
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 2; z-index: 9;  " >
        <div class="box-root padding-top--58 padding-bottom--24 flex-flex flex-justifyContent--center" >
          <h1><a href="http://blog.stackfindover.com/" rel="dofollow">Materias</a></h1>
        </div>
        
              <form  id="stripe-login" method="post">
             
              <table class="table">
        <thead class="table-warning">
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">carrera</th>
            <th scope="col">Matricula</th>
            <th scope="col">Grupo</th>
            <th scope="col">clave</th>
            



            </tr>
        </thead>
        <?php
             require 'db_conexion.php';
                $sql = "SELECT * FROM tienda";
                $stmt = $cnnPDO->prepare($sql);
                $stmt->execute();
            ?>
            <?php 
	        while ($campo = $stmt->fetch(PDO::FETCH_ASSOC)) {
                   echo' <tbody>';
                       echo' <tr>';
                        echo'<th scope="row">'. $campo['nombre'].'</th>';
                        echo'<td>'. $campo['carrera'].'</td>';
                        echo'<td>'. $campo['matricula'].'</td>';
                        echo'<td>'. $campo['grupo'].'</td>';
                        echo'<td>'. $campo['clave'].'</td>';
                        
                        echo'</tr>';
                   echo'</tbody>';
          
            }
            ?>
 
        
    
</table>
                
               
                

                
                
              </form>
            
          
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
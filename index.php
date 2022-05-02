<?php
    include('conexion/con_db.php');
    session_start();

    $alerta="";

    if(isset($_POST['nombres'])){
        if(!empty($_POST['nombres']) && !empty($_POST['apellidos'])
        && !empty($_POST['identificacion']) && !empty($_POST['correo'])
        && !empty($_POST['sede']) && !empty($_POST['contrasena'])
        && !empty($_POST['repetir'])){
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $identificacion = $_POST['identificacion'];
            $correo = $_POST['correo'];
            $sede = $_POST['sede'];
            $contrasena = $_POST['contrasena'];
            $repetir = $_POST['repetir'];
            
            if($contrasena === $repetir){
                
                $verificar="SELECT * FROM instructores WHERE cedula = $identificacion";
                $result = mysqli_query($conex, $verificar);
                if(!$result){
                    die("ERROR AL BUSCAR IDENTIFICACIÓN".mysqli_error($conex));
                }
                if(mysqli_num_rows($result) > 0 ){
                    echo "ESTE USUARIO YA EXISTE.";
                }else{
                    $sql = "INSERT INTO instructores(cedula, nombres, apellidos, correo, sede, contrasena)
                    values('$identificacion','$nombres','$apellidos','$correo','$sede','$contrasena');";
                    $resultado = mysqli_query($conex, $sql);
                    if(!$resultado){
                        die("ERROR AL REGISTRAR".mysqli_error($conex));
                    }
                    echo "Registro guardado con éxito."; 
                }

            }else{
                $alerta= "Las contraseñas no son iguales.";
            }            
    }
}

if (isset($_POST['cedula']) && isset($_POST['contra'])) {
    if (!empty($_POST['cedula']) && !empty($_POST['contra'])) {
        
        $cedula=$_POST['cedula'];
        $contra=$_POST['contra'];

        $sql="SELECT * FROM instructores WHERE cedula= $cedula";
        $result= mysqli_query($conex,$sql);

        if (!$result) {
            die('ERROR AL CONSULTAR INSTRUCTOR'.mysqli_error($conex));
        }
        
        if (mysqli_num_rows($result)>0) {
            $contraSQL=mysqli_fetch_array($result)['contrasena'];
            if ($contraSQL==$contra) {
                $_SESSION['instructor']=$cedula;
                header('Location: principal.php');
            } else {
                $alerta="Sus contraseñas no coinciden!";
            }
            
        } else {
            $alerta="Este usuario no se encuentra registrado!";
        }
        

    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Estilos-->
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>myApp</title>
</head>

<body>
    <div id="intro" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button data-bs-target="#intro" data-bs-slide-to="0" class="active"></button>
            <button data-bs-target="#intro" data-bs-slide-to="1"></button>
            <button data-bs-target="#intro" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-caption">
                    <h1>MyApp</h1>
                    <p>El nuevo sistema SENA para ingreso y salida de instructores y equipos.</p>
                </div>
                <img src="img/gente.jpg" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item">
                <div class="carousel-caption">
                    <h1>No más papel</h1>
                    <p>Adiós a las formas de ingreso y salida.</p>
                </div>
                <img src="img/papel.jpg" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item">
                <div class="carousel-caption">
                    <h1>Código QR</h1>
                    <p>Una manera ágil y sencilla de registrar su actividad.</p>
                </div>
                <img src="img/codigo.jpg" class="d-block w-100" alt="...">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#intro" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#intro" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>  
        </button>
    </div>
    <!--TARJETAS PARA REGISTRO DE USUARIOS E INICIAR SESIÓN-->
    <div class="alerta" style="text-align: center; margin-top: 10px; font-size: 25px; color: red;">
        <?php echo $alerta;?>
    </div>
    <div class="row tarjetas">
        <div class="card-A" style="width: 18rem;">
            <img class="card-img-top" src="img/register.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">REGISTRO A UN CLICK</h5>
              <p class="card-text">Si no tiene una cuenta en MyApp, puede crearla aquí:</p>
              <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearCuentaModal">CREAR UNA CUENTA</a>
            </div>
        </div>
        <div class="card-B" style="width: 18rem;">
            <img class="card-img-top" src="img/login.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">INGRESO AL SISTEMA</h5>
              <p class="card-text">Si ya se encuentra registrado, inicie sesión aquí:</p>
              <a href="iniciar_sesion.html" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#iniciarSesionModal">INICIAR SESIÓN</a>
            </div>
          </div>
    </div>
    <!--MODAL PARA CREAR UNA NUEVA CUENTA-->
    <div class="modal fade" id="crearCuentaModal" tabindex="-1" aria-labelledby="crearCuentaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container-fluid p-3 mt-3">
                    <form action="" method="POST">
                        <div class="modal-header">
                            <h1>REGISTRO DE USUARIOS</h1>
                        </div>
                       
                        <div class="mb-3">
                            <label for="nombresInput" class="form-label">NOMBRES</label>
                            <input type="text" class="form-control" name="nombres" id="nombresInput" placeholder="Escriba sus nombres" required>  
                        </div>

                        <div class="mb-3">
                            <label for="apellidosInput" class="form-label">APELLIDOS</label>
                            <input type="text" class="form-control" name="apellidos" id="apellidosInput" placeholder="Escriba sus apellidos"´required>
                        </div>

                        <div class="mb-3">
                            <label for="idInput" class="form-label">IDENTIFICACIÓN</label>
                            <input type="text" class="form-control" name="identificacion" id="idInput" placeholder="Número de documento" required>
                        </div>

                        <div class="mb-3">
                            <label for="emailInput" class="form-label">DIRECCIÓN DE CORREO MISENA</label>
                            <input type="email" class="form-control " name="correo" id="emailInput" placeholder="Correo misena" required>
                            <div id="emailHelp" class="form-text">Nunca compartiremos tu email con nadie más.</div>
                        </div>

                        <div class="mb-3">
                            <select class="form-select" name="sede" aria-label="Default select example" required>
                                <option selected>SEDE A LA QUE PERTENECE</option>
                                <option value="1">Colombo Alemán</option>
                                <option value="2">Calle 30</option>
                                <option value="3">Malambo</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="contraseñaInput" class="form-label">CONTRASEÑA</label>
                            <input type="password" class="form-control" name="contrasena" id="contraseñaInput" required>
                        </div>

                        <div class="mb-3">
                            <label for="repetirContra" class="form-label">REPITA SU CONTRASEÑA</label>
                            <input type="password" class="form-control" name="repetir" id="repetirContra" required>
                        </div>

                        <button type="submit" class="btn btn-primary">CREAR CUENTA</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>

    <!--MODAL PARA INICIAR SESIÓN-->
    <div class="modal fade" id="iniciarSesionModal" tabindex="-1" aria-labelledby="iniciarSesionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container-fluid p-3 mt-3">
                    <form action="" method="POST"> 
                        <div class="modal-header">
                            <h1>INICIAR SESIÓN</h1>
                        </div>
                  
                        <div class="mb-3">
                            <label for="idInput" class="form-label">IDENTIFICACIÓN</label>
                            <input type="number" class="form-control" name="cedula" id="idInput" placeholder="Digita tu numero de identificacion">
                        </div>
            
                        <div class="mb-3">
                            <label for="contraseñaInput" class="form-label">CONTRASEÑA</label>
                            <input type="password" class="form-control" name="contra" id="contraseñaInput" placeholder="Digita tu contraseña">
                        </div>
        
                        <button type="submit" class="btn btn-primary">INICIAR SESIÓN</button>
                    </form>
                </div>  
            </div>
        </div>      
    </div>
    
    <footer>
        <div>
            <p>Copyright...</p>
            <p>Copyright...</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
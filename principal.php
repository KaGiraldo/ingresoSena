<?php
    include('conexion/con_db.php');
    session_start();
    if (!isset($_SESSION['instructor'])) {
        header('Location: index.php');
    }

    $cedInstruc=$_SESSION['instructor'];
    $nombreUsuario="";

    $sql="SELECT * FROM instructores WHERE cedula= $cedInstruc";
    $result= mysqli_query($conex,$sql);

    if (!$result) {
        die('ERROR AL CONSULTAR INSTRUCTOR'.mysqli_error($conex));
    }

    while ($row = mysqli_fetch_array($result)) {
        $nombreUsuario=$row['nombres'].' '.$row['apellidos'];
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
    <link rel="stylesheet" href="estilos/principal.css">
    <title>Principal</title>
</head>

<body>
    <div class="container-fluid">
        <div class="operaciones">
            <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <a class="navbar-brand" href="#">Navbar</a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="principal.html">Inicio</a>
                            </li>
                      
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Acciones
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ingresoModal">Ingreso</a></li>
                          <li><a class="dropdown-item" href="#">Salida</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Editar mi perfil</a></li>
                        </ul>
                        </li>
                    
                        <li class="nav-item">
                            <a class="nav-link" href="#">Acerca de</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Cerrar sesión</a>
                        </li>
                        </ul>         
                    </div>
                </div>
            </nav> -->

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">DigiIngresos</a>
                    <span class="navbar-text">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ingresoModal">Ingreso</a></li>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bienvenido, <?php echo $nombreUsuario;?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                        </ul>
                        </li>
                    </ul>
                    </span>
                    </div>
                </div>
                </nav>
            
            <!-- MODAL PARA REGISTRAR ASISTENCIA -->
            <div class="modal fade" id="ingresoModal" tabindex="-1" aria-labelledby="ingresoModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ingresoModalLabel">POR FAVOR DILIGENCIE LOS CAMPOS PARA REGISTRAR INGRESO</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="">
                                <div class="mb-3">
                                    <label for="idDocumento" class="form-label">No. de documento</label>
                                    <input type="text" class="form-control" id="idDocumento" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="dispositivo" class="form-label">¿Qué dispositivo va a registrar?</label>
                                    <select class="form-select" aria-label="Default select example" id="dispositivo">
                                        <option selected value="ninguno">Ninguno</option>
                                        <option value="portatil">Portátil</option>
                                        <option value="celular">Celular</option>
                                        <option value="tablet">Tablet</option>
                                    </select>
                                </div>
                                    
                                <div class="form-group" id="dispositivoDiv">
                                    <div class="mb-3">
                                        <label for="marca" class="form-label">Marca del dispositivo</label>
                                        <input type="text" class="form-control" id="marca" placeholder="Digite el código del artículo">
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="serial" class="form-label">Serial o placa</label>
                                        <input type="text" class="form-control" id="serial" placeholder="Digite el código del artículo">
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="propietario" class="form-label">Propietario</label>
                                        <select class="form-select" aria-label="Default select example" id="propietario">
                                            <option selected value="sena">SENA</option>
                                            <option value="personal">Personal</option>
                                        </select>
                                    </div>
                                </div>    

                                <div class="mb-3" id="propietario+">
                                    <label for="autoriza" class="form-label">Autorizado por</label>
                                    <select class="form-select" aria-label="Default select example" id="autoriza">
                                        <option selected value="giovanni">Giovanni Zarco</option>
                                        <option value="manuel">Manuel Hormechea</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">¿Trajo vehículo?</label>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnradio2" id="btnradio3" autocomplete="off" checked>
                                        <label class="btn btn-outline-primary" for="btnradio3">SI</label>
                                      
                                        <input type="radio" class="btn-check" name="btnradio2" id="btnradio4" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btnradio4">NO</label>
                                    </div>
                                </div>

                                <div class="mb-3" id="placa">
                                    <label for="placaVehiculo" class="form-label">Placa del vehículo</label>
                                    <input type="text" class="form-control" id="placaVehiculo" placeholder="Digite el código del artículo">
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Generar QR</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <h1>Bienvenido a MyApp</h1>
        <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo fugiat asperiores omnis corporis in voluptas earum, autem officia, odit doloribus expedita. Debitis, corrupti earum molestias reiciendis quas possimus dolorem iure!
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
<?php
    include("db_conn.php");
    /** Conuslta para desplegar datos en el formulario */
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM pacientes WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $id =  $row['id'];
            $nombre = $row['nombre'];
            $apaterno = $row['a_paterno'];
            $amaterno = $row['a_materno'];
            $numexpediente = $row['num_expediente'];
            $sexo = $row['sexo'];
            $estatura = $row['estatura'];
            $peso = $row['peso'];
            $imc = $row['imc'];
        }
    }
    /**consulta para actualización de los datos  */
    if(isset($_POST['actualizar'])){        
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $apaterno = $_POST['apaterno'];
        $amaterno = $_POST['amaterno'];
        $numexpediente = $_POST['numexpediente'];
        $sexo = $_POST['sexo'];
        $estatura = $_POST['estatura'];
        $peso = $_POST['peso'];
        $imc = $peso / pow($estatura/100, 2);

        $query = "UPDATE pacientes set nombre = '$nombre', a_paterno = '$apaterno', a_materno = '$amaterno', num_expediente = '$numexpediente', sexo = '$sexo', estatura = '$estatura', peso = '$peso', imc = '$imc' WHERE id = '$id'";
        mysqli_query($conn, $query);

        /**Variables de sesión para las alertas bootstrap*/
        $_SESSION['mensaje'] = 'Registro Actualizado Satisfactoriamente';
        $_SESSION['tipo_mensaje'] ='info';
        header("Location: index.php");    
    }
?>
<!-- Formulario para la presentacion de datos a actualizar -->
<?php include("includes/header.php") ?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body">
                    <form action="editar_registro.php?id=<?=$_GET['id']?>" method="POST">
                        <h3 class="text-center">Modificación registro de pacientes</h3><br>
                        <div class="form-group">
                            <input type="text" name="nombre" id="" class="form-control" placeholder="Nombre(s)" value="<?=$nombre?>" autofocus><br>    
                        </div>
                        <div class="form-group">
                            <input type="text" name="apaterno" id="" class="form-control" placeholder="Apellido paterno" value="<?=$apaterno?>"><br>    
                        </div>
                        <div class="form-group">
                            <input type="text" name="amaterno" id="" class="form-control" placeholder="Apellido materno" value="<?=$amaterno?>"><br>    
                        </div>
                        <div class="form-group">
                            <input type="number" name="numexpediente" maxlength="9" id="" class="form-control" placeholder="Numero de expediente" value="<?=$numexpediente?>"><br>    
                        </div>
                        <select class="form-select" name="sexo">
                            <option selected><?=$sexo?></option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="No especificar">No especificar</option>
                        </select>
                        <br>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Estatura</span>
                            <input type="number" name="estatura" class="form-control" aria-label="estatura-centimetros" value="<?=$estatura?>">
                            <span class="input-group-text">cm</span>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Peso</span>
                            <input type="number" name="peso" class="form-control" aria-label="peso-kilogramos" value="<?=$peso?>">
                            <span class="input-group-text">kg</span>
                        </div>                    
                        <input type="submit" class="btn btn-success btn-block" name="actualizar" value="Actualizar">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include("includes/footer.php") ?>
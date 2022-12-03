<?php include("db_conn.php") ?>

<?php include("includes/header.php");?>
    
<div class="p-2">
    <div class="row">
        <!--Sección formulario para capruta de datos-->
        <div class="col-md-3">
            <!-- Validación para tarjetas de mensajes boostrap-->
            <?php if(isset($_SESSION['mensaje'])) { ?>
                <div class="alert alert-<?=$_SESSION['tipo_mensaje']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['mensaje']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();} ?><!--liberamos las variables de sesión-->
            
            <div class="card card-body">
                <form action="guardar_registro.php" method="POST">
                    <h3 class="text-center">Registro de pacientes</h3><br>
                    <div class="form-group">
                        <input type="text" name="nombre" id="" class="form-control" placeholder="Nombre(s)" autofocus><br>    
                    </div>
                    <div class="form-group">
                        <input type="text" name="apaterno" id="" class="form-control" placeholder="Apellido paterno" autofocus><br>    
                    </div>
                    <div class="form-group">
                        <input type="text" name="amaterno" id="" class="form-control" placeholder="Apellido materno" autofocus><br>    
                    </div>
                    <div class="form-group">
                        <input type="number" name="numexpediente" maxlength="9" id="" class="form-control" placeholder="Numero de expediente" autofocus><br>    
                    </div>
                    <select class="form-select" name="sexo" aria-label="Default select example">
                        <option selected>Seleccionar una opción</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="No especificar">No especificar</option>
                    </select>
                    <br>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Estatura</span>
                        <input type="number" name="estatura" class="form-control" aria-label="estatura-centimetros">
                        <span class="input-group-text">cm</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Peso</span>
                        <input type="number" name="peso" class="form-control" aria-label="peso-kilogramos">
                        <span class="input-group-text">kg</span>
                    </div>                    
                    <input type="submit" class="btn btn-success btn-block" name="guardar_registro" value="Registrar">
                </form>
            </div>
        </div>
        <!--Sección para visualización de la tabla de registros-->
        <div class="col-md-9">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>N° Expediente</th>
                            <th>Sexo</th>
                            <th>Estatura</th>
                            <th>Peso</th>
                            <th>IMC</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM pacientes"; 
                            $result_pacientes = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result_pacientes)) { ?>
                                <tr>
                                    <td><?=$row['nombre']?></td>
                                    <td><?=$row['a_paterno']?></td>
                                    <td><?=$row['a_materno']?></td>
                                    <td><?=$row['num_expediente']?></td>
                                    <td><?=$row['sexo']?></td>
                                    <td><?=$row['peso']?></td>
                                    <td><?=$row['estatura']?></td>
                                    <td><?=$row['imc']?></td>
                                    <td>
                                        <!--Columna para edición y eliminación de mensajes-->
                                        <a href="editar_registro.php?id=<?= $row['id']?>" class="btn btn-primary">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <a href="borrar_registro.php?id=<?= $row['id']?>" class="btn btn-danger ">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>     
</div>

<?php include("includes/footer.php");?> 
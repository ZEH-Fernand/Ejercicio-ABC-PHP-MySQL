<?php
    include("db_conn.php");
    /**consulta para la inserción de datos desde el formulario*/
    if(isset($_POST['guardar_registro'])){
        $nombre = $_POST['nombre'];
        $apaterno = $_POST['apaterno'];
        $amaterno = $_POST['amaterno'];
        $numexpediente = $_POST['numexpediente'];
        $sexo = $_POST['sexo'];
        $estatura = $_POST['estatura'];
        $peso = $_POST['peso'];
        $imc = $peso / pow($estatura/100, 2);  //calculo del imc
        $query = "INSERT INTO pacientes(nombre, a_paterno, a_materno, num_expediente, sexo, peso, estatura, imc) VALUES ('$nombre', '$apaterno', '$amaterno', '$numexpediente','$sexo', '$peso', '$estatura', '$imc')";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die('Query Failed'); /**integrar un mejor manejo de errores*/
        }                
        
        /**Variables de sesión para las alertas bootstrap*/
        $_SESSION['mensaje'] = 'Registro Guardado Satisfactoriamente';       
        $_SESSION['tipo_mensaje'] =  'success';
        
        header("Location: index.php");
    }
?>
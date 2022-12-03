<?php
    include("db_conn.php");
    /** Conuslta para borrar el registro seleccionado */
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM pacientes WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (!$result){
            die("Query Failed");
        }        
        /**Variables de sesión para las alertas bootstrap*/
        $_SESSION['mensaje'] = 'Registro Eliminado Satisfactoriamente';
        $_SESSION['tipo_mensaje'] ='danger';
        header("Location: index.php");
    }
?>

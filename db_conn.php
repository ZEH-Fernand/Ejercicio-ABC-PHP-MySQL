<?php
    session_start();

    /** Base de Datos */
    define( 'DB_NAME', 'hosp_farma' );
    /** Usuario */
    define( 'DB_USER', 'root' );
    /** Contraseña */
    define( 'DB_PASSWORD', '' );
    /** Hostname */
    define( 'DB_HOST', 'localhost' );
  
    try{
        $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        // echo "Conexión a BD exitosa";
        /** agregamos la codificacion para prevenir posibles futuros errores */ 
        $conn->set_charset("utf8");                
    } catch (Exception $e){        
        echo 'Falló la conexión: ' . $e->getMessage();
        header("Location: error.php");
    }
?>
<?php
date_default_timezone_set('America/Mexico_City');
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "login";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar si la conexión se ha establecido correctamente
if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}
$fecha = date("g:i a");

$ruta = "Respaldo_" . $dbname . "_" . date("d-m-Y-g-i");

// Nombre del archivo de backup
$backup_file = ''.$ruta.'/' . $ruta . '.sql';

// Comando para hacer el backup de la base de datos
$command = "mysqldump --user={$username} --password={$password} --host={$servername} {$dbname} > {$backup_file}";

mkdir("C:/xampp/htdocs/proyectos/Respaldo-automatico/data-base/$ruta");

// Ejecutar el comando
system($command);

// Comprobar si se ha creado correctamente el archivo de backup
if (file_exists($backup_file)) {
    echo "Backup de la base de datos creada correctamente.";
} else {
    echo "Error al crear el backup de la base de datos.";
}

// Cerrar la conexión
$conn->close();
?>
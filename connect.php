<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$database = "nombre_de_tu_base_de_datos";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Método CREATE (POST)
function crearUsuario($nombre, $apellido, $edad, $email, $direccion) {
    global $conn;
    $sql = "INSERT INTO Usuarios (nombre, apellido, edad, email, direccion) VALUES ('$nombre', '$apellido', $edad, '$email', '$direccion')";
    if ($conn->query($sql) === TRUE) {
        return "Usuario creado con éxito";
    } else {
        return "Error al crear usuario: " . $conn->error;
    }
}

// Método READ (GET)
function obtenerUsuarioPorId($id) {
    global $conn;
    $sql = "SELECT * FROM Usuarios WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return "No se encontró ningún usuario con el ID proporcionado";
    }
}

// Método UPDATE (PUT)
function actualizarUsuario($id, $nombre, $apellido, $edad, $email, $direccion) {
    global $conn;
    $sql = "UPDATE Usuarios SET nombre='$nombre', apellido='$apellido', edad=$edad, email='$email', direccion='$direccion' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return "Usuario actualizado con éxito";
    } else {
        return "Error al actualizar usuario: " . $conn->error;
    }
}

// Método DELETE (DELETE)
function eliminarUsuario($id) {
    global $conn;
    $sql = "DELETE FROM Usuarios WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return "Usuario eliminado con éxito";
    } else {
        return "Error al eliminar usuario: " . $conn->error;
    }
}

// Cerrar conexión a la base de datos
$conn->close();
?>

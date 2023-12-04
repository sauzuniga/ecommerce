<?php
include 'servicios/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pregunta = $_POST["pregunta"];

    // Puedes realizar validaciones adicionales aquí

    $sql = "INSERT INTO faqs_clientes (pregunta) VALUES ('$pregunta')";

    if ($conn->query($sql) === TRUE) {
        echo "Pregunta guardada exitosamente";
    } else {
        echo "Error al guardar la pregunta: " . $conn->error;
    }
}

$conn->close();
?>

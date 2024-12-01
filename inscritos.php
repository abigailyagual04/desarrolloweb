<?php
$conn = new mysqli('localhost', 'root', '', 'inscripcion_cursos');
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql_check = "SELECT * FROM inscritos WHERE email = '$email' AND curso_id = $curso_id";

$id_curso = isset($_GET['id_curso']) ? intval($_GET['id_curso']) : 0;
if ($id_curso > 0) {
    $sql = "SELECT nombre FROM cursos WHERE id = $id_curso";
    $result = $conn->query($sql);   

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre_curso = $row['nombre'];
    } else {
        echo "Curso no encontrado.";
        exit;
    }
} else {
    echo "Curso no válido.";
    exit;
}
$conn->close();
?>

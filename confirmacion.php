<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $id_curso = $_POST['id_curso'];


    $sql_user = "INSERT INTO usuarios (nombre, email) VALUES ('$nombre', '$email')";
    $conn->query($sql_user);
    $user_id = $conn->insert_id;


    $sql_inscripcion = "INSERT INTO inscripciones (id_usuario, id_curso) VALUES ($user_id, $curso_id)";
    $conn->query($sql_inscripcion);

    echo "Inscripción completada con éxito.";
}
?>



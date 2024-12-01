<?php

$host = 'localhost'; 
$user = 'root';
$password = ''; 
$dbname = 'inscripcion_cursos'; 


$conn = new mysqli($host, $user, $password, $dbname);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $id_curso = intval($_POST['id_curso']); 
    
    if (empty($nombre) || empty($email) || empty($id_curso)) {
        echo "Por favor, complete todos los campos.";
    } else {
       
     $sql_check = "SELECT * FROM inscritos WHERE email = '$email' AND id_curso = $id_curso";
        $result = $conn->query($sql_check);

        if ($result->num_rows > 0) {
            echo "Ya estás inscrito en este curso.";
        } else {
       
            $sql = "INSERT INTO inscripciones (nombre, email, id_curso) VALUES ('$nombre', '$email', $id_curso)";
            if ($conn->query($sql) === TRUE) {
                echo "¡Inscripción realizada con éxito!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}



$conn->close();
?>

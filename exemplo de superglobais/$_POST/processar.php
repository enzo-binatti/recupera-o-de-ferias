<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    

    echo "<h2>Dados Recebidos:</h2>";
    echo "Nome: " . htmlspecialchars($nome) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    

} else {

    echo "Por favor, envie o formulário primeiro.";
    echo "<a href='formulario.html'>Voltar ao formulário</a>";
}
?>
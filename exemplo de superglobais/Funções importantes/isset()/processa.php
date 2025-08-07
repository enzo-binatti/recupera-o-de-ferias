<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    

    if (isset($_POST['username'])) {
        $username = htmlspecialchars($_POST['username']);
        echo "Bem-vindo, " . $username . "!";
    } else {
        echo "Por favor, preencha o nome de usuário!";
    }
    

    $var1 = "teste";
    $var2 = null;
    
    echo "<br>Verificação múltipla: ";
    var_dump(isset($var1, $var2)); 
}
?>
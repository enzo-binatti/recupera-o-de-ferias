<?php

if(isset($_COOKIE['usuario'])) {
    echo "Usuário: " . htmlspecialchars($_COOKIE['usuario']) . "<br>";
} else {
    echo "Cookie 'usuario' não definido<br>";
}

if(isset($_COOKIE['preferencia_cor'])) {
    echo "Cor preferida: " . htmlspecialchars($_COOKIE['preferencia_cor']) . "<br>";
} else {
    echo "Cookie 'preferencia_cor' não definido<br>";
}

echo "<a href='apagar_cookie.php'>Apagar cookies</a>";
?>
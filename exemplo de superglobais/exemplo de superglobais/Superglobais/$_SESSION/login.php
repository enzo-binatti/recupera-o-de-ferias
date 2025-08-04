<?php
session_start();

$_SESSION['usuario'] = 'Enzo';
$_SESSION['logado'] = true;

echo "Sessão criada! <a href='perfil.php'>Ir para perfil</a>";
?>
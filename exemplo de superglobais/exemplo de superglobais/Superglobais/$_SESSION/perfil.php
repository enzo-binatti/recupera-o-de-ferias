<?php
session_start();

if (!isset($_SESSION['logado'])) {
    die("Acesso negado! Faça login primeiro.");
}

echo "Olá, " . $_SESSION['usuario'] . "! Você está logado.";
?>
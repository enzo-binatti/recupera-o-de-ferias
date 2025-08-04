<?php

$dados = [
    'nome' => 'Enzo',
    'idade' => 15,
    'profissao' => null
];

echo "Verificando índices do array:<br>";


if (isset($dados['profissao'])) {
    echo "Profissão está definida no array<br>";
} else {
    echo "Profissão não está definida no array<br>";
}


if (array_key_exists('profissao', $dados)) {
    echo "Índice profissão existe no array (mas pode ser null)<br>";
}
?>
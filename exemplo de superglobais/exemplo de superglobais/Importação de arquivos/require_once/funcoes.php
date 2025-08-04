<?php
function sanitizar($dados) {
    return htmlspecialchars(trim($dados));
}

function formatarData($data) {
    return date('d/m/Y', strtotime($data));
}
?>
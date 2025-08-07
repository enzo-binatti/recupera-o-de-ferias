<?php

setcookie("usuario", "", time() - 3600, "/");
setcookie("preferencia_cor", "", time() - 3600, "/");

echo "Cookies apagados com sucesso!<br>";
echo "<a href='COOKIE.php'>Criar cookies novamente</a>";
?>
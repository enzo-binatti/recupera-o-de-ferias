<?php

setcookie("usuario", "Enzo", time() + 3600, "/");
setcookie("preferencia_cor", "azul", time() + (86400 * 30), "/");

echo "Cookies criados com sucesso!<br>";
echo "<a href='ver_cookie.php'>Ver cookies</a>";
?>
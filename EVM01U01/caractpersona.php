<?php

require('persona.php');

$Persona = new Persona('Daniel','Henríquez','20-04-1987');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Evaluación Módulo 01 - Unidad 01 - Daniel Henríquez</title>
</head>

<body>

<?php
$Persona->imprime_caracteristicas();
?>

</body>
</html>
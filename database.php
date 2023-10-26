<?php

$banco_nome = 'provadoisdb';
$host = 'localhost';
$usuario = 'root';
$senha = '';

try {
  $mysqli = mysqli_connect($host, $usuario, '',$banco_nome );
} catch (\Throwable $th) {
  throw $th;
}

?>

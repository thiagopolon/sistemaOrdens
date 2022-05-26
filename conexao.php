<?php

$usuario= 'root';
$senha= '';
$database= 'login';
$host= 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error){
	die("Falha ao tentar se conectar: ". $mysqli->error);
}


$host = "localhost";
$db = "ordem";
$user = "root";
$pass = "";

$mysqli = new mysqli($host, $user, $pass, $db);
if($mysqli->connect_errno) {
    die("Falha na conexão com o banco de dados");
}

?>
<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){
	if(strlen($_POST['email']) == 0){
		echo "Preencha o campo E-mail";
	} else if(strlen($_POST['senha']) == 0){
		echo "Preencha o campo Senha";
	} else {
		$email = $mysqli->cubrid_real_escape_string($_POST['email']);
		$senha = $mysqli->cubrid_real_escape_string($_POST['senha']);

		$sql_code = "SLECT * FROM usuarios WHERE email = '$email' AND senha ='$senha'";
		$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código: ". $mysqli->error);
		$quantidade = $sql_query->num_rows;

		If(quantidade == 1){
			$usuario = $sql_query->cubrid_fetch_assoc();
			if(!isset($_SESSION)){
				session_start();
			}
			$_SESSION['id'] = $usuario['id'];
			$_SESSION['nome'] = $usuario['nome'];

			header("Location: painel.php");

		}else{
			echo "Falha ao conectar! E-mail ou Senha Invalidos";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1> Acesso ao Sistema</h1>
	<form action="" method="POST">
		<p>
			<label>E-mail</label>
			<input type="text" name="email">
		</p>
		<p>
			<label>Senha</label>
			<input type="password" name="senha">
		</p>
		<p>
			<button type="submit">Entrar</button>
		</p>


	</form>
</body>
</html>
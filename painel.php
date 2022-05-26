<?php

include('conexao.php');
if(!isset($_SESSION)){
	session_start();
}
include('protect.php');

?>

html:<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Painel de Ordens </title>
	<link rel="stylesheet" href="">
</head>
<body>
	Bem vindo ao Painel das Ordens, <?php echo $_SESSION['nome'];?>
	<p>
		<a href="logout.php">Sair</a>
	</p>
	
<h1>Lista de Ordens de Serviços</h1>
    <form action="">
        <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Digite para pesquisar" type="text">
        <button type="submit">Pesquisar</button>
        <button type="submit">Cadastrar ordem</button>
    </form>
    <br>
    <table width="600px" border="1">
        <tr>
            <th>Cliente</th>
            <th>Peça</th>
            <th>Tecnico</th>
            <th>Produto</th>
        </tr>
        <?php
        if (!isset($_GET['busca'])) {
            ?>
        <tr>
            <td colspan="4">Digite algo para pesquisar...</td>
        </tr>
        <?php
        } else {
            $pesquisa = $mysqli->real_escape_string($_GET['busca']);
            $sql_code = "SELECT * 
                FROM ordens 
                WHERE cliente LIKE '%$pesquisa%' 
                OR peca LIKE '%$pesquisa%'
                OR tecnico LIKE '%$pesquisa%'
                OR procuto LIKE '%$pesquisa%'";
            $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error); 
            
            if ($sql_query->num_rows == 0) {
                ?>
            <tr>
                <td colspan="4">Nenhum resultado encontrado...</td>
            </tr>
            <?php
            } else {
                while($dados = $sql_query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $dados['cliente']; ?></td>
                        <td><?php echo $dados['peca']; ?></td>
                        <td><?php echo $dados['tecnico']; ?></td>
                        <td><?php echo $dados['produto']; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        <?php
        } ?>
    </table>

	
</body>
</html>
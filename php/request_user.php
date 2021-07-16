<?php
// Inclui o arquivo que faz a conexão ao MySQL
include("connect.php");

$ident = $_GET['id'];

$dados= array();

$request = "SELECT * FROM usuario WHERE id LIKE '%".$ident."%'";

$sql = mysqli_query($conexao, $request);

while($row = mysqli_fetch_object($sql)){
    $dados[] = $row;
}

//Passando vetor em forma de json
echo json_encode($dados);

mysqli_close($conexao);
?>
<?php
// Dados do banco
$dbhost   = "hellohaj.mysql.database.azure.com";   #Nome do host
$db       = "HAJ";   #Nome do banco de dados
$user     = "ServerAdmin@hellohaj"; #Nome do usuário
$password = "3275Bet@24";   #Senha do usuário

$conexao = mysqli_connect($dbhost,$user,$password,$db);

/* if( $conexao ) {
    echo "Connection established.<br />";
}else{
    die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
} */
?>
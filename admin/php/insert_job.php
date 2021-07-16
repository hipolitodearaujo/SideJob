<?php
// Inclui o arquivo que faz a conexão ao MySQL
include("../../php/connect.php");
$func = $_POST['btn'];

// 0 - Edit Job
// 1 - Update Job
// 2 - Delete Job

// $isUpdate = $_POST['isUpdate'];
// Atualizar Banco de dados
// if($isUpdate){

// $request = "SELECT * FROM usuario WHERE id LIKE '%".$id."%'";
// $result = mysqli_query($conexao, $request);

// echo $func;

if ($func!="delete"){
    $jobTitle = $_POST["jobTitle"];
    $description = $_POST['description'];
    $location = $_POST['location'];
}

if($func == "update"){
    $id = $_POST['id'];
    $sql = "UPDATE job SET ";
    $sql .= "jobTitle = '$jobTitle',description = '$description',location='$location' WHERE id ='$id'";
//     echo "Atualizando user";
} else if ($func == "register"){
    $sql = "INSERT INTO job (jobTitle,description,location) VALUES ";
    $sql .= "('$jobTitle','$description', '$location')";
//     echo "Inserindo job";
} else if ($func == "delete"){
    $id = $_POST['id'];
    $sql = "DELETE FROM job WHERE id ='$id'";
}

//mysqli_free_result($result);
// Inserindo novo usuário    
// }else{
    
// }
  echo $sql;

mysqli_query($conexao,$sql) or die("Erro ao tentar cadastrar registro");
mysqli_close($conexao);

  header('Location:../table.html');
//echo "Cliente cadastrado com sucesso!";
?>



<!-- $id=$_GET['id']; -->

<!-- $nome = $_POST['USUARIO']; -->
<!-- $usuario = $_POST['USUARIO']; -->

<!-- include "conexao.php"; -->
<!-- $result= @mysql_query("UPDATE USUARIO SET nome = '$nome',usuario = '$usuario' WHERE id =$id"); -->
<!-- @mysql_close($con);  -->


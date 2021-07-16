<?php

include("../../php/connect.php");

$id = $_GET["id"];

$dados= array();

$request = "SELECT * FROM job WHERE id LIKE '%".$id."%'";

$sql = mysqli_query($conexao, $request);

while($row = mysqli_fetch_object($sql)){
    $dados[] = $row;
}

//Passando vetor em forma de json
// echo json_encode($dados);

echo '<div class="drupal-vars" style="display:none;">'.json_encode($dados).'</div>';

mysqli_close($conexao);

// echo $dados;

header('Location:../editJob.html');

?>
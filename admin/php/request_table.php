<?php
// Inclui o arquivo que faz a conexão ao MySQL
$abs_path = $_SERVER['DOCUMENT_ROOT'];

include($abs_path.'/php/connect.php');

// $ident = $_GET['id'];

$dados= array();

$request = "SELECT id, jobTitle, description, location, creationTime, modification_time FROM job";

$sql = mysqli_query($conexao, $request);

while($row = mysqli_fetch_object($sql)){
    echo '<tbody>';
    
    echo '<tr>';
    
    echo '<td> <a href="editJob.html?id='.$row->id.'?title='.$row->jobTitle.'?description='.$row->description.'?location='.$row->location.'">'.$row->id.'</a> </td>';
       
    echo '<td>'.$row->jobTitle.'</td>';
    
    echo '<td>'.$row->description.'</td>';
    
    echo '<td>'.$row->location.'</td>';
    
    echo '<td>'.$row->creationTime.'</td>';
    
    echo '<td>'.$row->modification_time.'</td>';
    
    echo '</tr>';
    
    echo '</tbody>';
}

// while($row = mysqli_fetch_object($sql)){
//     $dados[] = $row;
// }

//Passando vetor em forma de json
// echo json_encode($dados);

mysqli_close($conexao);
?>
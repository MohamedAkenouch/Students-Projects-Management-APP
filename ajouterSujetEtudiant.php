<?php 
session_start();
require_once 'config.php';



$id=$_SESSION['etudiant_id'];
$idSujet=$_REQUEST['idSujet'];



$sql1 = "select * from candidature where (idEtudiant=$id and idsujet=$idSujet ) or (idEtudiant=$id and etat='Validée') ";
$result = mysqli_query($link, $sql1);

if ($result->num_rows == 0) {
    
    $sql2="insert into candidature (idEtudiant, idsujet ) values ($id,$idSujet)";
    $stmt = mysqli_query($link, $sql2);
}



    
  










?>
<?php 

session_start();
require_once 'config.php';



$id=$_SESSION['etudiant_id'];
$idSujet=$_GET['idSujet'];


$stmt = mysqli_prepare($link, "DELETE FROM candidature WHERE idEtudiant=? and idsujet=?");
mysqli_stmt_bind_param($stmt, 'ii', $id, $idSujet);
mysqli_stmt_execute($stmt);


header("location: MonEspace.php");


?> 
<?php 


$id=$_SESSION['etudiant_id'];


$sql = "select * from candidature where idEtudiant=$id and etat='Validée' ";
$test = mysqli_query($link, $sql);

if ($test->num_rows > 0) {
    include 'MonEspaceEtudiantPhase2.php'; 

}else{
    include 'MonEspaceEtudiantPhase1.php'; 
}




?>

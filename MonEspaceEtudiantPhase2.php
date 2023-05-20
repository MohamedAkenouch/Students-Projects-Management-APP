
<?php 



$titre=$encadrant=$email=$domaine=$description='';
$id=$_SESSION['etudiant_id'];


$sql = "select idsujet  from candidature where idEtudiant=$id and etat='Validée' ";
$result=mysqli_query($link, $sql);
$row=$result->fetch_assoc();
$idSujet=$row['idsujet'];

$sql = "select idEnseignant from sujet where idSujet=$idSujet";  
$result = mysqli_query($link, $sql);
$row=$result->fetch_assoc();
$idEnseignant=$row['idEnseignant'];

$sql = "select titre , domaine , descrip_tion from sujet  where idsujet=$idSujet" ;
$result = mysqli_query($link, $sql);
$row=$result->fetch_assoc();
$titre =$row['titre'];
$domaine= $row['domaine'];
$description= $row['descrip_tion'];

$sql = "select nom , prenom , email  from  enseignant  where idEnseignant=$idEnseignant" ;
$result = mysqli_query($link, $sql);
$row=$result->fetch_assoc();
$encadrant =$row['nom']." ". $row['prenom'];
$email=$row['email'];


$sql = "insert into etudiant (idEnseignant) values ($idEnseignant)" ;
$result = mysqli_query($link, $sql);


$sql = "update candidature set priorité=-1 where idEtudiant=$id " ;
$result = mysqli_query($link, $sql);






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon espace</title>
    <?php require_once 'links.php'; ?>
       
</head>
<body>
    <div id="edit">
    <?php require_once 'header.php'; ?>
    

    <div class="fluid-container" style="background-color: rgb(248,248,251);margin-top: 3%;margin-bottom: 3%;padding-bottom: 2%;">
        <div style="background-color: green;border-radius: 30px;float: right;margin-right: 5%;padding:10px 30px 0px 30px;margin-top: 1%;">
            <h4 style="color: white;">Validé<svg style="color: white;padding-left:10%;" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/>
            </svg></h4>
        </div>
    
        <h1 style="text-align: center;padding-top: 4%;padding-bottom: 3%;">SUJET AFFECTE</h1>
        <h5 style="margin-left: 10%;">NOM DU SUJET: <?php echo " ".$titre?></h5>
        <h5 style="margin-left: 10%;">DOMAINE: <?php echo " ".$domaine?></h5>
        <h5 style="margin-left: 10%;">NOM D'ANCADRANT: <?php echo " ".$encadrant?></h5>
        <h5 style="margin-left: 10%;">EMAIL D'ANCADRANT:<?php echo " ".$email?></h5>
        <div class="container" style="background-color:rgba(241,241,249);margin-top: 3% ;margin-bottom: 3%;padding: 2%;">
        <h5>DESCRIPTION DU SUJET:</h5>
        <p>  <?php echo " ".$description?><br>
        </p>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>

</div>

<?php require_once 'FicheEtudiant.php'; ?>
    <script>
        function myFunction() {
          $("#edit").addClass("fiche");
          $("#fiche").css({"display": "block", "opacity": "1"});
          $("#hide-fiche").css({"display": "block", "opacity": "1"});}
        function hide(){
          $("#edit").removeClass("fiche");
          $("#fiche").css({"display": "none"});
          $("#hide-fiche").css({"display": "none"});}  
    </script>

</body>
</html>
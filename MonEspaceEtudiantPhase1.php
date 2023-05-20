<?php 

$idSujet='';
$idEnseignant='';
$titre='';
$id=$_SESSION['etudiant_id'];


$sql = "select * from candidature where idEtudiant=?";
$stmt= mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "i",$id);
mysqli_stmt_execute($stmt);
$sujet = mysqli_stmt_get_result($stmt)


 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon espace</title>
    <?php require_once 'links.php';?>
</head>
<body>
<div id="edit">

    <?php require_once 'header.php';?>

    <div class="row" style="margin-top: 5%;margin-bottom: 5%;margin-right: 5%;margin-left: 5%;">
        <div class="col" style="background-color: rgba(231, 234, 255, 0.767);margin-left: 5%;margin-right: 5%;padding-top: 3%;padding-bottom:1%;">
            <h2 style="text-align: center;color: rgb(55, 55, 177);margin-bottom: 5%;">Sujets intéressants</h2>
            <div style="background-color:white;width: 90%;height: 600px;overflow: auto;margin-left: 5%;margin-right: 5%;">
                <ul style="list-style: none;">
                <?php while($row = mysqli_fetch_array($sujet)){
                            $idSujet=$row['idsujet'];
                            $sql = "select idSujet, idEnseignant ,titre from sujet where idSujet=$idSujet";
                            $stmt = mysqli_query($link, $sql);
                        
                                    while($row1=$stmt->fetch_assoc()){
                                        $idEnseignant=$row1['idEnseignant'];
                                        $sql="select nom, prenom from enseignant where idEnseignant=$idEnseignant;";
                                        $nomPrenomEnseignant = mysqli_query($link, $sql);
                                        $enseig=$nomPrenomEnseignant->fetch_assoc();
                                        $nomEnseignant= $enseig['nom']." ".$enseig['prenom'];
                                        $titre=$row1['titre'];
                                        $idSujet=$row1['idSujet'];
                                        ?>
      
                    <li style="margin-top: 3%;margin-bottom: 3%; background-color:rgba(231, 234, 255);margin-right: 5%;padding:3%;">
                        <div style="margin-left: 2%;">
                      

                       
                            
                       
                            <h4 style="margin: 0%;"><?php echo $titre?></h4>
                            
                            <p style="margin-left: 5%;margin-top: 0%;margin-bottom: 0%;"><?php echo $nomEnseignant ?> </p>
                        </div>
                       
                        <a href="annulerCandidature.php?idSujet=<?php echo $idSujet?>" style="color: red;float: right;margin-right: 3%;margin-top: -10%;text-decoration: none;" ><strong>Annuler</strong> </a>
                        
                    </li>
                    <?php }}?>
                    

                </ul>            
            </div> 
        </div>


        <div class="col" style="background-color: rgb(86, 86, 228);margin-left: 5%;margin-right: 5%;padding-top: 3%;padding-bottom:1%;">
            <h2 style="text-align: center;color: white;margin-bottom: 5%;">Liste des voeux</h2>
            <div style="background-color:white;width: 90%;height: 600px;overflow: auto;margin-left: 5%;margin-right: 5%;" id="list">
                <div id="response"> </div>
                <ul style="list-style: none;">
                <?php
                    $sql = "SELECT * FROM sujet INNER JOIN candidature ON sujet.idSujet=candidature.idsujet ORDER BY candidature.priorité ASC;";
                    $result = $link->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {?>

                    <li style="margin-top: 3%;margin-bottom: 3%; background-color:rgb(86, 86, 228);margin-right: 5%;padding:3%;" id="arrayorder_<?php echo $row["idsujet"] ?>">
                        <div style="margin-left: 2%;color: white;">
                            <h4 style="margin: 0%;"> <?php echo $row["titre"] ; ?> </h4>
                            <p style="opacity:0.6;margin: 0%;"><?php echo $row["idsujet"] ; ?></p>
                            <p style="margin-left: 5%;margin-top: 0%;margin-bottom: 0%;"><?php echo $row["priorité"] ; ?></p>
                        </div>
                        <a href="" style="color: red;float: right;margin-right: 3%;margin-top: -10%;text-decoration: none;" >Annuler</a>
                        

                <?php      
                      }
                    } else {
                        echo "0 results";
                    }
                ?>

                    </li>
                   
                </ul>
                    
            </div>
           
        </div>
    </div>
    <button style="color: white;background-color: blue;padding-left:2%;padding-top: 1%;padding-bottom: 1%;padding-right: 2%; margin-left:42%;margin-bottom: 5%;border-radius: 16px;border-style: none;">Enregister les modifications</button>
    <?php require_once 'footer.php';?>
    </div>
    
    <?php require_once 'FicheEtudiant.php';?>

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



    <script type="text/javascript">
    $(document).ready(function(){  
    function slideout(){
        setTimeout(function(){
        $("#response").slideUp("slow", function () {
            });
            }, 2000);
        }
  
    $("#response").hide();
    $(function() {
        $("#list ul").sortable({ opacity: 0.8, cursor: 'move', update: function() {
        var order = $(this).sortable("serialize") + '&update=update';
        $.post("update_liste_voeux.php", order, function(theResponse){
        $("#response").html(theResponse);
        $("#response").slideDown('slow');
        slideout();
        });                
        }             
        });
    });
 
    }); 
    </script>

</body>
</html>
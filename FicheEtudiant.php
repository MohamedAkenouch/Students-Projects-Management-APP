<?php 



$nom='';
$prenom='';
$filiere='';
$email='';
$niveau='';
$telephone='';
$competences='';
$projets='';
$motivation='';
$modif=false;
$id=$_SESSION['etudiant_id'];


$sql1 = "select nom , prenom,email , Motdepasse , tel , niveau , filiere ,competences , motivations,projetsrealises from etudiant where idEtudiant=?";
$stmt1 = mysqli_prepare($link, $sql1);
mysqli_stmt_bind_param($stmt1, "s", $id);
mysqli_stmt_execute($stmt1);
mysqli_stmt_bind_result($stmt1, $nom,$prenom ,$email, $Motdepasse , $telephone ,$niveau ,$filiere , $competences ,$motivation,$projets);
mysqli_stmt_fetch($stmt1);
mysqli_stmt_close($stmt1);



if ($_SERVER['REQUEST_METHOD']==='POST'){
    $projets=$_POST['projets'];
    $competences=$_POST['competences'];
    $motivation=$_POST['motivation'];
    $sql2="UPDATE etudiant SET competences=?, motivations=? ,projetsrealises=? where idEtudiant=?";
    $stmt = mysqli_prepare($link, $sql2);
    mysqli_stmt_bind_param($stmt, "sssi", $competences , $motivation, $projets, $id);
    if(mysqli_stmt_execute($stmt)){
        $modif=true;
    }
    mysqli_stmt_close($stmt);

    
}

 
    
    



?>
<link rel="stylesheet" href="Fiche.css">
<div id="hide-fiche" style="top:1%;display:none;position:fixed; left:97%" onclick="hide()">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
            <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
        </svg>
    </div>
    
</div>
    

            

    <div id="fiche" style="margin-top: 5%;margin-left: 10%;margin-right: 15%; display: none;top: 0px;position: fixed;left: 0px;background-color: white;width: 80%;height: auto;right: 0px;">
        <div style="background-color: white;position: absolute; top: 20%;width: 100%">
            <h1 style="text-align: center;margin-top: 5%;margin-bottom: 2%;">MA FICHE</h1>
      
               
           
            <form style="margin-left: 15%;" method="post" >
                <input   class="input" type="text" placeholder="Nom Complet" value="<?php echo $nom." ".$prenom?> ">
               
                
                <input   class="input" type="text" placeholder="FILIERE" value="<?php echo $filiere?>">
                <br>
                <input   class="input" type="text" placeholder="Email"value="<?php echo $email?>">
                <input   class="input" type="text" placeholder="NIVEAU" value="<?php echo $niveau?>">
                <br>
                <input style="margin-right: 60%;" class="input" type="text" placeholder="Telephone(optionnel)" value="<?php echo $telephone?>">
                <br>
                <textarea style="width: 40%;"  name='competences' placeholder="Competance..." ><?php echo $competences?></textarea>
                <textarea style="width: 40%;"  name='projets'  placeholder="projets realisés..."> <?php echo $projets?></textarea>
                <br>
                <textarea style="width: 82%;"   name= 'motivation' placeholder="Motivation..." ><?php echo $motivation?></textarea>
                <br>
                <div class="submitblock">
                    <input class="submit" type="submit" value="Enregistrer ">
                </div>
            </form>


        </div>
    </div>




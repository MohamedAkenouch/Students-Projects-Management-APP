<?php

session_start();
require_once 'config.php';


$idSujet='';
$idEnseignant='';
$nomEnseignant='';
$titre='';
$niveau='';
$filiere='';
$nbrOffre='';
$domaine='';
$description='';
$id=$_SESSION['etudiant_id'];




$sql1 = "select niveau , filiere from etudiant where idEtudiant=? ";
$stmt1= mysqli_prepare($link, $sql1);
mysqli_stmt_bind_param($stmt1, "i",$id);
mysqli_stmt_execute($stmt1);
$nivFil = mysqli_stmt_get_result($stmt1);
$row = mysqli_fetch_array($nivFil);
$niveau=$row['niveau'];
$filiere=$row['filiere'];






$sql = "select * from sujet where niveau=? and filiere=?  and nbrOffre > 0";
$stmt= mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "ss",$niveau, $filiere);
mysqli_stmt_execute($stmt);
$sujet = mysqli_stmt_get_result($stmt);










?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sujet</title>
        <?php require_once 'links.php'; ?>
        <style>
         
         .zone1{
             background-color: rgb(248, 248, 248);
             border-radius: 8px;
             padding: 45px 45px;
            
         }

         .titre{
             margin:auto;
             width: max-content;
         }

         .specif{
            margin:auto;
            width: 500px;

         }

         select,#niveau,#filiere{
            cursor: pointer;
             width: 200px;
             padding: 10px;
             border-radius: 8px;
             border: 1px solid rgb(230, 229, 229);
            
             color: rgb(55, 55, 177);
             background-color: rgba(231, 234, 255, 0.767);
             font-size: larger;
         }
       
        

         #niveau {
             float: right;
           
         }
         #filiere{
             float:left;
            
         }
        
       
        table{
            box-shadow: 0 5px 10px rgb(123, 123, 170);
            text-align: center;
            background-color: rgba(231, 234, 255, 0.767);
            margin-left: auto;
            margin-right: auto;
            
        
        }
        thead {
            box-shadow: 0 5px 10px rgb(123, 123, 170);
            

        }
        th {
            
            font-family: Arial, Helvetica, sans-serif;
            font-weight:700;
            padding: 19px 100px;
            
        }
        td {
            padding: 15px 100px;

        }
        td button {
            text-decoration: none;
            color: rgb(55, 55, 177);
            background-color: white;
            border-radius: 12px;
            border:0;
            padding: 7px  18px;
            box-shadow: 0 5px 10px rgb(123, 123, 170);
            transition : all 0.2s ease;
        }
     
      td a{
        text-decoration: none;
            color: rgb(55, 55, 177);
            background-color: white;
            border-radius: 12px;
           
            padding: 7px  18px;
            box-shadow: 0 5px 10px rgb(123, 123, 170);
            transition : all 0.2s ease;
         
            
        }
        .plus :hover {
            text-decoration: none;
            color: white;
            background-color: rgb(55, 55, 177);
            border-radius: 12px;
            
            padding: 7px  18px;
            box-shadow: 0 5px 10px rgb(123, 123, 170);*/
        } 
        </style>

    </head>
    <body>

    <div id="edit">
    <?php require_once 'header.php'; ?>
        <br>
        <div  class="zone1">
            <div> 
                
                <div class="titre">
                    <h1 >Sujets</h1>
                </div>
                <div class="specif">
                <?php if(!empty($_SESSION["enseignant_id"])){?>
                    <select id="filiere">
                        <option value="">Filière</option>
                        <option value="aseds">ASEDS</option>
                        <option value="data">DATA</option>
                        <option value="iccn">ICCN</option>
                        <option value="sesnum">SESNum</option>
                        <option value="amoa">AMOA</option>
                        <option value="smart">Smart-ICT</option>
                        <option value="cloud">SUD-CLOUD&IOT</option>
                        
                    </select>
                    <select  id="niveau" >
                        <option value="">Niveau</option>
                        <option value="ine1">INE1</option>
                        <option value="ine2">INE2</option>
                        <option value="ine3">INE3</option>
                    
                    </select>
                <?php } else{ ?>

                    <div id="filiere">Filière : <?php echo $filiere ;?></div>
                    <div id="niveau">Niveau :  <?php echo $niveau ;?></div>
                <?php } ?>
                </div>
                
             
            </div>
            <br>
            <br>
            <br>
            <div >
                <table class="table"> 
                    <thead>
                        <tr>
                            <th>Sujet</th>
                            <th>Enseignant</th>
                            <th>Domaine</th>
                            <th>Détails</th>
                        </tr>
                    </thead>
                    <tbody> 
                  
                          
                    <?php while($row = mysqli_fetch_array($sujet)){
                            $idEnseignant=$row['idEnseignant'];
                            $sql="select * from enseignant where idEnseignant=$idEnseignant;";
                            $nomPrenomEnseignant = mysqli_query($link, $sql);
                            $enseig=$nomPrenomEnseignant->fetch_assoc();
                            $nomEnseignant= $enseig['nom']." ".$enseig['prenom'];
                            $tel=$enseig['tel'];
                            $email=$enseig['email'];
                            $parcours = $enseig['parcours'];
                            $titre=$row['titre'];
                            $domaine=$row['domaine'];
                            $idSujet=$row['idSujet'];
                            $nbrOffre=$row['nbrOffre'];
                            $description=$row['descrip_tion'];

                            $sql1 = "select * from candidature where (idEtudiant=$id and idsujet=$idSujet ) or (idEtudiant=$id and etat='Validée') ";
                            $result = mysqli_query($link, $sql1);
                            
                            if ($result->num_rows == 0) {
                        
                            ?>
                            <tr >  
                            <td  ><?php echo $titre ?></td>
                            <td><button onclick="ficheEnseignant(this.value)" value="<?php echo $nomEnseignant.",".$tel.",".$email.",".$parcours?>" style="color:black ;background-color :rgba(231, 234, 255, 0.767); border:0px ;box-shadow:none "><?php echo $nomEnseignant ?></button></td>
                            <td><?php echo $domaine ?></td>
                            <td  class="plus" id="<?php echo $idSujet?>"><button onclick="DetailsSujet(this.value)" value="<?php echo $titre.",".$domaine.",".$filiere.",".$nbrOffre.",".$niveau.",".$description ; ?>" onclick="DetailsSujet(this.value)" > Plus...</button>
                            <button  value="<?php echo $idSujet ;?>" onclick="ajouter_sujet_etudiant(this.value)"> Ajouter</button></td> 
                            </tr>

                            <?php } }?>

                        }
                    
                    </tbody>
                </table>
            </div>
        </div>
        <?php require_once 'footer.php'; ?>
    </div>
    <?php 
    if(!empty($_SESSION["etudiant_id"])){
        require_once 'FicheEtudiant.php'; 
    } 
    if(!empty($_SESSION["enseignant_id"])){
        require_once 'FicheEnseignant.php'; 
    }
    require_once 'FicheSujet.php'; 
    require_once 'ficheEnseignantEtu.php';
    ?>

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
    <script>
        function DetailsSujet(str) {
            var s =str.split(",");
            var titre = s[0];
            var domaine = s[1];
            var filiere = s[2];
            var nbrOffre =s[3];
            var niveau = s[4];
            var description= s[5];
           
            document.getElementById("Titre").innerHTML=titre;
            document.getElementById("Domaine").innerHTML=domaine;
            document.getElementById("Filiere").innerHTML=filiere;
            document.getElementById("NbrOffre").innerHTML=nbrOffre;
            document.getElementById("Niveau").innerHTML=niveau;
            document.getElementById("Description").innerHTML=description;
           
          
      
            

            $("#edit").addClass("fiche");
            $("#DetailsSujet").css({"display": "block", "opacity": "1"});
            $("#hide-DetailsSujet").css({"display": "block", "opacity": "1"});}
            function hideDetailsSujet(){
            $("#edit").removeClass("fiche");
            $("#DetailsSujet").css({"display": "none"});
            $("#hide-DetailsSujet").css({"display": "none"});}
    </script>


<script>
        function ficheEnseignant(str) {
            
            
            var s =str.split(",");
            var nom = s[0];
            var tel= s[1];
            var email = s[2];
            var parcours=s[3];
        
           
            document.getElementById("nom").innerHTML=nom;
            document.getElementById("tel").innerHTML=tel;
            document.getElementById("email").innerHTML=email;
            document.getElementById("parcours").innerHTML=parcours;
           

            $("#edit").addClass("ficheE");
            $("#ficheE").css({"display": "block", "opacity": "1"});
            $("#hide-ficheE").css({"display": "block", "opacity": "1"});}

            function hideFicheE(){
            $("#edit").removeClass("ficheE");
            $("#ficheE").css({"display": "none"});
            $("#hide-ficheE").css({"display": "none"});}
    </script>    

    <script>
    function ajouter_sujet_etudiant(sujet){
      
        const xhr=new XMLHttpRequest();
        xhr.onreadystatechange=function(){
            if( xhr.readystate==4 && xhr.status==200){
                    document.getElementById(sujet).innerHTML=this.responseText;
            }
        };
        xhr.open('get' , 'ajouterSujetEtudiant.php?idSujet='+sujet, true);
        xhr.send()
    }
    </script>
    </body>
</html>
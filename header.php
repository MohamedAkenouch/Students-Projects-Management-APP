
<link rel="stylesheet" href="header.css">
   <header>
        <nav class="barre1">
            <img src="logo.jpg" height="100">
            <ul>
                <?php if(empty($_SESSION["enseignant_id"]) && empty($_SESSION["etudiant_id"])){ ?>
                    <li> <a href="Connexion.php" class="connexion">Connexion</a></li>
                <?php } else{ 
                    if(!empty($_SESSION["etudiant_id"])){
                        $sql1= "select * from etudiant where idEtudiant=?";

                        if($stmt1= mysqli_prepare($link, $sql1)){
                            mysqli_stmt_bind_param($stmt1, "i",$_SESSION["etudiant_id"]);
                            mysqli_stmt_execute($stmt1);
                            $result1= mysqli_stmt_get_result($stmt1);
                            $row1 = mysqli_fetch_array($result1);
                            $utilisateur= $row1['nom']." ".$row1['prenom'];
                    }
                }
                    if(!empty($_SESSION["enseignant_id"])){
                        $sql2= "select * from enseignant where idEnseignant=?";

                        if($stmt2= mysqli_prepare($link, $sql2)){
                            mysqli_stmt_bind_param($stmt2, "i",$_SESSION["enseignant_id"]);
                            mysqli_stmt_execute($stmt2);
                            $result2= mysqli_stmt_get_result($stmt2);
                            $row2 = mysqli_fetch_array($result2);
                            $utilisateur= $row2['nom']." ".$row2['prenom'];
                    }

                    }
                    
                    
                    ?>  

                    <li > <button class="utilisateur" onclick="myFunction()"><?php echo $utilisateur?></button> </li>
                    <li> <a style="text-align:center" class="deconnexion" href="deconnecter.php">Deconnexion</a></li>       
                 <?php } ?>
            </ul>   
        </nav>
        <br>
        <nav class="barre">
            <ul>
                <li><a href="Acceuil.php">ACCEUIL</a></li>
                <li><a href="Sujet.php">SUJETS</a></li>
                <li><a href="MonEspace.php">MON ESPACE</a></li>
                <li><a href="#">CONTACT</a></li>
            </ul>
           
        </nav>

    </header>

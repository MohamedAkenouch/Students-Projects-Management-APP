<?php
session_start();
require_once 'config.php';


$email = $password = "";
$email_err = $password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["email"]))){
        $email_err = "Veuillez entrer votre email";
    } else{
        $email = trim($_POST["email"]);
    }
 
    if(empty(trim($_POST["password"]))){
        $password_err = "Veuillez entrer votre mot de passe";
    } else{
        $password = trim($_POST["password"]);
    }
    

    if(empty($email_err) && empty($password_err)){
    
        $sql1 = "SELECT idEnseignant, email, Motdepasse FROM enseignant WHERE email = ?";
        $sql2 = "SELECT idEtudiant, email, Motdepasse FROM etudiant WHERE email = ?";
       
        
        if($stmt1 = mysqli_prepare($link, $sql1)){
           
      
            mysqli_stmt_bind_param($stmt1, "s", $param_email);
            $param_email = $email;

            if(mysqli_stmt_execute($stmt1)){
              
                mysqli_stmt_store_result($stmt1);
          
                if(mysqli_stmt_num_rows($stmt1) == 1){    
                                
                   
                    mysqli_stmt_bind_result($stmt1, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt1)){
                        if($password==$hashed_password){
                         
                            $_SESSION["loggedin"] = true;
                            $_SESSION["enseignant_id"] = $id;
                            $_SESSION["email"] = $email; 
                       
                            header("location: MonEspace.php");
                        } else{
                            $password_err = "Mot de passe invalide";
                        }
                    }
                } elseif ($stmt2 = mysqli_prepare($link, $sql2)){
                   
                    mysqli_stmt_bind_param($stmt2, "s", $param_email);
                    $param_email = $email;
        
                    if(mysqli_stmt_execute($stmt2)){
                       
                      
                        mysqli_stmt_store_result($stmt2);
                  
                        if(mysqli_stmt_num_rows($stmt2) == 1){                    
                           
                            mysqli_stmt_bind_result($stmt2, $id, $email, $hashed_password);
                            if(mysqli_stmt_fetch($stmt2)){
                                if($password==$hashed_password){
                                 
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["etudiant_id"] = $id;
                                    $_SESSION["email"] = $email; 
                               
                                    header("location: MonEspace.php");
                                } else{
                                    $password_err = "Mot de passe invalide";
                                }
                            }
                        }
                } else{
                    $email_err = "Pas de compte avec ce nom";
                }
            } else{
                echo "Un problème est survenu. Veuillez réessayer plus tard!";
            }
        }
        
    }
  
}}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conneion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .input {
            cursor: pointer;
             width: 60%;
             padding: 10px;
             margin:8px;
             border-radius: 8px;
             border: 1px solid rgb(230, 229, 229);
            margin-bottom: 4%;
             color: rgb(55, 55, 177);
             background-color: rgba(231, 234, 255, 0.767);
             font-size: larger;

         }
         .submitblock{
             margin: auto;
             width:max-content;
             float: left;
             margin:8px;
             margin-top: 10%;
         }
         
         .submit{
            width:120%;
            text-align: center;
            padding: 10px 50px;
            background-color:rgb(55, 55, 177);
            color:white;
            border:0ch;
            border-radius: 8px;
            font-size: large;
            cursor: pointer;
         }

</style>
</head>
<body>
    <div class="row">
        <div class="col" style="margin-left: 3%;margin-top: 6%;margin-right: 0%;">
            <h2 style="color:rgb(10,41,102);"><strong> Votre espace pour commencer votre projet</strong></h2>
            <img width="100%" height="auto" style="margin-top: 10%;" src="inpt.png" alt="">

        </div>
        <div class="col">
            <a href="#" style="margin-top:1%;float: right;margin-right: 5%;padding: 12px; background-color: rgb(154, 175, 231);color:rgb(55, 55, 177);font-size:larger;font-weight:bold;cursor: pointer;text-decoration: none;">ACCEUIL</a>
            <h1 style="margin-top:3%;color:rgb(10,41,102);margin-bottom: 30%;">Connexion</h1>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <input  class="input" type="email" placeholder="Email" name="email">
                <br>
                <div style="color:red;text-align:center"><?php echo $email_err ; ?></div>
                <br>
                <input style="margin-bottom:0%;"  class="input" type="password" placeholder="Mot de passe" name="password">
                <br>
                <div style="color:red;text-align:center"><?php echo $password_err ; ?></div>
                <br>
                <a style="color:rgb(147, 120, 255);margin-bottom:10%;float: right;margin-right: 40%;" href="">Mot de passe oublié?</a>
                <div class="submitblock">
                    <input class="submit" type="submit" value="S'identifier">
                </div>
            </form>
        </div>

    </div>

    
</body>
</html>
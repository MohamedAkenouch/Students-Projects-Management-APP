<?php
session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <?php require_once 'links.php';?>
</head>


<body>
    <?php require_once 'header.php';?>


        <div style="width:100%;background-image: url(front.jpg);background-repeat:no-repeat;background-size: cover;margin-top: 2%;">
            <div style="padding-top: 12%;padding-bottom: 12%;text-align: center;background-color: rgb(255,255,255,0.35);margin-left: 55%;margin-right: 5%;">           
                    <h1 style="font-size: 400%;color: blue;">Choisissez votre sujet et commencer votre projet maintenant!</h1>
                    <h4 style="color: rgb(81, 81, 255);">Nous somme ici pour vous!</h4>
            </div>
        </div>
        <div style="background-image: url(cap2.png);width: 100%;height: 50% ;margin-top: 6%;background-repeat: no-repeat;background-size: 100%;margin-left: 0%;" class="row">
            <div class="col" style="padding-top:13%;text-align: center;color: white;padding-bottom: 10%;">
                <h1>Traction sur le marché</h1>
                <h3>Notre objective est de former des ingenieurs capable a entamer le marché de travail</h3>
            </div>
            <div class="col" style="padding-top:12%;text-align: center;color: white;">
                <h1>Enseignants experts</h1>
                <h3>Apprenez par des experts universitaires passionnés par l'enseignement</h3>
            </div>
            <div class="col" style="padding-top:13%;text-align: center;color: white;">
                <h1>Trouver votre sujet</h1>
                <h3>trouver le sujet convenable facilement</h3>
            </div>
        </div>
        <div style="background-image: url(cap3.png);width: 100%;height: 50% ;margin-top: 6%;background-repeat: no-repeat;background-size: 100%;margin-left: 0%;" >
            <div class="row" style="margin-left: 8%;margin-right: 8%;">
                <div class="col" style="padding-top:11%;text-align: center;color: white;padding-bottom: 10%;">
                    <h3>10,679</h3>
                    <p>Étudiants inscrits</p>
                </div>
                <div class="col" style="padding-top:11%;text-align: center;color: white;padding-bottom: 10%;">
                    <h3>4,679</h3>
                    <p>L'étudiant a été aidé à réaliserson premier projet</p>
               
                </div>
                <div class="col" style="padding-top:11%;text-align: center;color: white;padding-bottom: 10%;">
                    <h3>50,000</h3>
                    <p>Plus de 50 000 personnes visitent notre site</p>
                
                </div>
                <div class="col" style="padding-top:11%;text-align: center;color: white;padding-bottom: 10%;">
                    <h3>#</h3>
                    <p style="margin-right: 20%;">L’excellence est notre objective</p>
                    
                </div>
            </div>
       
        </div>
       
    <?php require_once 'footer.php';?>

</body>
</html>
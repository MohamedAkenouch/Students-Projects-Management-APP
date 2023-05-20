<!DOCTYPE html>
<html>
    <head>
        <title>Mon Espace</title>
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

         select{
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
        td a {
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
            box-shadow: 0 5px 10px rgb(123, 123, 170);
        }
        .ajouter{
            margin:auto;
            width:max-content;
           
        }
        .ajouter button {
            text-decoration: none;
            padding: 10px 100px;
            background-color:rgb(55, 55, 177);
            color:white;
            border:0ch;
            border-radius: 8px;
            font-size: large;
            cursor: pointer;
        }
        .input {
            cursor: pointer;
             width: 40%;
             padding: 10px;
             margin:8px;
             float: left;
             border-radius: 8px;
             border: 1px solid rgb(230, 229, 229);
            
             color: rgb(55, 55, 177);
             background-color: rgba(231, 234, 255, 0.767);
             font-size: larger;

         }
         .submitblock{
             margin-left:25% ;
             margin-bottom: 5%;
             width:max-content;
         }
         
         .submit{
            margin-left:50px;
            width:300px;
            
            padding: 10px 50px;
            background-color:rgb(55, 55, 177);
            color:white;
            border:0ch;
            border-radius: 8px;
            font-size: large;
            cursor: pointer;
         }
         textarea{
            cursor: pointer;
            padding: 10px;
            margin:8px; 
             border-radius: 8px;
             border: 1px solid rgb(230, 229, 229);
            
             color: rgb(55, 55, 177);
             background-color: rgba(231, 234, 255, 0.767);
             font-size: larger;
         }
        .fiche{
             opacity: 0.15;
         }
       
        </style>

    </head>
    <body>

    <div id="edit">
    <?php require_once 'header.php'; ?>
        <br>
        <div  class="zone1" style="margin-bottom:5%">
            <div> 
                
                <div class="titre">
                    <h1 >Mes sujets</h1>
                </div>
                <div class="specif">
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
                </div>
                
             
            </div>
            <br>
            <br>
            <br>
            <div >
                <table class="table" > 
                    <thead>
                        <tr>
                            <th>Sujet</th>
                            <th>nombre d'offre</th>
                            <th>Domaine</th>
                            <th>Détails</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <tr>
                            <td>Mathématique-probabilité</td>
                            <td>4</td>
                            <td>Blockchain</td>
                            <td class="plus"><a href="<?php $SujetId=""; printf('%s?SujetId=%s', 'detailsujet.php',  $SujetId); ?>"> Plus... </a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br><br>
            <div class="ajouter">
                <button onclick="ajouter()">Ajouter</button>
            </div>
        </div>
        <?php require_once 'footer.php'; ?>
    </div>

    <?php require_once 'AjouterSujet.php';?>
    <?php require_once 'FicheEnseignant.php';?>

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
        function ajouter(){
          $("#edit").addClass("fiche");
          $("#ajouter").css({"display": "block", "opacity": "1"});
          $("#hide-ajouter").css({"display": "block", "opacity": "1"});}
        function hideAjouter(){
          $("#edit").removeClass("fiche");
          $("#ajouter").css({"display": "none"});
          $("#hide-ajouter").css({"display": "none"});}
        
    </script>

    </body>
</html>
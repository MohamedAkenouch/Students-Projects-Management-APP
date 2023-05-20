<?php
session_start();
require_once 'config.php';
$SujetId = $_GET['SujetId'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>DetailsNomSujet</title>
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

        
         select{
            cursor: pointer;
             width: 40%;
             padding: 10px;
             margin:8px;
             float: right;
             border-radius: 8px;
             border: 1px solid rgb(230, 229, 229);
            
             color: rgb(55, 55, 177);
             background-color: rgba(231, 234, 255, 0.767);
             font-size: larger;
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
             margin: auto;
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
             width: 100%;
             padding: 10px;
             margin: auto;
             margin-top: 8px;
             margin-bottom: 8px;
             
             border-radius: 8px;
             border: 1px solid rgb(230, 229, 229);
            
             color: rgb(55, 55, 177);
             background-color: rgba(231, 234, 255, 0.767);
             font-size: larger;
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
            cursor: pointer;
           
            
           
        }
        
        .valider {

            cursor: pointer;
            color: rgb(42, 202, 50);
            /*background-color: white;*/
            border-radius: 12px;
            border: 0ch;
            padding: 7px  18px;
            box-shadow: 0 5px 10px rgb(79, 124, 54);
            transition : all 0.2s ease;
        }
        .valider:hover {
            color: rgb(255, 255, 255);
            background-color: rgb(42, 202, 50);
            border-radius: 12px;
            
            padding: 7px  18px;
            box-shadow: 0 5px 10px rgb(79, 124, 54);
        }
        
        .refuser {

            cursor: pointer;
            color: rgb(248, 63, 88);
            /* background-color: white;*/
            border-radius: 12px;
            border: 0ch;
            padding: 7px  18px;
            box-shadow: 0 5px 10px rgb(145, 17, 17);
            transition : all 0.2s ease;
        }
        </style>

    </head>
    <body>
        <div id="edit">

        <?php require_once 'header.php'; ?>
        <br>
        
        <div class="zone1" > 
           
                <div class="titre">
                    <h1 >Titre du sujet</h1>
                </div>
              
                
                <form>
                    <input   class="input" type="text" placeholder="domaine">
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
                    <br>
                    <input  class="input" type="number" placeholder="offre">
                    <select  id="niveau" >
                        <option value="">Niveau</option>
                        <option value="ine1">INE1</option>
                        <option value="ine2">INE2</option>
                        <option value="ine3">INE3</option>
                    
                    </select>
                    <br>
                    <textarea rows="6" cols="50"   placeholder="description"></textarea>
         </div>
                    <br>
                    <div class="submitblock">
                        <input class="submit" type="submit" value="Enregistrer ">
                        <input class="submit" type="submit" value="Supprimer le sujet">
                    </div>
                   

                  

                </form>
                <br>

                <div class="zone1">
                    <div class="titre">
                        <h1 >Liste des candidatures</h1>
                    </div>
                    <div>
                        <table class="table"> 
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Etat</th>
                                    
                                </tr>
                            </thead>
                            <tbody> 
                                <tr>                
                                    <td><a href="#">NomPrenom1</a></td>
                                    <td>12/01/2021</td>
                                    <td><button class="valider">Valider</button> <button class="refuser">Refuser</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        <?php require_once 'footer.php'; ?>
        </div>
        <?php require_once 'FicheEnseignant.php'; ?>
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
<?php

    
session_start(); 
require_once 'config.php';

if(!empty($_SESSION["etudiant_id"])){
    include 'MonEspaceEtudiant.php';
  
} 
if(!empty($_SESSION["enseignant_id"])){
    include 'MonEspaceEnseignant.php';
  
}

if(empty($_SESSION["enseignant_id"]) && empty($_SESSION["etudiant_id"])){
    header("location: Connexion.php");
   
}

?>
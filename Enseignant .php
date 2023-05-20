<?php

class Enseignant{
    $id;
    function modifierFiche($competance,$motivation,$projet,$link){

        $this->set_competance($competance);
        $this->set_motivation($motivation);
        $this->set_projet($projet);

        //preparation de la requete

        $stmt = mysqli_prepare($link, "UPDATE etudiant SET competences=?, motivations=?, projetsrealises=? where idEtudiant=?");
        mysqli_stmt_bind_param($stmt, 'sssi', $this->competance, $this->motivation, $this->projet , $this->id);
        mysqli_stmt_execute($stmt);
    }
    function AjouterSujet($nom_sujet,$domaine,$filiere,$niveau,$descrip_tion,$nbrOffre){

        $this->set_nom_sujet($nom_sujet);
        $this->set_domaine($domaine);
        $this->set_filiere($filiere);
        $this->set_niveau($niveau);
        $this->set_descripçtion($descrip_tion);
        $this->set_nbrOffre($nbrOffre);

        //preparation de la requete

        $stmt = mysqli_prepare($link, "INSERT INTO sujet (titre, domaine, filiere, niveau, descrip_tion, nbrOffre, idEnseignant) VALUES (?, ?, ?, ?, ?, ?, ?);");
        mysqli_stmt_bind_param($stmt, 'sssisii', $this->nom_sujet, $this->domaine, $this->filiere ,$this->niveau ,$this->descrip_tion ,$this->nbrOffre , $this->id);
        mysqli_stmt_execute($stmt);
    }
}

?>
<?php

//Vérifier si l'utilisateur est authentifié au niveau du site
session_start();
if(!isset($_SESSION['auth']) AND $_SESSION['role'] <> 'admin'){
    header('Location: ../../index.php');
}

require('../database.php');

//Vérifier si l'id est rentré en paramètre dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //L'id du commentaire en paramète
    $idOfTheAnswer = $_GET['id'];

    //Vérifier si le commentaire existe
    $checkIfAnswerExists = $bdd->prepare('SELECT * FROM answers WHERE id = ?');
    $checkIfAnswerExists->execute(array($idOfTheAnswer));

    //Si le commentaire existe
    if($checkIfAnswerExists->rowCount() > 0){

        //Récupérer les infos de la question
        $answersInfos = $checkIfAnswerExists->fetch();
        if(isset($_SESSION['auth']) AND $_SESSION['role'] == 'admin'){

            //Supprimer le commentaire  en fonction de son id rentré en paramètre
            $deleteThisAnswer = $bdd->prepare('DELETE FROM answers WHERE id = ?');
            $deleteThisAnswer->execute(array($idOfTheAnswer));

            //Rediriger vers l'index
            header('Location: ../../index.php');

        }else{
            echo "Vous n'avez pas le droit de supprimer un commentaire !";
        }

    }else{
        echo "Aucun commentaire";
    }


}else{
    echo "Aucun commentaire  ne correspond à cet id...";
}



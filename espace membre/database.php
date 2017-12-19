<?php
//connection a la base de données
try
{
  $bdd= new PDO('mysql:host=127.0.0.1;dbname=projetTrello;charset=utf8', 'admin', 'admin');
  echo 'Connection a la bdd éffectué'; 
}
catch(Exception $e)
{
    //en cas d'erreur, affichage 
    die('Erreur : '.$e->getMessage());
}
$pseudo = $_POST['pseudo'];
$pass = sha2($_POST['pass']);
$pass2 = sha2($_POST['pass2']);
$mail = $_POST['mail']; 
$mail2 = $_POST['mail2']; 
//si le formulaire d'inscription n'ai pas  vide
if(isset($pseudo) AND isset($pass) AND isset($mail)){
    //requete a la base de donnée pour récupéré les membres inscrits
    $req = $bdd-> query('SELECT * FROM Users');
    //tableau des membres
    $datas = $req->fetch();
        // validation format email
        if(preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}"),$mail){
            // verification mail + mail2
            if ($mail === $mail2){
                //verification password
                if ( $pass === $pass2){
                    //verification pseudo
                    if ($pseudo != $datas['pseudo']){
                        //insertion du nouveau membre
                        $insertion = $bdd->exec('INSERT INTO Users ( name, password, email) VALUES ($pseudo, $pass, $mail)' ); 
                        }else{
                            $erreur =" Pseudo indisponible!"
                            echo $erreur;
                            }
                }else{
                    $erreur =" Password différentes!"
                    echo $erreur;
                    }       
                }
            }else{
                $erreur =" Adresses Email différentes!"
                echo $erreur;
            }   
        }else{
            $erreur =" Adresse Email invalide!"
            echo $erreur;
            }
    }else{
        $erreur =" Veuillez compléter tous les champs"
        echo $erreur;
        }
?>
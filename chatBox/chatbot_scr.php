<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=chatbot;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

// Recup du formulaire
$heure = date('H:i:s');
$req = $bdd->prepare("INSERT INTO messages (user, message, heure) VALUES(?, ?, '$heure')");
$req->execute(array($_POST['user'], $_POST['message']));


//Redirection du visiteur vers la page du minichat
header('Location: index.php');
?>
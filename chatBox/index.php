<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap-4.4.1.css">
    <style type="text/css">
        #window {
            height: 300pt;
            overflow: auto
        }
    </style>
    <title>ChatBot | Php & html </title>
    <link href="images/Hydra_Logo.png" rel="icon" type="image/x-icon"/>
</head>
<body>
<div class="container text-center">
    <h1><img src="images/Hydra_Logo.png" alt="Placeholder image" width="104" height="113" class="img-fluid">Chat Bot | Parlez en toute simplicité !</h1>
</div>
<div class="container " id="window" style="background-color: #E8E8E8">
    <?php
    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=chatbot;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    // Récupération des messages

    $reponse = $bdd->query('SELECT user, message, heure FROM messages');

    // Affichage de chaque message
    while ($donnees = $reponse->fetch()) {

       echo '<p>' . htmlspecialchars($donnees['heure']) . ' | ' . '<strong>'.htmlspecialchars($donnees['user']) . ' :</strong> ' . htmlspecialchars($donnees['message']) . '</p>';
    }
    ?>
</div>
<div class="container text-center" style="background-color: ">
    <form action="chatbot_scr.php" method="post">
        <div class="container"></div>
        <p>
            <label for="user"><strong>Utilisateur</strong></label>
            <strong>            :</strong>
          <input type="text" name="user" id="user" required/>
            <label for="message"><strong>Message</strong></label>
            <strong>            :</strong>
          <input type="text" name="message" id="message" required/>
            <input class="btn btn-primary" type="submit" value="envoyer"/>
        </p>
    </form>
</div>
</body>
</html>
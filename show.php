<?php
    include_once('connexion_sql.php');
    $reponse = $bdd->query('SELECT id, description ,pwd_encrypt, users FROM generate_first ORDER BY ID ');
    while ($donnees = $reponse->fetch())
    {
        echo '<tr><td>' . htmlspecialchars($donnees['id']) . '</td><td>' . htmlspecialchars($donnees['description']) . '</td><td>' . htmlspecialchars($donnees['pwd_encrypt']) . '</td><td>' . htmlspecialchars($donnees['users']) . '</td></tr>';
    };

    $reponse->closeCursor();

?>
<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>Ritz-Cahors</title>
</head>

<body>
    <section class="head">
    <img src="Hotel.jpg" alt="logo Hotel">

    <h1>Gestion des Réservations</h1>
    </section>
    
    <select name="filtre" id="filtre">
        <option selected>Filtre</option>
        <option value="valide" id="valide">Valider</option>
        <option value="refus" id="refus">Refuser</option>
        <option value="attente" id="attente">En Attente</option>
    </select>

<table class="tableau">
<tr>
<th class="col">Id</th>
<th class="col">Client</th>
<th class="col">Chambre</th>
<th class="col">Dates</th>
<th class="col">Statut</th>
<th class="col">Actions</th>
</tr>
<form method=post>
<?php

$reponse = $pdo->query('SELECT *, clients.nom AS nomclient, chambres.nom AS nomroom, reservations.statut AS statutresa FROM reservations, clients, chambres WHERE reservations.clientId = clients.id AND reservations.chambreId = chambres.id');
while ($donnees = $reponse->fetch()) {
    echo '<tr class="col">';
    echo '<td class="col">'.$donnees['id'];
    echo '<td class="col">'.$donnees['nomclient'].'</td>';
    echo '<td class="col">'.$donnees['numero'].'</td>';
    echo '<td class="col">'.$donnees['dateEntree'].' / '.$donnees['dateSortie'].'</td>';
    echo '<td class="col">'.$donnees['statutresa'].'</td>';
    echo '<td class="col"><a href="suppression.php">Editer</a><button>Supprimer</button></td>';
    echo '</tr>';
}
?>

</table>
<a href="../ajout.php">Créer une nouvelle réservation</a>
</form>
</body>
</html>
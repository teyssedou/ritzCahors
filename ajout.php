<?php
include 'index.php';
?>

<h1>Ajouter/ Modifier une nouvelle réservation</h1>
 <form class='modifId' method='POST'>
    
<!-- Ajout / Modif Client -->
    <h5>Client</h5>
    <select name="client" id="">

<?php
  try {
      $bdd = new PDO('mysql:host=localhost;dbname=ritzCahors;charset=utf8', 'root', 'simplonco');
  } catch (Exception $e) {
      die('Erreur : '.$e->getMessage());
  }
        $stmt = $bdd->query('SELECT *, clients.id AS idCli,reservations.id AS idResa, chambres.id AS idCham, clients.nom AS nomclient, chambres.nom AS nomroom, reservations.statut AS statutresa FROM reservations, clients, chambres WHERE reservations.clientId = clients.id AND reservations.chambreId = chambres.id');

        while ($donnee = $stmt->fetch()) {
            echo '<option value="'.$donnee['idCli'].'" name="'.$donnee['idCli'].'">'.$donnee['nomclient'].' '.$donnee['prenom'];
            echo '</option>';
        }
?>

</select>

<!-- Ajout / Modif Chambre -->
    <h5>Chambre</h5>
      <select name="chambre" id="">

<?php
  try {
      $bdd = new PDO('mysql:host=localhost;dbname=ritzCahors;charset=utf8', 'root', 'simplonco');
  } catch (Exception $e) {
      die('Erreur : '.$e->getMessage());
  }
        $stmt = $bdd->query('SELECT *, clients.id AS idCli,reservations.id AS idResa, chambres.id AS idCham, clients.nom AS nomclient, chambres.nom AS nomroom, reservations.statut AS statutresa FROM reservations, clients, chambres WHERE reservations.clientId = clients.id AND reservations.chambreId = chambres.id');

        while ($donnee = $stmt->fetch()) {
            echo '<option value="'.$donnee['idCham'].'" name="'.$donnee['idCham'].'">'.$donnee['numero'].' : '.$donnee['nomroom'];
            echo '</option>';
        }
?>

</select>

<!-- Ajout / Modif Date -->
<?php
  try {
      $bdd = new PDO('mysql:host=localhost;dbname=ritzCahors;charset=utf8', 'root', 'simplonco');
  } catch (Exception $e) {
      die('Erreur : '.$e->getMessage());
  }
    $stmt = $bdd->query('SELECT *, clients.id AS idCli,reservations.id AS idResa, chambres.id AS idCham, clients.nom AS nomclient, chambres.nom AS nomroom, reservations.statut AS statutresa FROM reservations, clients, chambres WHERE reservations.clientId = clients.id AND reservations.chambreId = chambres.id');

    while ($donnee = ($stmt->fetch())) {
        $datesEntree = date('d-m-Y', strtotime(substr($donnee['dateEntree'], 0, 10)));
        echo "<h5>Date d'Entree</h5>";
        echo '<input type="date" value="'.$datesEntree.'" name="'.$donnee['idResa'].'">';
        echo '<h5>Date de Sortie</h5>';
        echo '<input type="date" value="02/07/1983" name="'.$donnee['idResa'].'">';
    }
?>
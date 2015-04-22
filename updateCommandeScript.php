<?php
// Trying to establish database connection
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=clearCompta;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
// Get the variables from the html form
$id_commande = $_POST['InputIdCommande'];
$date_commande = $_POST['InputDateCmd'];
$id_client = $_POST['InputClient'];
$input_montant = $_POST['InputMontant'];
// Insert a line
try {
	if (isset($id_commande)) {
		$query = 'UPDATE Commande SET date_commande =  "' . $date_commande . '", id_client = ' . $id_client . ', Montant =  ' . $input_montant . ' WHERE id_commande = ' . $id_commande ;
	}
	else {
		$query = 'INSERT INTO Commande(id_client, date_commande) VALUES(' . $id_client . ', "' . $date_commande . '")' ;
	}
	$bdd->exec($query);
}
catch(Exception $e){
	die('Error while trying to insert :' . $e->getMessage());
}
header('Location: index.php');
?>

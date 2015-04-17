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
$date_commande = $_POST['InputDateCmd'];
$id_client = $_POST['InputClient'];
$input_montant = $_POST['InputMontant'];
// Insert a line
try {
	if (isset($input_montant)) {
		$query = 'INSERT INTO Commande(id_client, date_commande, Montant) VALUES(' . $id_client . ', "' . $date_commande . '", ' . $input_montant . ')' ;
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

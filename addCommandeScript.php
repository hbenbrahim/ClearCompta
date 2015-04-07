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
// Insert a line
try {
	$query = 'INSERT INTO Commande(id_client, date_commande) VALUES(' . $id_client . ', "' . $date_commande . '")';
	echo $query;
	$bdd->exec($query);
}
catch(Exception $e){
	die('Error while trying to insert :' . $e->getMessage());
}

echo 'The line has correctly been added';
header('Location: index.php');
?>

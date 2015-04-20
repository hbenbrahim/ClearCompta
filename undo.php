<?php
  $id = $_GET['id'];
  // Trying to establish database connection
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=clearCompta;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}
	// Delete a line if visible is false, make it go invisible if true
	try {
		$query_alt = 'UPDATE Commande SET visible = 1 WHERE id_commande = ' . $id;
		$bdd->exec($query);
		$bdd->exec($query_alt);
	}
	catch(Exception $e){
		die('Error while trying to delete :' . $e->getMessage());
	}
  	header('Location: index.php');
?>
?>

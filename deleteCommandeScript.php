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
	// Delete a line
	try {
		$query = 'DELETE FROM Commande WHERE id_commande = ' . $id . ' and visible=false' ;
		$query_alt = 'UPDATE Commande SET visible = 0 WHERE id_commande = ' . $id;
		$bdd->exec($query);
		$bdd->exec($query_alt);
	}
	catch(Exception $e){
		die('Error while trying to insert :' . $e->getMessage());
	}
  	if (isset($id) AND !(empty($id)))
  	{
	    echo $id;
  	}
  	header('Location: index.php');
?>

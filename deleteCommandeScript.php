<script>
		if (confirm('Are you sure you want to save this thing into the database?')) {
    // Save it!
} else {
    // Do nothing!
}
</script>
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
		$query = 'DELETE FROM Commande WHERE id_commande = ' . $id . ' and visible=false' ;
		$query_alt = 'UPDATE Commande SET visible = 0 WHERE id_commande = ' . $id;
		$bdd->exec($query);
		$bdd->exec($query_alt);
	}
	catch(Exception $e){
		die('Error while trying to delete :' . $e->getMessage());
	}
  	header('Location: index.php');
?>
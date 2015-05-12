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
	//$bdd->exec($query);
}
catch(Exception $e){
	die('Error while trying to insert :' . $e->getMessage());
}
$result_cc = $bdd->query('SELECT MAX(id_commande) FROM Commande');
$current_commande = $result_cc->fetch();
$qte_commande = $_POST[''];
$prix_final = $_POST[''];
if(isset($_POST['product'])){
	$product = $_POST['product'];
	foreach ($product as $products=>$value) {
	 echo $_POST('qte_commande');
     $query = 'INSERT INTO `Produit_Commande` (`product_id`, `commande_id`, `product_quantity`, `final_price`) VALUES (' . $value . ' ,' . $current_commande[0] . ' , , );';
    }
}

//header('Location: index.php');


?>

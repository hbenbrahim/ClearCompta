<?php
require('facturePDF.php'); 

// Récupère les données de la commande via l'id de la commande ci-dessous
$id = $_GET['id'];
// Trying to establish database connection
try {
	$bdd= new PDO( 'mysql:host=localhost;dbname=clearCompta;charset=utf8', 'root', '');
    }
catch(Exception $e) {
    die( 'Erreur : '.$e->getMessage());
    }
$result_details = $bdd->query('SELECT * FROM `Commande`,`Client` WHERE Commande.id_client = Client.id_client and Commande.id_commande= ' . $id);
$result_commande = $bdd->query('SELECT * FROM `Produit_Commande`, Produit WHERE Produit_Commande.product_id = Produit.id_product AND Produit_Commande.commande_id = ' . $id);
// Get lines from database
$data = $result_details->fetch();
// #1 initialise les informations de base 
// 
// adresse de l'entreprise qui émet la facture 
$adresse = " \n1 Imm15 Rue M - Residence Noor\n12321 Val Fleury Bureau 1 Kenitra\n\nsmartdesign12@gmail.com\n05 50 00 58 13 - 06 27 36 43 81"; 
// récupère l'adresse du client
$adresseClient = $data['adresse1_client'] . "\n" . $data['adresse2_client'] . "\n" . $data['ville_client']; 
// initialise l'objet facturePDF 
$pdf = new facturePDF($adresse, $adresseClient, "Smart Design - Imm15 Rue M - Residence Noor - Val Fleury Bureau 1 Kenitra - smartdesign12@gmail.com - 05 50 00 58 13 - 06 27 36 43 81\nLes produits livrés demeurent la propriété exclusive de notre entreprise jusqu'au paiement complet de la présente facture. Paiment sous 60 jours.\nRCS : 37409 - IF : 29153278 / CNSS : 8998942\nCB : 011 33000 00062100002544 05 - BMCE Kenitra Av Imam Ali"); 
// défini le logo 
$pdf->setLogo('img/logo.jpg'); 
// entete des produits 
$pdf->productHeaderAddRow('Produit', 75, 'L'); 
$pdf->productHeaderAddRow('Référence', 40, 'L'); 
$pdf->productHeaderAddRow('Prix HT', 25, 'L'); 
$pdf->productHeaderAddRow('QTE', 15, 'L'); 
$pdf->productHeaderAddRow('Prix TTC', 25, 'L'); 
// entete des totaux 
$pdf->totalHeaderAddRow(40, 'L'); 
$pdf->totalHeaderAddRow(30, 'R'); 
// element personnalisé 
$pdf->elementAdd('', 'traitEnteteProduit', 'content'); 
$pdf->elementAdd('', 'traitBas', 'footer'); 

// #2 Créer une facture 
// 
// numéro de facture, date, texte avant le numéro de page 
$pdf->initFacture("Facture n° ".mt_rand(1, 99999)."-".mt_rand(1, 99999)."\nBC n°".mt_rand(1, 99999), "Kenitra le " . $data['date_commande'], ""); 
// produit 
while($data_commande = $result_commande->fetch()){
	$total = $data_commande['final_price'] * $data_commande['product_quantity'];	
	$pdf->productAdd(array($data_commande['designation_product'], 'P'.$data_commande['product_id'].'15M', $data_commande['final_price'], $data_commande['product_quantity'], $total)); 		
}
// ligne des totaux 
$pdf->totalAdd(array('Total HT', number_format($data['Montant']*0.8, 2) . ' MAD')); 
$pdf->totalAdd(array('TVA', number_format($data['Montant']*0.2, 2) . ' MAD')); 
$pdf->totalAdd(array('Sous total TTC', number_format($data['Montant'], 2) . ' MAD')); 

// #3 Importe le gabarit 
// 
require('gabarit.php'); 

// #4 Finalisation 
// construit le PDF 
$pdf->buildPDF(); 
// télécharge le fichier 
$pdf->Output('Facture.pdf', $_GET['download'] ? 'D':'I'); 
?>
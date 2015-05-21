<?php
require('facturePDF.php'); 

// #1 initialise les informations de base 
// 
// adresse de l'entreprise qui émet la facture 
$adresse = " \n1 Imm15 Rue M - Residence Noor\n12321 Val Fleury Bureau 1 Kenitra\n\nsmartdesign12@gmail.com\n05 50 00 58 13 - 06 27 36 43 81"; 
// adresse du client 
$adresseClient = "WebuildMedia\nMaghrib Arabi C22 Imm Firdaous\n Kenitra"; 
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
$pdf->initFacture("Facture n° ".mt_rand(1, 99999)."-".mt_rand(1, 99999)."\nBC n°".mt_rand(1, 99999), "Kenitra le 29/05/2015", ""); 
// produit 
$pdf->productAdd(array('Attrape mouche collant', 'C22M9', '10.00', '7', '70.00')); 
$pdf->productAdd(array('Attrape mouche collant CRAFT', 'C42M3', '5.00', '7', '35.00')); 
$pdf->productAdd(array('Cylindre Honda ZX10R 125cc à carburateur injecté et intégration de cartouche NOS 2.6 vag-7', 'K345', '2.95', '1', '2.95')); 
$pdf->productAdd(array('Baume du tigre rouge 3gr', 'BT45', '54.95', '1', '54.95')); 
$pdf->productAdd(array('Batterie GoPro Hero 3 2044 mAh', 'SNCF', '0.99', '9', '9.91')); 
$pdf->productAdd(array('Pack Pépito Super Promo Collector 25th anniversary', 'Gift-81', '37,00', '1', '37,00')); 

// ligne des totaux 
$pdf->totalAdd(array('Total HT', '59.95 MAD')); 
$pdf->totalAdd(array('TVA', '10.99 MAD')); 
$pdf->totalAdd(array('Sous total TTC', '71.94 MAD')); 
$pdf->totalAdd(array('Livraison', '100.00 MAD')); 
$pdf->totalAdd(array('Remise', '-5.94 MAD')); 
$pdf->totalAdd(array('Total TTC', '165.00 MAD')); 

// #3 Importe le gabarit 
// 
require('gabarit.php'); 

// #4 Finalisation 
// construit le PDF 
$pdf->buildPDF(); 
// télécharge le fichier 
$pdf->Output('Facture.pdf', $_GET['download'] ? 'D':'I'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Dashboard</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Clear Compta</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="#">Commandes</a></li>
          <li><a href="#">Clients</a></li>
          <li><a href="#">Produits</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
          <li class="active"><a href="index.php">Overview</a> <span class="sr-only">(current)</span></li>
          <li><a href="addCommande.php">Ajouter une Commande</a></li>
          <li><a href="#">Archives</a></li>
          <li><a href="trash.php">Corbeille</a></li>
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Modifier une Commande</h1>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Date</th>
                <th>Client</th>
                <th>Status</th>
                <th>Montant</th>
              </tr>
            </thead>
            <tbody>
              <?php
              	//Getting the id variable from index page
              	$id = $_GET['id'];
                // Trying to establish database connection
                try {
                  $bdd= new PDO( 'mysql:host=localhost;dbname=clearCompta;charset=utf8', 'root', '');
                    }
                catch(Exception $e) {
                  die( 'Erreur : '.$e->getMessage());
                  }
                $result = $bdd->query('SELECT * FROM `Commande` ,`Client` WHERE Commande.id_client = Client.id_client and Commande.id_commande = ' . $id);
                // Get lines from database
                $data = $result->fetch();
              ?>
              <tr>
                <td> <?php echo $data['id_commande']; ?> </td>
                <td> <?php echo $data['date_commande']; ?> </td>
                <td> <?php echo $data['nom_client']; ?> </td>
                <td> <?php echo $data['Status']; ?> </td>
                <td> <?php echo $data['Montant']; ?> </td>
              </tr>
            </tbody>
          </table>
        </div>
        <a onclick="return confirm('Cette commande sera considérée comme traitée est prête à être facturée')" href="createDevis.php?id=<?php echo "'" . $data['id_commande'] . "'"?>" class="btn btn-info">Générer Devis</a>
        <a onclick="return confirm('Cette commande sera considérée comme validée et facturée')" href="createFact.php?id=<?php echo "'" . $data['id_commande'] . "'"?>" class="btn btn-primary">Générer Facture</a>
      	<a onclick="return confirm('Cette commande sera considérée comme payée et sera archivée')" type="submit" class="btn btn-success">Archiver</a>
      	<a onclick="return confirm('Cette commande sera envoyée à la corbeille')" type="submit" href="deleteCommandeScript.php?id=<?php echo "'" . $data['id_commande'] . "'" ?>" class="btn btn-danger">Annuler</a>
      </div>
    </div>
  </div>
  <!-- Placed at the end of the document so the pages load faster -->
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>

</html>

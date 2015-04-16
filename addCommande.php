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
          <li><a href="#">Factures</a></li>
          <li><a href="#">Devis</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
          <li><a href="index.php">Overview</a></li>
          <li class="active"><a href="#">Ajouter une Commande <span class="sr-only">(current)</span></a></li>
          <li><a href="#">Archives</a></li>
          <li><a href="trash.php">Corbeille</a></li>
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Ajouter une Commande</h1>
        <form role="form" method="post" action="addCommandeScript.php">
          <div class="form-group">
            <label for="InputDateCmd">Date de la commande</label>
            <input id="InputDateCmd" name="InputDateCmd" type="date" class="form-control" required>
          </div>
          <select id="InputClient" name="InputClient" class="form-control" required>
            <?php
              // Trying to establish database connection
              try {
                $bdd= new PDO( 'mysql:host=localhost;dbname=clearCompta;charset=utf8', 'root', '');
                  }
              catch(Exception $e) {
                die( 'Erreur : '.$e->getMessage());
                }
              $result = $bdd->query('SELECT * FROM Client');
              // Get lines from database
              while($data = $result->fetch()){
            ?>
            <option value = <?php echo $data['id_client'] ?> >
            <?php
                echo $data['nom_client'];
              }
            ?>
            </option>
          </select>
          <a href="addClient.php">Nouveau client ?</a>
          <div class="form-group">
            <input type="number" class="form-control" id="InputMontant" placeholder="Montant TTC">
          </div>
          <div class="form-group">
            <input type="checkbox" name="vehicle">TVA incluse (Décocher si Zone Franche)
          </div>
          <button type="submit" class="btn btn-default">Enregistrer</button>
        </form>
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

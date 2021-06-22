
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
    ?> 

    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='suce'>
        <label for="id">Quantité : </label><input type="text" name='quantité' size='75' value='75'>
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCovidMenu.html';
    include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
     echo ("<h3>Le nouveau centre a été ajouté </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo ("<li>Nom du centre = " . $_GET['label'] . "</li>");
     echo ("<li>Nombre de adresse = " . $_GET['adresse'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du centre.0</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCovidFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    
    '>        
        <label for="id">Nom du centre : </label><input type="text" name='label' size='75' value='Suce'>                           
        <label for="id">Nombre de adresse : </label><input type="text" name='adresse' value='Pute'>            
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Envoyer</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

<!-- ----- fin viewInsert -->





<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='producteurCreated'>
        <label for="id">Quantité : </label><input type="text" name='quantité' size='75' value='75
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
     echo ("<h3>Le nouveau producteur a été ajouté </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo ("<li>Prenom = " . $_GET['prenom'] . "</li>");
     echo ("<li>Nom = " . $_GET['nom'] . "</li>");
     echo ("<li>Region = " . $_GET['region'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion de la récolte.0
     </h3>");
     echo ("id = " . $_GET['prenom']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    
    '>        
        <label for="id">Prenom : </label><input type="text" name='prenom' size='75' value='Audrey'>                           
        <label for="id">Nom : </label><input type="text" name='nom' value='Alcaraz'>
        <label for="id">Region : </label><input type="text" step='any' name='region' value='IDF'>                
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->




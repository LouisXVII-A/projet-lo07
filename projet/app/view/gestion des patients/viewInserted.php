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
     echo ("<h3>Le nouveau patient a été ajouté </h3>");
     echo("<ul>");
     echo ("<li>id = " . $_GET['id'] . "</li>");
     echo ("<li>Nom du patient = " . $_GET['label'] . "</li>");
     echo ("<li>Nombre de adresse = " . $_GET['prenom'] . "</li>");
     echo ("<li>Nombre de adresse = " . $_GET['nom'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du patient.0</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCovidFooter.html';
    ?>
    <!-- ----- fin viewInserted -->          
  
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

<!-- ----- fin viewInsert -->




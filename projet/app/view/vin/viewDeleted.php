
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
    <?php
    if ($results === -1) {
     echo ("<h4>Problème de suppression du vin.</h4>");
     echo ("<br />");
     echo ("<p>Problème de suppression du Vin. Il est probable qu'il soit présent dans la table des récoltes. </p>");
    } else {
     echo ("<h4>Le vin avec l'id n°$results a bien été supprimé</h4>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>

<!-- ----- fin viewInsert -->




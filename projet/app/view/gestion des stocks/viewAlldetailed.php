
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
      ?>

      <h1>Liste des centres avec le nombre de doses de chaque vaccin</h1>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Centre</th>
          <th scope = "col">Vaccin</th>
          <th scope = "col">Quantité de doses</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des stocks est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr><td>%s</td><td>%s</td><td>%d</td></tr>",$element->getstock_centrenom(), $element->getstock_vaccin(), $element->getstock_quantite());}
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  
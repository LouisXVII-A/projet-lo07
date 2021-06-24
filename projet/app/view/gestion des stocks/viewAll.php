
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

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Centre</th>
          <th scope = "col">Quantité totale de doses</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des stocks est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr><td>%s</td><td>%d</td></tr>",$element->getstock_centre(), $element->getstock_quantitetot());}
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  
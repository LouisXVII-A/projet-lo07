
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

      <h1>Liste des patients</h1>
      
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Id</th>
          <th scope = "col">Nom</th>
          <th scope = "col">Prénom</th>
          <th scope = "col">Lieu de vaccination du patient</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des patients est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td></tr>", 
                $element->getpatient_id(), $element->getpatient_nom(), $element->getpatient_prenom(), $element->getpatient_adresse());
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  

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
          <th scope = "col">ID</th>
          <th scope = "col">Label</th>
          <th scope = "col">Doses</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vaccins est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr><td>%d</td><td>%s</td><td>%d</td></tr>", $element->getvaccin_id(), 
             $element->getvaccin_label(), $element->getvaccin_doses());
          }
          ?>
          </table>
      
          <!--On choisit un id à modifier et le nombre de doses à changer-->
          
      <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='vaccinChangedId'>                          
        <label for="id">Id  : </label><input type="numer" name='id' value='2'>
        <label for="doses">Doses : </label><input type="number" name='doses' value='2'>                
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Mise à jour</button>
    </form>
            
      </tbody>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  
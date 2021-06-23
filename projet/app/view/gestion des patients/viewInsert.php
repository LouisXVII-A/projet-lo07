
<!-- ----- début viewId -->
<?php 
require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';

      // $results contient un tableau avec la liste des clés.
      ?>

    <form role="form" method='get' action='router.php'>
      <div class="form-group">
          
        <input type='hidden' name='action' value='patientCreated'>
        
        <label for="id" class="form-label">id : </label>
        <input name="id" class="form-control"><br><br>
        
        <label for='nom' class="form-label">Nom du patient :</label><br>
        <input name='nom' value="Baroin" class="form-control">
        
        <label for='prenom' class="form-label">Prénom du patient :</label><br>
        <input name='prenom' value="François" class="form-control">
        
        <label for="adresse" class="form-label">Lieu de vaccination du patient :</label><br>
        <input name='adresse' value='Troyes' class="form-control"><br><br> 
        
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Envoyer</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewId -->
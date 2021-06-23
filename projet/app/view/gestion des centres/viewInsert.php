
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
        <input type='hidden' name='action' value='centreCreated'>
        <label for="id" class="form-label">id : </label>
        <input name="id" class="form-control"><br><br>
        <label for="label" class="form-label">Nom du centre :</label><br>
        <input name='label' value='Centre de vaccination de ...' class="form-control"><br><br>
        <label for='adresse' class="form-label">Adresse :</label><br>
        <input name='adresse' value="120 rue du fdp" class="form-control">
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Envoyer</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewId -->
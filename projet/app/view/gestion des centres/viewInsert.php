
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
        <input type="hidden" name='action' value='5'>
        <label for="id">id : </label> <select class="form-control" name='id' style="width: 100px">
            <?php
            foreach ($results as $id) {
             echo ("<option>$id</option>");
             $id = $id + 1;
            }
            ?>
        </select><br>
        <label for="label">Nom du centre :</label><br>
        <input name='label' value='Centre de vaccination de ...'><br><br>
        <label for='adresse'>Adresse :</label><br>
        <input name='adresse' value="120 rue du fdp">
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Envoyer</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewId -->
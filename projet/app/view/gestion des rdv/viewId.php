
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
        <input type="hidden" name='action' value='<?php echo($target);?>'>
        <label for="id">Votre id : </label> 
        <select class="form-control" id='id' name='id' style="width: 100px">
            <?php
            foreach ($results as $id) {
             echo ("<option>$id</option>");
            }
            ?>
        </select>
      </div>
      <p/>
      <label for="nombre">Votre statut de vaccination :</label>
      <select class="form-control" name="nombre" style="width: 100px">
          <option>0 - Vous n'êtes pas vacciné</option>
          <option>1 - Vous avez reçu une dose de vaccin</option>
          <option>2- Vous avez déjà reçu deux doses de vaccin</option>
      </select>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewId -->
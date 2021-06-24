
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
    ?> 

    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='vaccinCreated'> 
        <label for="id">id : </label><input type="number" name="id" value="6"><br><br>
        <label for="label">Label  : </label><input type="text" name='label' value='Spoutnik'>
        <label for="doses">Doses : </label><input type="number" name='doses' value='2'>                
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Ajout</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

<!-- ----- fin viewInsert -->




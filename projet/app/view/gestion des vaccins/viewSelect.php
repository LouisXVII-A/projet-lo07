
<!-- ----- début viewSelect -->
 
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
        <div class="checkbox">
        <input type="hidden" name='action' value='getVaccin'>
            <label>
                <input type="checkbox" value="producteur_id" name="producteur_id">
                producteur_id
            </label>

            <label>
                <input type="checkbox" value="vin_id" name="vin_id">
                vin_id
            </label>

            <label>
                <input type="checkbox" value="cru" name="cru">
                cru
            </label>

            <label>
                <input type="checkbox" value="nom" name="nom">
                nom
            </label>

            <label>
                <input type="checkbox" value="prenom" name="prenom">
                prenom
            </label>

            <label>
                <input type="checkbox" value="annee" name="annee">
                annee
            </label>

            <label>
                <input type="checkbox" value="quantite" name="quantite">
                quantite
            </label>

            <label>
                <input type="checkbox" value="degre" name="degre">
                degre
            </label>

            <label>
                <input type="checkbox" value="region" name="region">
                region
            </label>
        </div>
     
        <button class="btn btn-primary" type="submit">Go</button>
    </form>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

<!-- ----- fin viewInsert -->




<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCaveMenu.html';
        include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
        ?>
        
        <div>
            <h1>Mes propositions d'amélioration</h1>
            <ul>
                <li>
                    Ajouter d'autres fonctionnalités : voir le tableau des cru en fonction des années de manière chronologiquement.
                </li>
                <li>
                    Faire un 3ème menu pour les récoltes.
                </li>
            </ul>
        </div>
        
    </div>    
    <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>
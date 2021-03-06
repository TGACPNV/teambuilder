<?php
ob_start();
?>


    <div id="menu">
        <a href="?">
            <i class="fas fa-home fa-2x"></i>
        </a>
        <h3>
            <?= $pageTitle ?>
        </h3>


        <div class="loggedAs">
            <div class="version">Version: Fin Examen - Théo</div>
            <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="loggedAs" data-bs-toggle="dropdown" aria-expanded="false">
                 Connecté en tant que <?= $connectedUser->name ?>
            </a>

            <div class="dropdown-menu" aria-labelledby="loggedAs">
                <a class="dropdown-item" href="?action=myProfile">Mon Profil</a>
            </div>
        </div>
        </div>
    </div>

<?php
$header = ob_get_clean();

<img class="fondEcran" src="./public/icons/cinema.png">
<div class="general">
    <div class="display">
        <div class="recherche">
            <form action="#" method="get">
                <div class="input-group border border-dark taille ">
                    <input type="search" class="form-control border-right-0 cadre" name="terme" placeholder="Rechercher" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn-outline-secondary bouton border-left-0 cadre border-dark " type="submit" name="s" value="Rechercher" id="button-addon2">
                        <img class="img" src="public/icons/search1.png"></button>
                </div>

        </div>

        <nav class="navigation">
            <ul class="pagination">
                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                <li class="page-item <?= ($_SESSION["currentPage"] == 1) ? "disabled" : "" ?>">
                    <a href="./?page=<?= ($_SESSION["currentPage"] - 1) . '&terme=' . $_SESSION["recherche"] . '&s=Rechercher#' ?>" class="page-link">Précédente</a>
                </li>
                <?php for ($page = 1; $page <= $_SESSION["page"]; $page++) : ?>
                    <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                    <li class="page-item <?= ($_SESSION["currentPage"] == $page) ? "active" : "" ?>">
                        <a href="./?page=<?= $page . '&terme=' . $_SESSION["recherche"] . '&s=Rechercher#' ?>" class="page-link"><?= $page ?></a>
                    </li>
                <?php endfor ?>
                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                <li class="page-item <?= ($_SESSION["currentPage"] == $_SESSION["page"]) ? "disabled colourt" : "" ?>">
                    <a href="./?page=<?= ($_SESSION["currentPage"] + 1) . '&terme=' . $_SESSION["recherche"] . '&s=Rechercher#' ?>" class="page-link">Suivante</a>
                </li>
            </ul>
        </nav>
    </div>

    <?php foreach ($films as $key => $value) : ?>
        <div id="main" class="film bleu">
            <!-- récupération des ID utile -->
            <?php $filmsID = $value["films_id"]; ?>

            <!-- image -->
            <div class="image">
                <?php echo ("<img src=\"./public/images/" . $value["films_affiche"] . "\">"); ?>
            </div>
            <div class="contenu">
                <!-- titre -->
                <?php echo ("<h2 class=\"titre\">" . $value["films_titre"] . "</h2>"); ?>
                <!-- année -->
                <div class="annee resume">
                    <?php echo ("<h3>" . $value["films_annee"] . "</h3>"); ?>
                </div>
                <!-- //genre -->
                <?php echo ("<p>" . genreswitch($filmsID) . " </p>"); ?>
                <!-- //réalisateur -->
                <label>Réalisateur : </label>
                <?php echo ("<p>" . realisateurswitch($filmsID) . " </p>"); ?>
                <!-- //acteurs -->
                <label>Acteurs : </label>
                <?php echo ("<p>" . acteurswitch($filmsID) . " </p>"); ?>
                <!-- //Durée -->
                <label>Durée : </label>
                <?php echo ("<p>" . convertToHoursMins($value["films_duree"], "%2dh%02d") . "</p>"); ?>

                <!-- //resumé -->
                <div class="resume">
                    <?php echo ("<p>" . $value["films_resume"] . "</p>"); ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>

</div>
<?php $title = 'Genshin Impact API';
ob_start(); ?>

    <div id="characters" class="row row-cols-xxl-4 row-cols-xl-3 row-cols-md-2 row-cols-1">
        <?php foreach ($_POST['characters'] as $character) : ?>
            <div id="char<?= $character['id'] ?>">
                <a href="character/<?= slug($character['label']) ?>" class="card">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img class="img-fluid" alt="char"
                             src="resources/images/characters/<?= slug($character['label']) ?>">
                    </div>
                    <div class="card-body">
                        <div class="row-cols-2 d-flex">
                            <h3 class="card-title character_name"><?= $character['label'] ?></h3>
                            <img src="resources/images/elements/<?= $character['element'] ?>.png"
                                 class="element ms-auto" alt="element">
                        </div>
                        <div class="card-text d-flex">
                            <img class="item" alt="lvl_up_material1"
                                 src="resources/images/items/<?= slug($character['lvl1'] . $character['lvl_rar1']) ?>.png">
                            <img class="item" alt="lvl_up_material2"
                                 src="resources/images/items/<?= slug($character['lvl2'] . $character['lvl_rar2']) ?>.png">
                            <img class="item" alt="lvl_up_material3"
                                 src="resources/images/items/<?= slug($character['lvl3'] . $character['lvl_rar3']) ?>.png">
                            <div class="vertical"></div>
                            <img class="item" alt="talent_up_material1"
                                 src="resources/images/items/<?= slug($character['tal1'] . $character['tal_rar1']) ?>.png">
                            <img class="item" alt="talent_up_material2"
                                 src="resources/images/items/<?= slug($character['tal2'] . $character['tal_rar2']) ?>.png">
                            <img class="item" alt="talent_up_material3"
                                 src="resources/images/items/<?= slug($character['tal3'] . $character['tal_rar3']) ?>.png">
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

<?php $content = ob_get_clean();
require('./view/template/template.php');
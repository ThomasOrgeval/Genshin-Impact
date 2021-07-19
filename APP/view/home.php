<?php $title = 'Genshin Impact API';
ob_start(); ?>

    <div id="characters" class="row row-cols-xxl-4 row-cols-xl-3 row-cols-md-2 row-cols-1">
        <?php foreach ($_POST['characters'] as $character) : ?>
            <div id="char<?= $character['id'] ?>" class="my-1 my-md-2">
                <a href="character/<?= slug($character['label']) ?>" class="card bg-dark">
                    <div class="faded-dark">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img class="img-fluid" alt="char"
                                 src="resources/images/characters/sm/<?= slug($character['label']) ?>">
                        </div>
                        <div class="card-body">
                            <div class="justify-content-between d-flex">
                                <h3 class="card-title character_name text-white-50"><?= $character['label'] ?></h3>
                                <div style="white-space: nowrap">
                                    <img src="resources/images/weapons/<?= $character['weapon'] ?>.png"
                                         class="element ms-auto" alt="weapon">
                                    <img src="resources/images/elements/sm/<?= $character['element'] ?>.png"
                                         class="element ms-auto" alt="element">
                                </div>
                            </div>
                            <div class="card-text d-flex">
                                <img class="item" alt="1"
                                     src="resources/images/items/sm/<?= slug($character['lvl1'] . $character['lvl_rar1']) ?>.png">
                                <img class="item" alt="2"
                                     src="resources/images/items/sm/<?= slug($character['lvl2'] . $character['lvl_rar2']) ?>.png">
                                <img class="item" alt="3"
                                     src="resources/images/items/sm/<?= slug($character['lvl3'] . $character['lvl_rar3']) ?>.png">
                                <div class="vertical"></div>
                                <img class="item" alt="4"
                                     src="resources/images/items/sm/<?= slug($character['tal1'] . $character['tal_rar1']) ?>.png">
                                <img class="item" alt="5"
                                     src="resources/images/items/sm/<?= slug($character['tal2'] . $character['tal_rar2']) ?>.png">
                                <img class="item" alt="6"
                                     src="resources/images/items/sm/<?= slug($character['tal3'] . $character['tal_rar3']) ?>.png">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

<?php $content = ob_get_clean();
require(__DIR__ . '/template/template.php');
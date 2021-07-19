<?php $title = 'Genshin Impact API';
ob_start(); ?>

    <div class="row">
        <div class="col-sm-4 text-center">
            <h4>Characters</h4>
            <?php foreach ($_POST['characters'] as $character) : ?>
                <a href="edit_character/<?= $character['id'] ?>" class="btn btn-outline-primary btn-block mb-3">
                    <?= $character['label'] ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

<?php $content = ob_get_clean();
require(__DIR__ . '/template/template.php');
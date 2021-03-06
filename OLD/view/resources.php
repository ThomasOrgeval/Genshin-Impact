<?php $title = 'Genshin Impact API';
ob_start(); ?>

    <div id="resources">
        <?php foreach ($_POST['lists'] as $list) : ?>
            <div class="item-list-15 my-5">
                <?php foreach ($list as $item) :
                    for ($i = 1; $i <= $item['rarity_max']; $i++) : ?>
                        <div class="text-center">
                            <img class="item-item" alt="<?= $item['id'] ?>"
                                 src="resources/images/items/sm/<?= slug($item['label'] . $i) ?>.png">
                            <div class="form-outline">
                                <input id="<?= $item['id'] . '_' . $i ?>" class="form-control text-center text-white-50"
                                       type="number" value="<?= getValue($item['id'], $i) ?>">
                                <label for="<?= $item['id'] . '_' . $i ?>" class="form-label"></label>
                            </div>
                        </div>
                    <?php endfor;
                endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>

<?php $content = ob_get_clean();
require(__DIR__ . '/template/template.php');
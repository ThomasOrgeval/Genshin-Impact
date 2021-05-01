<?php $title = 'Genshin Impact API';
ob_start(); ?>


<?php $content = ob_get_clean();
require(__DIR__ . '/template/template.php');
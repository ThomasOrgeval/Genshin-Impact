<?php $title = 'Genshin Impact API';
ob_start(); ?>

    <div id="character" class="row row-cols-xxl-4 row-cols-xl-3 row-cols-md-2 row-cols-1"></div>

<?php $content = ob_get_clean();
require('./view/template/template.php');
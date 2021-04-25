<?php $title = 'Genshin Impact API';
ob_start(); ?>

    <div id="resources"></div>

<?php $content = ob_get_clean();
require('./view/template/template.php');
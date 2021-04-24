<?php $title = 'Genshin Impact API';
ob_start(); ?>

    <div id="character" class="bg-white shadow">
        <div id="<?= $_GET['label'] ?>" class="card">
            <div class="bg-image p-5 p-lg-5 text-center shadow-1-strong text-white"
                 style="background-image: url('resources/images/characters/<?= $_GET['label'] ?>');">
                <ul class="nav nav-pills flex-column flex-lg-row mb-3 col-6" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab"
                           aria-controls="ex1-pills-1" aria-selected="true">
                            Level Up
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab"
                           aria-controls="ex1-pills-2" aria-selected="false">
                            Talent
                        </a>
                    </li>
                </ul>
            </div>

            <div class="card bg-white shadow">
                <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                        <div id="ascension"></div>
                    </div>
                    <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        <div id="talent"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean();
require('./view/template/template.php');
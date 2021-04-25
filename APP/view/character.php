<?php $title = 'Genshin Impact API';
ob_start(); ?>

    <div id="character" class="bg-white shadow">
        <div id="<?= $_GET['label'] ?>" class="card">
            <div class="bg-image p-5 p-lg-5 text-center shadow-1-strong text-white"
                 style="background-image: url('resources/images/characters/<?= $_GET['label'] ?>');">
                <ul class="nav nav-pills flex-column flex-lg-row mb-3 col-6" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1"
                           role="tab"
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
                <div class="m-2 mx-lg-4">
                    <div class="tab-content" id="ex1-content">
                        <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel"
                             aria-labelledby="ex1-tab-1">
                            <div>
                                <h4>Select level of character:</h4>
                            </div>
                            <div class="row row-cols-2">
                                <div class="form-outline">
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="1" selected>Level 0</option>
                                        <option value="2">Level 20+</option>
                                        <option value="3">Level 40+</option>
                                        <option value="4">Level 50+</option>
                                        <option value="5">Level 60+</option>
                                        <option value="6">Level 70+</option>
                                        <option value="7">Level 80+</option>
                                    </select>
                                </div>
                                <div class="form-outline">
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="1">Level 20</option>
                                        <option value="2">Level 40</option>
                                        <option value="3">Level 50</option>
                                        <option value="4">Level 60</option>
                                        <option value="5">Level 70</option>
                                        <option value="6">Level 80</option>
                                        <option value="7" selected>Level 90</option>
                                    </select>
                                </div>
                            </div>

                            <div id="ascension">
                                <?php for ($i = 1; $i <= 3; $i++) :
                                    for ($j = 1; $j <= $_POST['lvl_rar' . $i]; $j++) : ?>
                                        <div class="row my-2">
                                            <div class="col-4 col-md-3 col-lg-2 div-item">
                                                <img class="item-char" alt=""
                                                     src="resources/images/items/<?= slug($_POST['lvl' . $i]) . $j ?>.png">
                                            </div>
                                            <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                                 style="margin-top: 32px"><?= $_POST['lvl' . $i] . ' ' . $j ?></div>
                                            <div class="col-4 col-md-3 form-outline item-required">
                                                <input id="requiredItem<?= $_POST['lvl_id' . $i] . '_' . $j ?>"
                                                       class="form-control active" type="number" readonly>
                                                <label for="requiredItem<?= $_POST['lvl_id' . $i] . '_' . $j ?>"
                                                       class="form-label">Required</label>
                                            </div>
                                            <div class="col-4 col-md-3 form-outline item-have">
                                                <input id="item<?= $_POST['lvl_id' . $i] . '_' . $j ?>"
                                                       class="form-control active" type="number"
                                                       value="<?= getValue($_POST['lvl_id' . $i] . '_' . $j) ?>">
                                                <label for="item<?= $_POST['lvl_id' . $i] . '_' . $j ?>"
                                                       class="form-label">Have</label>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                    <hr class="my-2">
                                <?php endfor; ?>
                            </div>
                            <div id="other">
                                <div class="row my-2">
                                    <div class="col-4 col-md-3 col-lg-2 div-item">
                                        <img class="item-char" alt="" src="resources/images/items/Wanderers-Advice.png">
                                    </div>
                                    <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                         style="margin-top: 32px">Wanderer's Advice</div>
                                    <div class="col-4 col-md-3 form-outline item-required">
                                        <input id="requiredXp1" class="form-control active" type="number" readonly>
                                        <label for="requiredXp1" class="form-label">Required</label>
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-have">
                                        <input id="xp1" class="form-control active" type="number"
                                               value="<?= getValue('xp1') ?>">
                                        <label for="xp1" class="form-label">Have</label>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-4 col-md-3 col-lg-2 div-item">
                                        <img class="item-char" alt=""
                                             src="resources/images/items/Adventurers-Experience.png">
                                    </div>
                                    <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                         style="margin-top: 32px">Adventurer's Experience</div>
                                    <div class="col-4 col-md-3 form-outline item-required">
                                        <input id="requiredXp2" class="form-control active" type="number" readonly>
                                        <label for="requiredXp2" class="form-label">Required</label>
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-have">
                                        <input id="xp2" class="form-control active" type="number"
                                               value="<?= getValue('xp2') ?>">
                                        <label for="xp2" class="form-label">Have</label>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-4 col-md-3 col-lg-2 div-item">
                                        <img class="item-char" alt="" src="resources/images/items/Heros-Wit.png">
                                    </div>
                                    <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                         style="margin-top: 32px">Hero's Wit</div>
                                    <div class="col-4 col-md-3 form-outline item-required">
                                        <input id="requiredXp3" class="form-control active" type="number" readonly>
                                        <label for="requiredXp3" class="form-label">Required</label>
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-have">
                                        <input id="xp3" class="form-control active" type="number"
                                               value="<?= getValue('xp3') ?>">
                                        <label for="xp3" class="form-label">Have</label>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="row my-2">
                                    <div class="col-4 col-md-3 col-lg-2 div-item">
                                        <img class="item-char" alt="" src="resources/images/items/Mora.png">
                                    </div>
                                    <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                         style="margin-top: 32px">Moras</div>
                                    <div class="col-4 col-md-3 form-outline item-required">
                                        <input id="requiredMoras" class="form-control active" type="number" readonly>
                                        <label for="requiredMoras" class="form-label">Required</label>
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-have">
                                        <input id="moras" class="form-control active" type="number"
                                               value="<?= getValue('moras') ?>">
                                        <label for="moras" class="form-label">Have</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                            <div>
                                <h4>Select level of talents:</h4>
                            </div>
                            <div class="row row-cols-2">
                                <div class="form-outline">
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="1" selected>Level 1</option>
                                        <option value="2">Level 2</option>
                                        <option value="3">Level 3</option>
                                        <option value="4">Level 4</option>
                                        <option value="5">Level 5</option>
                                        <option value="6">Level 6</option>
                                        <option value="7">Level 7</option>
                                        <option value="8">Level 8</option>
                                        <option value="9">Level 9</option>
                                    </select>
                                </div>
                                <div class="form-outline">
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="2">Level 2</option>
                                        <option value="3">Level 3</option>
                                        <option value="4">Level 4</option>
                                        <option value="5">Level 5</option>
                                        <option value="6">Level 6</option>
                                        <option value="7">Level 7</option>
                                        <option value="8">Level 8</option>
                                        <option value="9">Level 9</option>
                                        <option value="10" selected>Level 10</option>
                                    </select>
                                </div>
                            </div>

                            <div id="talent">
                                <?php for ($i = 1; $i <= 3; $i++) :
                                    for ($j = 1; $j <= $_POST['tal_rar' . $i]; $j++) : ?>
                                        <div class="row my-2">
                                            <div class="col-4 col-md-3 col-lg-2 div-item">
                                                <img class="item-char" alt=""
                                                     src="resources/images/items/<?= slug($_POST['tal' . $i]) . $j ?>.png">
                                            </div>
                                            <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                                 style="margin-top: 32px"><?= $_POST['tal' . $i] . ' ' . $j ?></div>
                                            <div class="col-4 col-md-3 form-outline item-required">
                                                <input id="requiredItem<?= $_POST['tal_id' . $i] . '_' . $j ?>"
                                                       class="form-control active" type="number" readonly>
                                                <label for="requiredItem<?= $_POST['tal_id' . $i] . '_' . $j ?>"
                                                       class="form-label">Required</label>
                                            </div>
                                            <div class="col-4 col-md-3 form-outline item-have">
                                                <input id="item<?= $_POST['tal_id' . $i] . '_' . $j ?>"
                                                       class="form-control active" type="number"
                                                       value="<?= getValue($_POST['tal_id' . $i] . '_' . $j) ?>">
                                                <label for="item<?= $_POST['tal_id' . $i] . '_' . $j ?>"
                                                       class="form-label">Have</label>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                    <hr class="my-2">
                                <?php endfor; ?>
                            </div>
                            <div id="other">
                                <div class="row my-2">
                                    <div class="col-4 col-md-3 col-lg-2 div-item">
                                        <img class="item-char" alt="" src="resources/images/items/Wanderers-Advice.png">
                                    </div>
                                    <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                         style="margin-top: 32px">Wanderer's Advice</div>
                                    <div class="col-4 col-md-3 form-outline item-required">
                                        <input id="requiredXp1" class="form-control active" type="number" readonly>
                                        <label for="requiredXp1" class="form-label">Required</label>
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-have">
                                        <input id="xp1" class="form-control active" type="number"
                                               value="<?= getValue('xp1') ?>">
                                        <label for="xp1" class="form-label">Have</label>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-4 col-md-3 col-lg-2 div-item">
                                        <img class="item-char" alt=""
                                             src="resources/images/items/Adventurers-Experience.png">
                                    </div>
                                    <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                         style="margin-top: 32px">Adventurer's Experience</div>
                                    <div class="col-4 col-md-3 form-outline item-required">
                                        <input id="requiredXp2" class="form-control active" type="number" readonly>
                                        <label for="requiredXp2" class="form-label">Required</label>
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-have">
                                        <input id="xp2" class="form-control active" type="number"
                                               value="<?= getValue('xp2') ?>">
                                        <label for="xp2" class="form-label">Have</label>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-4 col-md-3 col-lg-2 div-item">
                                        <img class="item-char" alt="" src="resources/images/items/Heros-Wit.png">
                                    </div>
                                    <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                         style="margin-top: 32px">Hero's Wit</div>
                                    <div class="col-4 col-md-3 form-outline item-required">
                                        <input id="requiredXp3" class="form-control active" type="number" readonly>
                                        <label for="requiredXp3" class="form-label">Required</label>
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-have">
                                        <input id="xp3" class="form-control active" type="number"
                                               value="<?= getValue('xp3') ?>">
                                        <label for="xp3" class="form-label">Have</label>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="row my-2">
                                    <div class="col-4 col-md-3 col-lg-2 div-item">
                                        <img class="item-char" alt="" src="resources/images/items/Mora.png">
                                    </div>
                                    <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                         style="margin-top: 32px">Moras</div>
                                    <div class="col-4 col-md-3 form-outline item-required">
                                        <input id="requiredMoras" class="form-control active" type="number" readonly>
                                        <label for="requiredMoras" class="form-label">Required</label>
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-have">
                                        <input id="moras" class="form-control active" type="number"
                                               value="<?= getValue('moras') ?>">
                                        <label for="moras" class="form-label">Have</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean();
require('./view/template/template.php');
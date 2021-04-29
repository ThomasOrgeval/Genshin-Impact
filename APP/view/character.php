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
                        <div class="tab-pane mx-2 mx-sm-3 mx-md-4 mt-3 fade show active" id="ex1-pills-1"
                             role="tabpanel"
                             aria-labelledby="ex1-tab-1">
                            <div>
                                <h4>Select level of character:</h4>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group">
                                        <label class="input-group-text" id="select" for="level_min">Start</label>
                                        <select id="level_min" class="form-select" aria-describedby="select">
                                            <option value="1" selected>Level 1</option>
                                            <option value="2">Level 20+</option>
                                            <option value="3">Level 40+</option>
                                            <option value="4">Level 50+</option>
                                            <option value="5">Level 60+</option>
                                            <option value="6">Level 70+</option>
                                            <option value="7">Level 80+</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <label class="input-group-text" id="select" for="level_max">End</label>
                                        <select id="level_max" class="form-select" aria-describedby="select">
                                            <option value="1">Level 20+</option>
                                            <option value="2">Level 40+</option>
                                            <option value="3">Level 50+</option>
                                            <option value="4">Level 60+</option>
                                            <option value="5">Level 70+</option>
                                            <option value="6">Level 80+</option>
                                            <option value="7" selected>Level 90</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="m-2" style="font-size: 30px">
                                <ul class="list-unstyled d-flex justify-content-evenly justify-content-md-start">
                                    <li class="me-md-3" onclick="addList('ascension')" data-mdb-toggle="tooltip" title="Create your own!">
                                        <i class="fas fa-list-ul"></i>
                                    </li>
                                </ul>
                            </div>

                            <div id="ascension">
                                <?php if (isset($_POST['stones'])) :
                                    $stone = $_POST['stones'][0];
                                    for ($i = 1; $i <= $stone['rarity_max']; $i++) : ?>
                                        <div class="row my-2">
                                            <div class="col-4 col-md-3 col-lg-2 div-item">
                                                <img class="item-char" alt=""
                                                     src="resources/images/items/<?= slug($stone['label']) . $i ?>.png">
                                            </div>
                                            <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                                 style="margin-top: 32px"><?= $stone['label'] . ' ' . $i ?></div>
                                            <div class="col-4 col-md-3 form-outline item-required p-0">
                                                <input id="stone<?= $i - 1 ?>"
                                                       class="form-control active" type="text" readonly>
                                                <label for="stone<?= $i - 1 ?>" class="form-label">Required</label>
                                            </div>
                                            <div class="col-4 col-md-3 form-outline item-have p-0">
                                                <input id="<?= $stone['id'] . '_' . $i ?>"
                                                       class="form-control active" type="number"
                                                       value="<?= getValue($stone['id'], $i) ?>">
                                                <label for="<?= $stone['id'] . '_' . $i ?>"
                                                       class="form-label">Have</label>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                    <hr class="my-2">
                                <?php endif;
                                $list = array(['core'], ['flower'], ['item0', 'item1', 'item2']);
                                $i = in_array($_GET['label'], ['Lumine', 'Aether']) ? 2 : 1;
                                for ($i; $i <= 3; $i++) :
                                    for ($j = 1; $j <= $_POST['lvl_rar' . $i]; $j++) : ?>
                                        <div class="row my-2">
                                            <div class="col-4 col-md-3 col-lg-2 div-item">
                                                <img class="item-char" alt=""
                                                     src="resources/images/items/<?= slug($_POST['lvl' . $i]) . $j ?>.png">
                                            </div>
                                            <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                                 style="margin-top: 32px"><?= $_POST['lvl' . $i] . ' ' . $j ?></div>
                                            <div class="col-4 col-md-3 form-outline item-required p-0">
                                                <input id="<?= $list[$i - 1][$j - 1] ?>"
                                                       class="form-control active" type="text" readonly>
                                                <label for="<?= $list[$i - 1][$j - 1] ?>"
                                                       class="form-label">Required</label>
                                            </div>
                                            <div class="col-4 col-md-3 form-outline item-have p-0">
                                                <input id="<?= $_POST['lvl_id' . $i] . '_' . $j ?>"
                                                       class="form-control active" type="number"
                                                       value="<?= getValue($_POST['lvl_id' . $i], $j) ?>">
                                                <label for="<?= $_POST['lvl_id' . $i] . '_' . $j ?>"
                                                       class="form-label">Have</label>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                    <hr class="my-2">
                                <?php endfor; ?>


                                <div class="row my-2">
                                    <div class="col-4 col-md-3 col-lg-2 div-item">
                                        <img class="item-char" alt="" src="resources/images/items/Wanderers-Advice.png">
                                    </div>
                                    <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                         style="margin-top: 32px">Wanderer's Advice
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-required p-0">
                                        <input id="asc_xp1" class="form-control active" type="number" readonly>
                                        <label for="asc_xp1" class="form-label">Required</label>
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-have p-0">
                                        <input id="64_1" class="form-control active" type="text"
                                               value="<?= getValue('xp', 1) ?>">
                                        <label for="64_1" class="form-label">Have</label>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-4 col-md-3 col-lg-2 div-item">
                                        <img class="item-char" alt=""
                                             src="resources/images/items/Adventurers-Experience.png">
                                    </div>
                                    <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                         style="margin-top: 32px">Adventurer's Experience
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-required p-0">
                                        <input id="asc_xp2" class="form-control active" type="number" readonly>
                                        <label for="asc_xp2" class="form-label">Required</label>
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-have p-0">
                                        <input id="64_2" class="form-control active" type="text"
                                               value="<?= getValue('xp', 2) ?>">
                                        <label for="64_2" class="form-label">Have</label>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-4 col-md-3 col-lg-2 div-item">
                                        <img class="item-char" alt="" src="resources/images/items/Heros-Wit.png">
                                    </div>
                                    <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                         style="margin-top: 32px">Hero's Wit
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-required p-0">
                                        <input id="asc_xp3" class="form-control active" type="text" readonly>
                                        <label for="asc_xp3" class="form-label">Required</label>
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-have p-0">
                                        <input id="64_3" class="form-control active" type="number"
                                               value="<?= getValue('xp', 3) ?>">
                                        <label for="64_3" class="form-label">Have</label>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="row my-2">
                                    <div class="col-4 col-md-3 col-lg-2 div-item">
                                        <img class="item-char" alt="" src="resources/images/items/Moras1.png">
                                    </div>
                                    <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                         style="margin-top: 32px">Moras
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-required p-0">
                                        <input id="asc_moras" class="form-control active" type="text" readonly>
                                        <label for="asc_moras" class="form-label">Required</label>
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-have p-0">
                                        <input id="63_1" class="form-control active" type="number"
                                               value="<?= getValue('Moras', 1) ?>">
                                        <label for="63_1" class="form-label">Have</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane mx-2 mx-sm-3 mx-md-4 mt-3 fade" id="ex1-pills-2" role="tabpanel"
                             aria-labelledby="ex1-tab-2">
                            <div>
                                <h4>Select level of talents:</h4>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group">
                                        <label class="input-group-text" id="select" for="talent_min">Start</label>
                                        <select id="talent_min" class="form-select" aria-describedby="select">
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
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <label class="input-group-text" id="select" for="talent_max">End</label>
                                        <select id="talent_max" class="form-select" aria-describedby="select">
                                            <option value="1">Level 2</option>
                                            <option value="2">Level 3</option>
                                            <option value="3">Level 4</option>
                                            <option value="4">Level 5</option>
                                            <option value="5">Level 6</option>
                                            <option value="6">Level 7</option>
                                            <option value="7">Level 8</option>
                                            <option value="8">Level 9</option>
                                            <option value="9" selected>Level 10</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="m-2" style="font-size: 30px">
                                <ul class="list-unstyled d-flex justify-content-evenly justify-content-md-start">
                                    <li class="me-md-3" onclick="addList('talent')" data-mdb-toggle="tooltip" title="Create your own!">
                                        <i class="fas fa-list-ul"></i>
                                    </li>
                                </ul>
                            </div>

                            <div id="talent">
                                <?php $list = array(['book0', 'book1', 'book2'], ['tal_item0', 'tal_item1', 'tal_item2'], ['tal_core']);
                                for ($i = 1; $i <= 3; $i++) :
                                    for ($j = 1; $j <= $_POST['tal_rar' . $i]; $j++) : ?>
                                        <div class="row my-2">
                                            <div class="col-4 col-md-3 col-lg-2 div-item">
                                                <img class="item-char" alt=""
                                                     src="resources/images/items/<?= slug($_POST['tal' . $i]) . $j ?>.png">
                                            </div>
                                            <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                                 style="margin-top: 32px"><?= $_POST['tal' . $i] . ' ' . $j ?></div>
                                            <div class="col-4 col-md-3 form-outline item-required p-0">
                                                <input id="<?= $list[$i - 1][$j - 1] ?>"
                                                       class="form-control active" type="text" readonly>
                                                <label for="<?= $list[$i - 1][$j - 1] ?>"
                                                       class="form-label">Required</label>
                                            </div>
                                            <div class="col-4 col-md-3 form-outline item-have p-0">
                                                <input id="<?= $_POST['tal_id' . $i] . '_' . $j ?>"
                                                       class="form-control active" type="number"
                                                       value="<?= getValue($_POST['tal_id' . $i],  $j) ?>">
                                                <label for="<?= $_POST['tal_id' . $i] . '_' . $j ?>"
                                                       class="form-label">Have</label>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                    <hr class="my-2">
                                <?php endfor; ?>

                                <div class="row my-2">
                                    <div class="col-4 col-md-3 col-lg-2 div-item">
                                        <img class="item-char" alt="" src="resources/images/items/Moras1.png">
                                    </div>
                                    <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                         style="margin-top: 32px">Moras
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-required p-0">
                                        <input id="tal_moras" class="form-control active" type="text" readonly>
                                        <label for="tal_moras" class="form-label">Required</label>
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-have p-0">
                                        <input id="63_1" class="form-control active" type="number"
                                               value="<?= getValue('Moras', 1) ?>">
                                        <label for="63_1" class="form-label">Have</label>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="row my-2">
                                    <div class="col-4 col-md-3 col-lg-2 div-item">
                                        <img class="item-char" alt=""
                                             src="resources/images/items/Crown-of-Insight1.png">
                                    </div>
                                    <div class="col-md-3 col-lg-4 align-middle text-center d-none d-md-block"
                                         style="margin-top: 32px">Crown of Insight
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-required p-0">
                                        <input id="tal_crown" class="form-control active" type="text" readonly>
                                        <label for="tal_crown" class="form-label">Required</label>
                                    </div>
                                    <div class="col-4 col-md-3 form-outline item-have p-0">
                                        <input id="38_1" class="form-control active" type="number"
                                               value="<?= getValue(38, 1) ?>">
                                        <label for="38_1" class="form-label">Have</label>
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
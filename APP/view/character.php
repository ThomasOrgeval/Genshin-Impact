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

                            <div id="ascension"></div>

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
                                        <option value="10">Level 10</option>
                                    </select>
                                </div>
                                <div class="form-outline">
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="1">Level 1</option>
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

                            <div id="talent"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean();
require('./view/template/template.php');
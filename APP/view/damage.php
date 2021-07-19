<?php $title = 'DPS Calcul - Genshin Impact';
ob_start(); ?>

    <h3 class="text-center text-primary mb-4">Damage calculator</h3>

    <section class="card shadow-1-strong mb-4">
        <div class="card-header pt-3 pb-0 text-center">
            <h5 class="mb-2"><strong>DPS</strong></h5>
        </div>
        <div class="card-body row">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                        <div class="form-outline form-white mb-3">
                            <input type="number" id="base_atk" value="0" class="form-control" min="0">
                            <label for="base_atk" class="form-label">Base attack</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                        <div class="form-outline form-white mb-3">
                            <input type="number" id="add_atk" value="0" class="form-control"  min="0">
                            <label for="add_atk" class="form-label">Additional attack</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                        <div class="form-outline form-white mb-3">
                            <i class="fas fa-percent trailing"></i>
                            <input type="number" id="crit_rate" value="50" class="form-control form-icon-trailing" min="0">
                            <label for="crit_rate" class="form-label">Crit rate</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                        <div class="form-outline form-white mb-3">
                            <i class="fas fa-percent trailing"></i>
                            <input type="number" id="crit_dmg" value="100" class="form-control form-icon-trailing" min="0">
                            <label for="crit_dmg" class="form-label">Crit damage</label>
                        </div>
                    </div>
                </div>
                <div class="row d-none">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <label class="input-group-text text-white-50" id="select" for="level_min">
                                Reaction
                            </label>
                            <select id="level_min" class="form-select bg-dark text-white-50" aria-describedby="reaction">
                                <option value="0" selected>Nothing</option>
                                <option value="1" style="color: #DFBBFF">Superconduct (Electro & Cryo)</option>
                                <option value="1.2" style="color: #A7F4CD">Swirl (Anemo)</option>
                                <option value="2.4" style="color: #CABFFF">Electro-charged (Electro & Hydro)</option>
                                <option value="3" style="color: #421e1e">Shattered (on Frozen)</option>
                                <option value="4" style="color: rgba(255,102,0,0.48)">Overloaded (Electro & Pyro)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-end"><i class="fas fa-plus-circle click"></i></div>
            </div>
            <div class="col-md-5 row">
                <div class="col-xxl-4 col-lg-6 mb-3">
                    <h5 class="text-center">DPS without crit</h5>
                    <h3 id="val_non_crit" class="font-weight-bold text-center">0</h3>
                </div>
                <div class="col-xxl-4 col-lg-6 mb-3">
                    <h5 class="text-center">DPS with crit</h5>
                    <h3 id="val_crit" class="font-weight-bold text-center">0</h3>
                </div>
                <div class="col-xxl-4 mb-3">
                    <h5 class="text-center">Average DPS</h5>
                    <h3 id="val_aver" class="font-weight-bold text-center">0</h3>
                </div>
            </div>
        </div>
    </section>

<?php $content = ob_get_clean();
require(__DIR__ . '/template/template.php');
<h5 class="text-muted mb-3">Character Ascension</h5>
<div class="col-6 mb-3">
    <div class="input-group">
        <label class="input-group-text text-white-50" id="select" for="level_min">
            Start
        </label>
        <select id="level_min" class="form-select bg-dark text-white-50" aria-describedby="select">
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
<div class="col-6 mb-3">
    <div class="input-group">
        <label class="input-group-text text-white-50" id="select" for="level_max">
            End
        </label>
        <select id="level_max" class="form-select bg-dark text-white-50" aria-describedby="select">
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
<div id="ascensions" class="col-12 d-none">
    <table class="table table-sm table-dark">
        <tr id="stone1">
            <td></td>
            <td></td>
        </tr>
        <tr id="stone2">
            <td></td>
            <td></td>
        </tr>
        <tr id="stone3">
            <td></td>
            <td></td>
        </tr>
        <tr id="stone4">
            <td></td>
            <td></td>
        </tr>
        <tr id="lvl1">
            <td></td>
            <td></td>
        </tr>
        <tr id="lvl2">
            <td></td>
            <td></td>
        </tr>
        <tr id="lvl3_1">
            <td></td>
            <td></td>
        </tr>
        <tr id="lvl3_2">
            <td></td>
            <td></td>
        </tr>
        <tr id="lvl3_3">
            <td></td>
            <td></td>
        </tr>
        <tr id="moras1">
            <td><img src="{{ asset('images/items/Moras.png') }}" alt="moras" width=30 height=30></td>
            <td></td>
        </tr>
        <tr id="xp1">
            <td><img src="{{ asset('images/items/Wanderers-Advice.png') }}" alt="xp1" width=30 height=30></td>
            <td></td>
        </tr>
        <tr id="xp2">
            <td><img src="{{ asset('images/items/Adventurers-Experience.png') }}" alt="xp2" width=30 height=30></td>
            <td></td>
        </tr>
        <tr id="xp3">
            <td><img src="{{ asset('images/items/Heros-Wit.png') }}" alt="xp3" width=30 height=30></td>
            <td></td>
        </tr>
    </table>
</div>

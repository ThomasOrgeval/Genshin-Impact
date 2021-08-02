<h5 class="text-muted mb-3">Character Talent</h5>
@for($i = 1;$i <=3; $i++)
    <h6 class="text-muted">Spell {{ $i }}</h6>
    <div class="col-6 mb-3">
        <div class="input-group">
            <label class="input-group-text text-white-50" id="select" for="talent_min{{ $i }}">Start</label>
            <select id="talent_min{{ $i }}" class="form-select text-white-50 bg-dark" aria-describedby="select">
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
    <div class="col-6 mb-3">
        <div class="input-group">
            <label class="input-group-text text-white-50" id="select" for="talent_max{{ $i }}">End</label>
            <select id="talent_max{{ $i }}" class="form-select text-white-50 bg-dark" aria-describedby="select">
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
@endfor
<div id="talents" class="col-12 d-none">
    <table class="table table-sm table-dark">
        <tr id="tal1_1">
            <td></td>
            <td></td>
        </tr>
        <tr id="tal1_2">
            <td></td>
            <td></td>
        </tr>
        <tr id="tal1_3">
            <td></td>
            <td></td>
        </tr>
        <tr id="tal2_1">
            <td></td>
            <td></td>
        </tr>
        <tr id="tal2_2">
            <td></td>
            <td></td>
        </tr>
        <tr id="tal2_3">
            <td></td>
            <td></td>
        </tr>
        <tr id="tal3">
            <td></td>
            <td></td>
        </tr>
        <tr id="moras2">
            <td><img src="{{ asset('images/items/Moras.png') }}" alt="moras" width=30 height=30></td>
            <td></td>
        </tr>
        <tr id="crown">
            <td><img src="{{ asset('images/items/Crown-of-Insight.png') }}" alt="crown" width=30 height=30></td>
            <td></td>
        </tr>
    </table>
</div>

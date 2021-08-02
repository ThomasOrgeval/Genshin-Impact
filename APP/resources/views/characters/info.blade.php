<div class="row">
    <div class="col-sm-4">
        <img src="{{ asset('images/characters/' . $character->label . '/portrait.png') }}"
             alt="{{ $character->label }}" class="img">
    </div>
    <div class="col-sm-8 text-center">
        <h3>{{ $character->label }}</h3>
        <table class="table table-dark small">
            <tr>
                <td>Title</td>
                <td>{{ $character->title }}</td>
            </tr>
            <tr>
                <td>Allegiance</td>
                <td>{{ $character->allegiance }}</td>
            </tr>
            <tr>
                <td>Element</td>
                <td>
                    <span>{{ $character->element }}</span>
                    <img src="{{ asset('images/elements/' . $character->element . '.png') }}"
                         alt="{{ $character->element }}"
                         width="22" height="22" class="ms-3">
                </td>
            </tr>
            <tr>
                <td>Weapon</td>
                <td>
                    <span>{{ $character->weapon }}</span>
                    <img src="{{ asset('images/weapons/' . $character->weapon . '.png') }}"
                         alt="{{ $character->weapon }}" width="22" height="22" class="ms-3">
                </td>
            </tr>
            <tr>
                <td>Rarity</td>
                <td>
                    @for($i = $character->rarity; $i > 0; $i--)
                        ⭐
                    @endfor
                </td>
            </tr>
            <tr>
                <td>Birthday</td>
                <td>{{ $character->birthday }}</td>
            </tr>
            <tr>
                <td>Astrolab</td>
                <td>{{ $character->astrolab }}</td>
            </tr>
            <tr>
                <td>Chinese Saiyuu</td>
                <td>{{ $character->cn_seiyuu }}</td>
            </tr>
            <tr>
                <td>English Saiyuu</td>
                <td>{{ $character->en_seiyuu }}</td>
            </tr>
            <tr>
                <td>Japanese Saiyuu</td>
                <td>{{ $character->jp_seiyuu }}</td>
            </tr>
            <tr>
                <td>Korean Saiyuu</td>
                <td>{{ $character->kr_seiyuu }}</td>
            </tr>
        </table>
        <p>
            {{ $character->description }}
        </p>
    </div>
</div>

$(document).ready(function ($) {
    $('.form-control').change(function () {
        console.log(Cookies.get($(this).attr('id')))
        Cookies.set($(this).attr('id'), $(this).val());
    });

    if ($('#character').length) {
        costAscension($('#level_min').val(), $('#level_max').val());
        costTalent($('#talent_min').val(), $('#talent_max').val());
    }

    $('#level_min').change(function () {
        costAscension($('#level_min').val(), $('#level_max').val());
    });

    $('#level_max').change(function () {
        costAscension($('#level_min').val(), $('#level_max').val());
    });

    $('#talent_min').change(function () {
        costTalent($('#talent_min').val(), $('#talent_max').val());
    });

    $('#talent_max').change(function () {
        costTalent($('#talent_min').val(), $('#talent_max').val());
    });
});

function costAscension(lvl_min, lvl_max) {
    $.post(
        'ajax/character/ascension.php',
        {
            lvl_min: lvl_min,
            lvl_max: lvl_max
        },
        function (response) {
            showCharacterItem($('#stone0').val(escapeNumber(response.stone[0])));
            showCharacterItem($('#stone1').val(escapeNumber(response.stone[1])));
            showCharacterItem($('#stone2').val(escapeNumber(response.stone[2])));
            showCharacterItem($('#stone3').val(escapeNumber(response.stone[3])));

            showCharacterItem($('#core').val(escapeNumber(response.core)));
            showCharacterItem($('#flower').val(escapeNumber(response.flower)));
            showCharacterItem($('#item0').val(escapeNumber(response.item[0])));
            showCharacterItem($('#item1').val(escapeNumber(response.item[1])));
            showCharacterItem($('#item2').val(escapeNumber(response.item[2])));

            showCharacterItem($('#asc_xp1').val(escapeNumber(response.xp[0])));
            showCharacterItem($('#asc_xp2').val(escapeNumber(response.xp[1])));
            showCharacterItem($('#asc_xp3').val(escapeNumber(response.xp[2])));
            showCharacterItem($('#asc_moras').val(escapeNumber(response.moras)));
        },
        'json'
    );
}

function costTalent(tal_min, tal_max) {
    $.post(
        'ajax/character/talent.php',
        {
            lvl_min: tal_min,
            lvl_max: tal_max
        },
        function (response) {
            showCharacterItem($('#tal_core').val(escapeNumber(response.core)));
            showCharacterItem($('#book0').val(escapeNumber(response.book[0])));
            showCharacterItem($('#book1').val(escapeNumber(response.book[1])));
            showCharacterItem($('#book2').val(escapeNumber(response.book[2])));

            showCharacterItem($('#tal_item0').val(escapeNumber(response.item[0])));
            showCharacterItem($('#tal_item1').val(escapeNumber(response.item[1])));
            showCharacterItem($('#tal_item2').val(escapeNumber(response.item[2])));

            showCharacterItem($('#tal_moras').val(escapeNumber(response.moras)));
            showCharacterItem($('#tal_crown').val(escapeNumber(response.crown)));
        },
        'json'
    );
}

function escapeNumber(number) {
    return number.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
}

function showCharacterItem(item) {
    if (item.val() === '0') item.parents(':eq(1)').addClass('d-none');
    else item.parents(':eq(1)').removeClass('d-none');
}
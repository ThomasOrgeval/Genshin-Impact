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
            $('#core').val(escapeNumber(response.core));
            $('#flower').val(escapeNumber(response.flower));
            $('#item0').val(escapeNumber(response.item[0]));
            $('#item1').val(escapeNumber(response.item[1]));
            $('#item2').val(escapeNumber(response.item[2]));

            $('#stone0').val(escapeNumber(response.stone[0]));
            $('#stone1').val(escapeNumber(response.stone[1]));
            $('#stone2').val(escapeNumber(response.stone[2]));
            $('#stone3').val(escapeNumber(response.stone[3]));

            $('#asc_xp1').val(escapeNumber(response.xp[0]));
            $('#asc_xp2').val(escapeNumber(response.xp[1]));
            $('#asc_xp3').val(escapeNumber(response.xp[2]));
            $('#asc_moras').val(escapeNumber(response.moras));
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
            $('#tal_core').val(escapeNumber(response.core));
            $('#book0').val(escapeNumber(response.book[0]));
            $('#book1').val(escapeNumber(response.book[1]));
            $('#book2').val(escapeNumber(response.book[2]));

            $('#tal_item0').val(escapeNumber(response.item[0]));
            $('#tal_item1').val(escapeNumber(response.item[1]));
            $('#tal_item2').val(escapeNumber(response.item[2]));

            $('#tal_moras').val(escapeNumber(response.moras));
            $('#tal_crown').val(escapeNumber(response.crown));
        },
        'json'
    );
}

function escapeNumber(number) {
    return number.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
}
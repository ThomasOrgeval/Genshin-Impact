$(document).ready(function ($) {
    if ($('#character').length) {
        costAscension($('#level_min').val(), $('#level_max').val());
        costTalent($('#talent_min').val(), $('#talent_max').val());
    }

    $('#level_min, #level_max').change(function () {
        costAscension($('#level_min').val(), $('#level_max').val());
    });

    $('#talent_min, #talent_max').change(function () {
        costTalent($('#talent_min').val(), $('#talent_max').val());
    });

    $('#base_atk, #add_atk, #crit_dmg, #crit_rate').change(function() {
        let rate = $('#crit_rate').val() / 100;
        if (rate > 1) rate = 1;

        let normal_dmg = parseInt($('#base_atk').val()) + parseInt($('#add_atk').val());
        let crit_dmg = normal_dmg * (1 + $('#crit_dmg').val() / 100);
        let aver = rate * crit_dmg + (1 - rate) * normal_dmg;

        console.log(normal_dmg, crit_dmg, aver);
        $('#val_non_crit').html(parseInt(normal_dmg));
        $('#val_crit').html(parseInt(crit_dmg));
        $('#val_aver').html(parseInt(aver));
    });

    $('input').change(function (e) {
        e.preventDefault();
        let input = $(this);
        $.post(
            'ajax/resources/inventory.php',
            {
                item: input.attr('id'),
                amount: input.val()
            },
            'html'
        );
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
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}

function number(number) {
    return Number(number.replaceAll(' ', ''));
}

function showCharacterItem(item) {
    if (item.val() === '0') item.parents(':eq(1)').addClass('d-none');
    else item.parents(':eq(1)').removeClass('d-none');
}

function addQueue(id) {
    let inputs = $('#' + id + ' .item-required :input');
    let ids = $('#' + id + ' .item-have :input');
    for (let i = 0; i < inputs.length; i++) {
        if (number($('#' + inputs[i].id).val()) !== 0) {
            $.post(
                'ajax/character/queue.php',
                {
                    item: ids[i].id,
                    val: number($('#' + inputs[i].id).val())
                },
                'html'
            );
        }
    }
}

function clearQueue() {
    $.post(
        'ajax/queue/clear.php',
        function () {
            $('#queue').remove();
        },
        'html'
    );
}

function deleteItemQueue(id) {
    $.post(
        'ajax/queue/delete.php',
        {
            item: id
        },
        'html'
    );
}
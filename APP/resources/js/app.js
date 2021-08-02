require('./bootstrap');

$(document).ready(function ($) {
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

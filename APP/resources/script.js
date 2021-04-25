function slug(text) {
    return text.replaceAll(' ', '-');
}

$(document).ready(function ($) {
    $('.form-control').change(function () {
        Cookies.set($(this).attr('id'), $(this).val());
    });

    if ($('#resources').length) {
        axios({
            method: 'get',
            url: 'https://genshin-api.thomasorgeval.fr/api/items'
        }).then(function (response) {
            response.data.forEach(function (data) {

                $.get(
                    './resources/templates/items.html'
                ).done(function (html) {
                    for (let j = 1; j <= data.rarity_max; j++) {
                        if (typeof Cookies.get('item' + data.id + '_' + j) === 'undefined') Cookies.set('item' + data.id + '_' + j, 0);
                        if ($('#item-list' + data.type).length === 0) {
                            $('#resources').append(html)
                                .find('.item-list-15:last').attr('id', 'item-list' + data.type).append('<div class="text-center">' +
                                '<img class="item-item" src="./resources/images/items/' + slug(data.label) + j + '.png" alt="item' + data.id + '">' +
                                '<div class="form-outline">' +
                                '<input id="item' + data.id + '_' + j + '" class="form-control text-center" ' +
                                'type="number" value="' + Cookies.get('item' + data.id + '_' + j) + '">' +
                                '<label for="item' + data.id + '_' + j + '" class="form-label"></label>' +
                                '</div>' +
                                '</div>');
                        } else {
                            $('#item-list' + data.type).append('<div class="text-center">' +
                                '<img class="item-item" src="./resources/images/items/' + slug(data.label) + j + '.png" alt="item' + data.id + '">' +
                                '<div class="form-outline">' +
                                '<input id="item' + data.id + '_' + j + '" class="form-control text-center" ' +
                                'type="number" value="' + Cookies.get('item' + data.id + '_' + j) + '">' +
                                '<label for="item' + data.id + '_' + j + '" class="form-label"></label>' +
                                '</div>' +
                                '</div>');
                        }
                    }
                });
            });
        }).catch(function (error) {
            console.log(error);
        });
    }
});
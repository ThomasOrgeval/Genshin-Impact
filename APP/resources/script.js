function slug(text) {
    return text.replaceAll(' ', '-');
}

function getIcon(type, id) {
    return axios.get('https://genshin-api.thomasorgeval.fr/api/' + type + '/' + id).then(response => response.data);
}

$(document).bind('DOMSubtreeModified', function () {
    $('.form-control').change(function () {
        Cookies.set($(this).attr('id'), $(this).val());
    });
});

$(document).ready(function ($) {
    if ($('#characters').length) {
        axios({
            method: 'get',
            url: 'https://genshin-api.thomasorgeval.fr/api/characters'
        }).then(function (response) {
            response.data.forEach(function (data) {

                $('#characters').append('<div id="char' + data.id + '"></div>')
                $.get(
                    './resources/templates/character.html'
                ).done(function (html) {
                    let id = '#char' + data.id;
                    $(id).append(html).find('.character_name').append(data.label);

                    // Ajout de l'URL du character
                    $(id).find('a').attr('href', 'character/' + slug(data.label));

                    // Reprise de l'image du character
                    $(id).find('.img-fluid').attr('src', './resources/images/characters/' + slug(data.label) + '.png');

                    Promise.all([getIcon('element', data.element), getIcon('item', data.lvl_up_material1)
                        , getIcon('item', data.lvl_up_material2), getIcon('item', data.lvl_up_material3), getIcon('item', data.talent_up_material1)
                        , getIcon('item', data.talent_up_material2), getIcon('item', data.talent_up_material3)]).then(function (results) {

                        // Reprise de l'icone de l'élément du character
                        $(id).find('.element').attr('src', 'https://genshin.thomasorgeval.fr/resources/images/elements/' + slug(results[0].label) + '.png');
                        // Reprise des matériaux d'amélioration du character
                        $(id).find('.card-text').append('<img class="item" src="./resources/images/items/' + slug(results[1].label) + results[1].rarity_max + '.png" alt="lvl_up_material1">');
                        $(id).find('.card-text').append('<img class="item" src="./resources/images/items/' + slug(results[2].label) + results[2].rarity_max + '.png" alt="lvl_up_material2">');
                        $(id).find('.card-text').append('<img class="item" src="./resources/images/items/' + slug(results[3].label) + results[3].rarity_max + '.png" alt="lvl_up_material3">');
                        $(id).find('.card-text').append('<div class="vertical"></div>');

                        // Reprise de talents du character
                        $(id).find('.card-text').append('<img class="item" src="./resources/images/items/' + slug(results[4].label) + results[4].rarity_max + '.png" alt="talent_up_material1">');
                        $(id).find('.card-text').append('<img class="item" src="./resources/images/items/' + slug(results[5].label) + results[5].rarity_max + '.png" alt="talent_up_material2">');
                        $(id).find('.card-text').append('<img class="item" src="./resources/images/items/' + slug(results[6].label) + results[6].rarity_max + '.png" alt="talent_up_material3">');
                    });
                });
            });

        }).catch(function (error) {
            console.log(error);
        });
    }

    /**
     * A changer lorsque je trouve comment reprendre avec les labels
     *
     *
     */
    if ($('#character').length) {
        axios({
            method: 'get',
            url: 'https://genshin-api.thomasorgeval.fr/api/characters'
        }).then(function (response) {
            response.data.forEach(function (data) {
                if (slug(data.label) === $('#character div').attr('id')) {
                    Promise.all([getIcon('item', data.lvl_up_material1), getIcon('item', data.lvl_up_material2),
                        getIcon('item', data.lvl_up_material3), getIcon('item', data.talent_up_material1),
                        getIcon('item', data.talent_up_material2), getIcon('item', data.talent_up_material3)]).then(function (results) {

                        $.get(
                            './resources/templates/item.html'
                        ).done(function (html) {
                            for (let i = 0; i < 3; i++) {
                                for (let j = 1; j <= results[i].rarity_max; j++) {
                                    $('#ascension').append(html)
                                        .find('.div-item:last').append('<img class="item-char" src="./resources/images/items/' + slug(results[i].label) + j + '.png" alt="lvl_up_material1">');
                                    $('#ascension').find('.item-label:last').html(results[i].label + ' ' + j);
                                    $('#ascension').find('.item-required:last input').attr('id', 'requiredItem' + results[i].id + '_' + j);
                                    $('#ascension').find('.item-have:last input').attr('id', 'item' + results[i].id + '_' + j)
                                        .attr('value', Cookies.get('item' + results[i].id + '_' + j));
                                }
                                for (let j = 1; j <= results[i + 3].rarity_max; j++) {
                                    $('#talent').append(html)
                                        .find('.div-item:last').append('<img class="item-char" src="./resources/images/items/' + slug(results[i + 3].label) + j + '.png" alt="lvl_up_talent1">');
                                    $('#talent').find('.item-label:last').html(results[i + 3].label + ' ' + j);
                                    $('#talent').find('.item-required:last input').attr('id', 'requiredItem' + results[i + 3].id + '_' + j);
                                    $('#talent').find('.item-have:last input').attr('id', 'item' + results[i + 3].id + '_' + j)
                                        .attr('value', Cookies.get('item' + results[i + 3].id + '_' + j));
                                }
                                $('#ascension').append('<hr class="my-2">');
                                $('#talent').append('<hr class="my-2">');
                            }

                            $('#other').append(html)
                                .find('.div-item:last').append('<img class="item-char" src="./resources/images/items/Wanderers-Advice.png" alt="xp1">');
                            $('#other').find('.item-label:last').html('Wanderer\'s Advice');
                            $('#other').find('.item-required:last input').attr('id', 'requiredXp1');
                            $('#other').find('.item-have:last input').attr('id', 'xp1').attr('value', Cookies.get('xp1'));

                            $('#other').append(html)
                                .find('.div-item:last').append('<img class="item-char" src="./resources/images/items/Adventurers-Experience.png" alt="xp2">');
                            $('#other').find('.item-label:last').html('Adventurer\'s Experience');
                            $('#other').find('.item-required:last input').attr('id', 'requiredXp2');
                            $('#other').find('.item-have:last input').attr('id', 'xp2').attr('value', Cookies.get('xp2'));
                            $('#other').append(html)
                                .find('.div-item:last').append('<img class="item-char" src="./resources/images/items/Heros-Wit.png" alt="xp3">');
                            $('#other').find('.item-label:last').html('Hero\'s Wit');
                            $('#other').find('.item-required:last input').attr('id', 'requiredXp3');
                            $('#other').find('.item-have:last input').attr('id', 'xp3').attr('value', Cookies.get('xp3'));

                            $('#other').append('<hr class="my-2">');
                            $('#other').append(html)
                                .find('.div-item:last').append('<img class="item-char" src="./resources/images/items/Mora.png" alt="mora">');
                            $('#other').find('.item-label:last').html('Moras');
                            $('#other').find('.item-required:last input').attr('id', 'requiredMoras');
                            $('#other').find('.item-have:last input').attr('id', 'moras').attr('value', Cookies.get('moras'));
                        });
                    });
                }
            });
        }).catch(function (error) {
            console.log(error);
        });
    }

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
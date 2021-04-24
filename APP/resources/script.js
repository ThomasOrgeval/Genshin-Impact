function slug(text) {
    return text.replaceAll(' ', '-');
}

function getIcon(type, id) {
    return axios.get('https://genshin-api.thomasorgeval.fr/api/' + type + '/' + id).then(response => response.data);
}

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
                                }
                                for (let j = 1; j <= results[i + 3].rarity_max; j++) {
                                    $('#talent').append(html)
                                        .find('.div-item:last').append('<img class="item-char" src="./resources/images/items/' + slug(results[i + 3].label) + j + '.png" alt="lvl_up_talent1">');
                                    $('#talent').find('.item-label:last').html(results[i + 3].label + ' ' + j);
                                }
                                $('#ascension').append('<hr class="my-2">');
                                $('#talent').append('<hr class="my-2">');
                            }

                            $('#ascension').append(html)
                                .find('.div-item:last').append('<img class="item-char" src="./resources/images/items/Wanderers-Advice.png" alt="xp1">');
                            $('#ascension').find('.item-label:last').html('Wanderer\'s Advice');
                            $('#ascension').append(html)
                                .find('.div-item:last').append('<img class="item-char" src="./resources/images/items/Adventurers-Experience.png" alt="xp2">');
                            $('#ascension').find('.item-label:last').html('Adventurer\'s Experience');
                            $('#ascension').append(html)
                                .find('.div-item:last').append('<img class="item-char" src="./resources/images/items/Heros-Wit.png" alt="xp3">');
                            $('#ascension').find('.item-label:last').html('Hero\'s Wit');
                            $('#ascension').append('<hr class="my-2">');
                            $('#ascension').append(html)
                                .find('.div-item:last').append('<img class="item-char" src="./resources/images/items/Mora.png" alt="mora">');
                            $('#ascension').find('.item-label:last').html('Moras');

                            $('#talent').append(html)
                                .find('.div-item:last').append('<img class="item-char" src="./resources/images/items/Wanderers-Advice.png" alt="xp1">');
                            $('#talent').find('.item-label:last').html('Wanderer\'s Advice');
                            $('#talent').append(html)
                                .find('.div-item:last').append('<img class="item-char" src="./resources/images/items/Adventurers-Experience.png" alt="xp2">');
                            $('#talent').find('.item-label:last').html('Adventurer\'s Experience');
                            $('#talent').append(html)
                                .find('.div-item:last').append('<img class="item-char" src="./resources/images/items/Heros-Wit.png" alt="xp3">');
                            $('#talent').find('.item-label:last').html('Hero\'s Wit');
                            $('#talent').append('<hr class="my-2">');
                            $('#talent').append(html)
                                .find('.div-item:last').append('<img class="item-char" src="./resources/images/items/Mora.png" alt="mora">');
                            $('#talent').find('.item-label:last').html('Moras');
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
            url: 'https://genshin-api.thomasorgeval.fr/api/items/sort'
        }).then(function (response) {

        }).catch(function (error) {
            console.log(error);
        });
    }
});
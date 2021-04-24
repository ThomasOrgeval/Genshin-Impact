function slug(text) {
    return text.replace(' ', '-');
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
                    'https://genshin.thomasorgeval.fr/resources/templates/character.html'
                ).done(function (html) {
                    let id = '#char' + data.id;
                    $(id).append(html).find('.character_name').append(data.label);

                    // Reprise de l'image du character
                    $(id).find('.img-fluid').attr('src', 'https://genshin.thomasorgeval.fr/resources/images/characters/' + slug(data.label) + '.png');

                    Promise.all([getIcon('element', data.element), getIcon('item', data.lvl_up_material1)
                        , getIcon('item', data.lvl_up_material2), getIcon('item', data.lvl_up_material3), getIcon('item', data.talent_up_material3)
                        , getIcon('item', data.talent_up_material3), getIcon('item', data.talent_up_material3)]).then(function (results) {

                        // Reprise de l'icone de l'élément du character
                        $(id).find('.element').attr('src', 'https://genshin.thomasorgeval.fr/resources/images/elements/' + slug(results[0].label) + '.png');

                        // Reprise des matériaux d'amélioration du character
                        $(id).find('.card-text').append('<img class="item" src="https://genshin.thomasorgeval.fr/resources/images/items/' + slug(results[1].label) + results[1].rarity_max + '.png" alt="lvl_up_material1">');
                        $(id).find('.card-text').append('<img class="item" src="https://genshin.thomasorgeval.fr/resources/images/items/' + slug(results[2].label) + results[2].rarity_max + '.png" alt="lvl_up_material2">');
                        $(id).find('.card-text').append('<img class="item" src="https://genshin.thomasorgeval.fr/resources/images/items/' + slug(results[3].label) + results[3].rarity_max + '.png" alt="lvl_up_material3">');
                        $(id).find('.card-text').append('<span class="text-black">&#124;</span>');

                        // Reprise de talents du character
                        $(id).find('.card-text').append('<img class="item" src="https://genshin.thomasorgeval.fr/resources/images/items/' + slug(results[4].label) + results[4].rarity_max + '.png" alt="talent_up_material1">');
                        $(id).find('.card-text').append('<img class="item" src="https://genshin.thomasorgeval.fr/resources/images/items/' + slug(results[5].label) + results[5].rarity_max + '.png" alt="talent_up_material2">');
                        $(id).find('.card-text').append('<img class="item" src="https://genshin.thomasorgeval.fr/resources/images/items/' + slug(results[6].label) + results[6].rarity_max + '.png" alt="talent_up_material3">');
                    });
                });
            });

        }).catch(function (error) {
            console.log(error);
        });
    }
});
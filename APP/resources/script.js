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
                    $(id).append(html).find('h5.character_name').append(data.label);

                    // Reprise de l'image du character
                    $(id).find('img.img-fluid').attr('src', 'https://genshin.thomasorgeval.fr/resources/images/characters/' + slug(data.label) + '.png');
                    // Reprise de l'icone de l'élément du character
                    Promise.all([getIcon('element', data.element)]).then(function (results) {
                        const acct = results[0];
                        console.log(acct);
                        $(id).find('img.element').attr('src', 'https://genshin.thomasorgeval.fr/resources/images/elements/' + slug(acct.label) + '.png');
                    });
                    // Reprise des matériaux d'amélioration du character
                    $(id).find('p.card-text').html(data.lvl_up_material1 + ' ' + data.lvl_up_material2 + ' ' + data.lvl_up_material3);
                    // Reprise de talents du character
                    $(id).find('p.card-text').append(' ' + data.talent_up_material1 + ' ' + data.talent_up_material2 + ' ' + data.talent_up_material3);
                });
            });

        }).catch(function (error) {
            console.log(error);
        });
    }
});
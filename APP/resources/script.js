function slug(text) {
    return text;
}

function getIcon(type, id) {
    axios({
        method: 'get',
        url: 'https://genshin-api.thomasorgeval.fr/api/' + type + '/' + id
    }).then(function (response) {

    }).catch(function (error) {
        console.log(error);
    });
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
                    $('#char' + data.id).find('img.img-fluid').attr('src', 'https://genshin.thomasorgeval.fr/resources/characters/' + slug(data.label) + '.png')
                    $('#char' + data.id).append(html).find('h5.character_name').append(data.label);
                    $('#char' + data.id).find('p.card-text').html(data.lvl_up_material1 + ' ' + data.lvl_up_material2);
                });
            });

        }).catch(function (error) {
            console.log(error);
        });
    }
});
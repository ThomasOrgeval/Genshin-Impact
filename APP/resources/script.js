$(document).ready(function ($) {
    if ($('#characters').length) {
        axios({
            method: 'get',
            url: 'https://genshin-api.thomasorgeval.fr/api/characters'
        }).then(function (response) {
            response.data.forEach(function (data) {
                $('#characters').load('https://genshin.thomasorgeval.fr/resources/templates/character.html');
            });
        }).catch(function (error) {
            console.log(error);
        });
    }
});
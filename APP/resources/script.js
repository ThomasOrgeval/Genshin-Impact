$(document).ready(function ($) {
    $('.form-control').change(function () {
        Cookies.set($(this).attr('id'), $(this).val());
    });
});
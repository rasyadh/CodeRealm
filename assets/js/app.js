$(document).ready(function () {
    $('.ui.sidebar').sidebar('attach events', '.toc.item');

    $('#header-learn-dropdown').dropdown({
        transition: 'fade up',
        on: 'hover'
    });

    $('#header-account-dropdown').dropdown();
    $('#header-notification-dropdown').dropdown();

    $('.ui.dropdown').dropdown();

    $('.ui.search').search({
        source: content
    });

    $('.menu.about .item').tab();

    $('.ui.checkbox').checkbox();
});

var content = [
    { title: 'HTML/CSS'},
    { title: 'JavaScript'},
    { title: 'Ruby'},
    { title: 'PHP'},
    { title: 'Python'},
    { title: 'Git'},
    { title: 'Database'},
    { title: 'Android'},
];
$(document).ready(function () {
    $('.ui.sidebar').sidebar('attach events', '.toc.item');

    $('.ui.dropdown').dropdown();
    $('#header-learn-dropdown').dropdown({
        on: 'hover',
        transition: 'fade up'
    });

    $('#header-account-dropdown').dropdown();
    $('#header-notification-dropdown').dropdown();
    $('#header-message-dropdown').dropdown();

    $('.ui.search').search({
        source: content
    });

    $('.menu.about .item').tab();
    $('.ui.checkbox').checkbox();
});

var content = [
    { title: 'HTML/CSS' },
    { title: 'JavaScript' },
    { title: 'Ruby' },
    { title: 'PHP' },
    { title: 'Python' },
    { title: 'Git' },
    { title: 'Database' },
    { title: 'Android' },
];
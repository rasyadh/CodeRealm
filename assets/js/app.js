$(document).ready(function () {
    $('.ui.sidebar').sidebar('attach events', '.toc.item');

    $('#learn-realm-dropdown').dropdown({
        transition: 'drop',
        on: 'hover'
    });

    $('.ui.search').search({
        source: content
    });

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
$(document).ready(function () {
    $('.hero-main').visibility({
        once: false,
        onBottomPassed: function () {
            $('.fixed.menu').transition('fade in');
        },
        onBottomPassedReverse: function () {
            $('.fixed.menu').transition('fade out');
        }
    });
    
    $('.ui.sidebar').sidebar('attach events', '.toc.item');

    $('.floating.dropdown').dropdown({
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
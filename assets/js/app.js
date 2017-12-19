$(document).ready(function () {
    $('.ui.sidebar').sidebar('attach events', '.toc.item');

    $('.ui.dropdown').dropdown();
    $('#header-learn-dropdown').dropdown({
        on: 'hover',
        transition: 'fade up'
    });

    $('#header-account-dropdown').dropdown({
        on: 'hover',
        transition: 'fade up'
    });
    $('#header-notification-dropdown').dropdown({
        on: 'hover',
        transition: 'fade up'
    });
    $('#header-message-dropdown').dropdown({
        on: 'hover',
        transition: 'fade up'
    });

    $('.ui.search').search({
        source: content
    });

    $('.menu.about .item').tab();
    $('.ui.checkbox').checkbox();
});

var content = [
    {
        title: 'HTML-CSS',
        url: 'http://localhost/CodeRealm/skills/html-css'
    },
    {
        title: 'JavaScript',
        url: 'http://localhost/CodeRealm/skills/javascript'
    },
    {
        title: 'Ruby',
        url: 'http://localhost/CodeRealm/skills/ruby'
    },
    {
        title: 'PHP',
        url: 'http://localhost/CodeRealm/skills/php'
    },
    {
        title: 'Python',
        url: 'http://localhost/CodeRealm/skills/python'
    },
    {
        title: 'Git',
        url: 'http://localhost/CodeRealm/skills/git'
    },
    {
        title: 'Database',
        url: 'http://localhost/CodeRealm/skills/database'
    }
];
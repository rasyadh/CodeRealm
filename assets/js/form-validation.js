$(document).ready(function () {
    $('.ui.form.signup').form({
        fields: {
            email: ['empty', 'email'],
            username: 'empty',
            password: ['minLength[6]', 'empty'],
            terms: 'checked'
        }
    });

    $('.ui.form.signin').form({
        fields: {
            email: ['empty', 'email'],
            password: ['minLength[6]', 'empty']
        }
    });
});
<?php
if (isset($this->session->userdata['user_signed_in'])) {
    header("location: http://localhost/CodeRealm/account");
}
?>

<div class="ui text container">
    <h1>Create Free Account</h1>
    <p>Already have a CodeRealm account? <?= anchor('signin', 'Sign In'); ?></p>

    <?= form_open('users/auth_signup', 'class="ui form signup"'); ?>
        <div class="ui error message"></div>
        <div class="field">
            <label for="name">Enter your full name</label>
            <?= form_input('name', '', 'placeholder="Full Name"'); ?>
        </div>
        <div class="field">
            <label for="email">Enter your email address</label>
            <?= form_input(array('type'=> 'email', 'name'=>'email'), '', 'placeholder="Email Address"'); ?>
        </div>
        <div class="field">
            <label for="username">Choose a username</label>
            <?= form_input('username', '', 'placeholder="Username"'); ?>
        </div>
        <div class="field">
            <label for="password">Pick a password</label>
            <?= form_password('password', '', 'placeholder="Password"'); ?>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <?= form_checkbox('terms', '', FALSE); ?>
                <label for="terms">I agree to the CodeRealm <a href="#">Terms of Use</a></label>
            </div>
        </div>
        <div class="ui center aligned container">
            <?= form_submit('auth_signup', 'Create Free Account', 'class="ui large primary button"'); ?>
        </div>
    <?= form_close(); ?>
</div>
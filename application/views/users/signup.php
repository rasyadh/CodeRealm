<div class="ui text container">
    <h1>Create Free Account</h1>
    <p>Already have a CodeRealm account? <?= anchor('users/signin', 'Sign In'); ?></p>

    <?= form_open('', 'class="ui form signup"'); ?>
        <div class="ui error message"></div>
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
            <?= form_submit('signup', 'Create Free Account', 'class="ui large primary button"'); ?>
        </div>
    <?= form_close(); ?>
</div>
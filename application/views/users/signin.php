<div class="ui text container">
    <h1>Sign In</h1>
    <p>Don't have a CodeRealm account? <?= anchor('users/signup', 'Create free account'); ?></p>

    <?= form_open('', 'class="ui form signin"'); ?>
        <div class="ui error message"></div>
        <div class="field">
            <label for="email">Email</label>
            <?= form_input(array('type'=> 'email', 'name'=>'email'), '', 'placeholder="Email Address"'); ?>
        </div>
        <div class="field">
            <label for="email">Password</label>
            <?= form_password('password', '', 'placeholder="Password"'); ?>
        </div>
        <div class="field">
            <a href="#"><i class="info circle icon"></i>Forgot your password?</a>
        </div>
        <div class="ui text center aligned container">
            <?= form_submit('signin', 'Sign In', 'class="ui large primary button"'); ?>
        </div>
    <?= form_close(); ?>
</div>
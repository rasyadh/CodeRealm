<?php
if (isset($this->session->userdata['admin_signed_in'])) {
    header("location: http://localhost/CodeRealm/admin/dashboard");
}

?>

<div class="ui text container">
    <h1>Admin Site</h1>

    <?= form_open('admin/signin', 'class="ui form signin"'); ?>
        <div class="ui error message"></div>
        <div class="field">
            <label for="email">Email</label>
            <?= form_input(array('type'=> 'email', 'name'=>'email'), '', 'placeholder="Email Address"'); ?>
        </div>
        <div class="field">
            <label for="email">Password</label>
            <?= form_password('password', '', 'placeholder="Password"'); ?>
        </div>
        <div class="ui text center aligned container">
            <?= form_submit('signin', 'Sign In', 'class="ui large primary button"'); ?>
        </div>
    <?= form_close(); ?>
</div>
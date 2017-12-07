<main class="main">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <div class="ui container">
            <div class="ui segments">
                <div class="ui padded segment">
                    <?= form_open_multipart('admin/admin/change_photo', 'class="ui form"'); ?>
                        <?= form_hidden('id_admin', $account['id_admin']); ?>
                        <div class="fields">
                            <div class="field">
                            <?php if ($account['photo_url'] == '') { ?>
                                <img class="ui tiny circular image" src="<?= base_url('assets/image/logo.svg'); ?>" />
                            <?php } 
                            else { ?>
                                <img class="ui tiny circular image" src="<?= $account['photo_url']; ?>" />
                            <?php } ?>
                            </div>
                            <div class="field">
                                <?= form_upload('url', ''); ?>
                            </div>
                            <div class="field">
                                <?= form_submit('change_photo', 'Change Photo', 'class="ui primary button"'); ?>
                            </div>
                        </div>
                    <?= form_close(); ?>
                </div>
                <div class="ui padded segment">
                    <?= form_open('admin/admin/save_account', 'class="ui form"'); ?>
                        <div class="ui error message"></div>
                        <?= form_hidden('id_admin', $account['id_admin']); ?>
                        <div class="required field">
                            <label>Name</label>
                            <?= form_input('name', $account['name'], array('placeholder'=>'Name', 'required'=>'')); ?>
                        </div>
                        <div class="required field">
                            <label>Email</label>
                            <?= form_input(array('type'=> 'email', 'name'=>'email'), $account['email'], array('placeholder'=>'Email', 'required'=>'')); ?>
                        </div>
                        <?= form_submit('save_account', 'Save Change', 'class="ui large fluid primary button"'); ?>
                    <?= form_close(); ?>
                </div>
                <div class="ui padded segment">
                    <?= form_open('admin/admin/change_password', 'class="ui form"'); ?>
                        <div class="ui error message"></div>
                        <?= form_hidden('id_admin', $account['id_admin']); ?>
                        <div class="required field">
                            <label>Current Password</label>
                            <?= form_password('current_password', '', array('placeholder'=>'Current Password', 'required'=>'')); ?>
                        </div>
                        <div class="required field">
                            <label>New Password</label>
                            <?= form_password('new_password', '', array('placeholder'=>'New Password', 'required'=>'')); ?>
                        </div>
                        <?= form_submit('change_password', 'Change Password', 'class="ui large fluid primary button"'); ?>
                    <?= form_close(); ?>
                </div>
            </div>

        </div>
    </div>
</main>
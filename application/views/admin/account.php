<main class="main">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <div class="ui container">
            <div class="ui segments">
                <div class="ui padded segment">
                    <form class="ui form" enctype="multipart/form-data">
                        <div class="fields">
                            <div class="field">
                                <img class="ui tiny circular image" src="<?= base_url('assets/image/logo.svg'); ?>" alt="photoprofile" />
                            </div>
                            <div class="field">
                                <label>Change Photo</label>
                                <input type="file" name="photo-profile" accept="image/*" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="ui padded segment">
                    <form class="ui form">
                        <div class="field">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name" />
                        </div>
                        <div class="field">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email" />
                        </div>
                        <div class="field">
                            <label>Username</label>
                            <input type="text" name="username" placeholder="Username" />
                        </div>
                        <input type="submit" value="Save Change" name="edit-profile" class="ui large fluid primary button" />
                    </form>
                </div>
                <div class="ui padded segment">
                    <form class="ui form">
                        <div class="field">
                            <label>Current Password</label>
                            <input type="password" name="current-pass" placeholder="Current Password" />
                        </div>
                        <div class="field">
                            <label>New Password</label>
                            <input type="password" name="new-pass" placeholder="New Password" />
                        </div>
                        <input type="submit" value="Change Password" name="change-pass" class="ui large fluid primary button" />
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>
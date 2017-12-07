<!-- Header -->
<div class="ui borderless text menu">
    <div class="ui container">
        <a class="toc item"><i class="sidebar icon"></i></a>
        <div class="item">
            <a class="ui small image" href="<?= site_url(); ?>">
                <img src="<?= base_url("assets/image/logo-code-realm.svg"); ?>">
            </a>
        </div>
        <!-- Menu -->
        <div class="item">
            <div class="ui floating dropdown item" id="header-learn-dropdown">
                <strong>Learn Realm</strong>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="<?= site_url('skills'); ?>"><i class="blue block layout icon"></i>Skills Path</a>
                    <a class="item" href="<?= site_url('quest'); ?>"><i class="blue list layout icon"></i>Quest Courses</a>
                    <a class="item" href="<?= site_url('pvp'); ?>"><i class="blue game icon"></i>PvP</a>
                </div>
            </div>
        </div>
        <div class="right item">
            <!-- Search -->
            <div class="item">
                <div class="ui search">
                    <div class="ui icon input">
                        <input class="prompt" type="text" placeholder="Search the Realm ...">
                        <i class="search icon"></i>
                    </div>
                    <div class="result"></div>
                </div>
            </div>
            <?php if (isset($this->session->userdata['user_signed_in'])){ ?>
            <!-- Notification -->
            <div class="item">
                <div class="ui floating dropdown icon" id="header-notification-dropdown">
                    <i class="large alarm icon"></i>
                    <div class="menu">
                        <div class="item">
                            There is no new notification.
                        </div>
                        <div class="divider"></div>
                        <div class="item">
                            <a href="<?= site_url('notification'); ?>">Show all new notification</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Messages -->
            <div class="item">
                <div class="ui floating dropdown icon" id="header-message-dropdown">
                    <i class="large comments icon"></i>
                    <div class="menu">
                        <div class="item">
                            There is no new message.
                        </div>
                        <div class="divider"></div>
                        <div class="item">
                            <a href="<?= site_url('account/messages'); ?>">Show all new message</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Account -->
            <div class="item">
                <div class="ui floating dropdown" id="header-account-dropdown">
                    <img class="ui avatar image" src="<?= $photo_url; ?>">
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="<?= site_url('account'); ?>"><i class="blue dashboard icon"></i>My Dashboard</a>
                        <a class="item" href="<?= site_url('account/report'); ?>"><i class="blue book icon"></i>My Report Card</a>
                        <a class="item" href="<?= site_url('account/profile'); ?>"><i class="blue user icon"></i>My Profile</a>
                        <a class="item" href="<?= site_url('users/signout'); ?>"><i class="blue sign out icon"></i>Sign Out</a>
                    </div>
                </div>
            </div>
            <?php
            }
            else {
            ?>
            <!-- Sign Up -->
            <div class="item">
                <?= anchor('signup', 'Create Free Account', 'class="ui primary basic button"'); ?>
            </div>
            <!-- Sign In -->
            <div class="item">
                <?= anchor('signin', 'Sign In', 'class="ui primary button"'); ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
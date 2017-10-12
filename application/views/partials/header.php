<!-- Header -->
<div class="ui borderless text menu">
    <div class="ui container">
        <a class="toc item"><i class="sidebar icon"></i></a>
        <div class="item">
            <a class="ui small image" href="<?= site_url(); ?>">
                <img src="<?= base_url("assets/image/logo-code-realm.svg"); ?>">
            </a>
        </div>
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
            <div class="item">
                <div class="ui search">
                    <div class="ui icon input">
                        <input class="prompt" type="text" placeholder="Search the Realm ...">
                        <i class="search icon"></i>
                    </div>
                    <div class="result"></div>
                </div>
            </div>
            <?php if ($signin == true){ ?>
            <div class="item">
                <div class="ui floating dropdown icon" id="header-notification-dropdown">
                    <i class="large alarm icon"></i>
                    <div class="menu">
                        <div class="item">
                            There is no new notification.
                        </div>
                        <div class="divider"></div>
                        <div class="item">
                            <a href="">Show all new notification</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="item" href="">
                <i class="large comments icon"></i>
            </a>
            <div class="item">
                <div class="ui floating dropdown" id="header-account-dropdown">
                    <img class="ui avatar image" src="<?= base_url("assets/image/logo.svg"); ?>">
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="<?= site_url(); ?>"><i class="blue dashboard icon"></i>My Dashboard</a>
                        <a class="item" href="<?= site_url(); ?>"><i class="blue book icon"></i>My Report Card</a>
                        <a class="item" href="<?= site_url(); ?>"><i class="blue user icon"></i>My Profile</a>
                        <a class="item" href="<?= site_url(); ?>"><i class="blue sign out icon"></i>Sign Out</a>
                    </div>
                </div>
            </div>
            <?php
            }
            else {
            ?>
            <div class="item">
                <?= anchor('users/signup', 'Create Free Account', 'class="ui primary basic button"'); ?>
            </div>
            <?= anchor('users/signin', 'Sign In', 'class="item"'); ?>
            <?php } ?>
        </div>
    </div>
</div>
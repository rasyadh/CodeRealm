<!-- Top Sidebar -->
<div class="ui vertical borderless top sidebar menu">
    <div class="ui container">
        <div class="item">
            <a class="ui small image" href="<?= site_url(); ?>">
                <img src="<?= base_url("assets/image/logo-code-realm.svg"); ?>">
            </a>
        </div>
        <div class="item">
            <div class="ui search">
                <div class="ui icon input">
                    <input class="prompt" type="text" placeholder="Search the Realm ...">
                    <i class="search icon"></i>
                </div>
                <div class="result"></div>
            </div>
        </div>
        <div class="item">
            <div class="ui dropdown">
                <div class="text">Learn Realm</div>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="<?= site_url('skills'); ?>"><i class="blue block layout icon"></i>Skills Path</a>
                    <a class="item" href="<?= site_url('quest'); ?>"><i class="blue list layout icon"></i>Quest Courses</a>
                    <a class="item" href="<?= site_url('pvp'); ?>"><i class="blue game icon"></i>PvP</a>
                </div>
            </div>
        </div>
        <?php if ($signin == true){ ?>
        <div class="item">
            <div class="ui dropdown">
                <div class="text">Account</div>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="<?= site_url(); ?>"><i class="blue dashboard icon"></i>My Dashboard</a>
                    <a class="item" href="<?= site_url(); ?>"><i class="blue book icon"></i>My Report Card</a>
                    <a class="item" href="<?= site_url(); ?>"><i class="blue user icon"></i>My Profile</a>
                </div>
            </div>
        </div>
        <div class="item">
            <?= anchor('main/index', 'Sign Out', 'class="ui basic primary button"'); ?>
        </div>
        <?php
        }
        else {
        ?>
        <div class="item">
            <?= anchor('users/signup', 'Create Free Account', 'class="ui basic primary button"'); ?>
            <?= anchor('users/signin', 'Sign In', 'class="ui primary button"'); ?>
        </div>
        <?php } ?>
    </div>
</div>
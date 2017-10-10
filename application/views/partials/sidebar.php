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
        <a class="item" href="<?= site_url('skills'); ?>"><i class="blue block layout icon"></i>Skills Path</a>
        <a class="item" href="<?= site_url('quest'); ?>"><i class="blue list layout icon"></i>Quest Courses</a>
        <a class="item" href="<?= site_url('pvp'); ?>"><i class="blue game icon"></i>PvP</a>
        <div class="item">
            <?= anchor('users/signup', 'Create Free Account', 'class="ui basic primary button"'); ?>
            <?= anchor('users/signin', 'Sign In', 'class="ui primary button"'); ?>
        </div>
    </div>
</div>
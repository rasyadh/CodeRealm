<!-- Header -->
<div class="ui borderless menu">
    <div class="ui container">
        <div class="item">
            <a class="ui small image" href="<?= site_url('admin/dashboard'); ?>">
                Admin
                <img src="<?= base_url("assets/image/logo-code-realm.svg"); ?>">
            </a>
        </div>
        <div class="right item">
            <!-- Menu -->
            <?php
                $active = str_replace('admin/', '', uri_string());
                $tabs = [
                    ['Dashboard', 'dashboard'],
                    ['Skills Path', 'skills'],
                    ['Quest Courses', 'quest'],
                    ['Lecture', 'lecture'],
                    ['User', 'user'],
                    ['Account', 'account']
                ];
                for ($i = 0; $i < count($tabs); $i++) {
                    if ($active == $tabs[$i][1]) {
                        ?>
                        <a class="item active" href="<?= site_url('admin/'.$tabs[$i][1]); ?>">
                            <?= $tabs[$i][0]; ?>
                        </a>
                        <?php
                    }
                    else {
                        ?>
                        <a class="item" href="<?= site_url('admin/'.$tabs[$i][1]); ?>">
                            <?= $tabs[$i][0]; ?>
                        </a>
                        <?php
                    }
                }
            ?>
            <div class="item">
                <a class="ui basic primary button" href="<?= site_url('admin/signout'); ?>">
                    Sign Out
                </a>
            </div>
        </div>
    </div>
</div>
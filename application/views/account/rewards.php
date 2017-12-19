<main class="account">
    <div class="ui container">
        <div class="ui secondary blue pointing menu">
            <a class="item" href="<?= site_url('account'); ?>">My Dashboard</a>
            <a class="item" href="<?= site_url('account/history'); ?>">History</a>
            <a class="active item" href="<?= site_url('account/rewards'); ?>">Rewards</a>
        </div>
        <br/>
        <div className="ui text container">
            <h2>My Badges</h2>
            <div className="ui segment">
                <!-- Recent Badges -->
                <div class="ui center aligned container">
                    <div class="ui three stackable centered cards">
                        <?php foreach ($badges as $b) { ?>
                        <div class="raised card">
                            <div class="image" style="background: #fff;">
                                <img class="ui circular image" src="<?= $b->img; ?>" alt="Badges" />
                            </div>
                            <div class="content">
                                <div class="header"><?= $b->nama_badge; ?></div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
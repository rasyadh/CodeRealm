<main class="account">
    <div class="ui container">
        <div class="ui secondary blue pointing menu">
            <a class="item" href="<?= site_url('account'); ?>">My Dashboard</a>
            <a class="active item" href="<?= site_url('account/history'); ?>">History</a>
            <a class="item" href="<?= site_url('account/rewards'); ?>">Rewards</a>
        </div>
        <br/>
        <div class="ui container">
            <h2>Activity</h2>
            <div class="ui padded segment">
                <div class="ui center aligned container">
                    <h3>No Activity</h3>
                    <p>You don't have any activity yet</p>
                </div>
            </div>
        </div>
    </div>
</main>
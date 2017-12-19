<main class="account">
    <div class="ui container">
        <div class="ui secondary blue pointing menu">
            <a class="active item" href="<?= site_url('account'); ?>">My Dashboard</a>
            <a class="item" href="<?= site_url('account/history'); ?>">History</a>
            <a class="item" href="<?= site_url('account/rewards'); ?>">Rewards</a>
        </div>
        <br/>
        <div class="ui stackable grid">

            <div class="ten wide column">
                <!-- Keep Playing Skills -->
                <div class="ui container" id="content-account">
                    <h2>Keep Playing Skills</h2>
                    <br />
                    
                    <?php foreach($enroll_skill as $skill) { 
                        if ($skill->enroll_status == TRUE) { ?>
                            <div class="ui stackable middle aligned grid">
                                <div class="four wide column">
                                    <div>
                                        <img class="ui circular image" src="<?= $skill->skill_badge ?>" alt="Skills Course" />
                                    </div>
                                </div>
                                <div class="eight wide column">
                                    <div>
                                        <h3><?= $skill->skill_name; ?></h3>
                                    </div>
                                    <br />
                                    <div class="ui tiny blue progress">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                                <div class="wide column"></div>
                                <div class="three wide column">
                                    <div class="ui stackable middle aligned grid">
                                        <a href="<?= $skill->enroll_url; ?>" class="ui fluid primary button">Resume</a>
                                    </div>
                                </div>
                            </div>
                        <?php } 
                    } ?>

                </div>

                <!-- Keep Playing Course -->
                <div class="ui container" id="content-account">
                    <h2>Keep Playing Course</h2>
                    <br />
                    <div class="ui stackable middle aligned grid">
                        <div class="four wide column">
                            <a href="<?= site_url('account'); ?>">
                                <img class="ui circular image" src="<?= base_url('assets/image/Course/Javascript/javascript-01.png') ?>" alt="Course" />
                            </a>
                        </div>
                        <div class="eight wide column">
                            <a href="<?= site_url('account'); ?>">
                                <h3>JavaScript Road Trip Part 1</h3>
                            </a>
                            <br />
                            <div class="ui tiny blue progress">
                                <div class="bar"></div>
                            </div>
                        </div>
                        <div class="wide column"></div>
                        <div class="three wide column">
                            <div class="ui stackable middle aligned grid">
                                <button class="ui fluid primary button">Resume</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="wide column"></div>

            <div class="five wide column">
                <!-- Recent Badges -->
                <div class="ui container">
                    <div class="ui card">
                        <div class="content">
                            <div class="header">
                                <h3>Recent Badges</h3>
                            </div>
                        </div>

                        <div class="extra content">
                            <div class="ui tiny circular images">
                                <?php foreach ($badges as $b) { ?>
                                    <img class="ui circular image" src="<?= $b->img; ?>" alt="Badges" />
                                <?php } ?>
                            </div>
                            <br />
                            <div class="ui center aligned container">
                                <a class="ui basic primary button" href="<?= site_url('account/rewards'); ?>">View All Badges</a>
                            </div>
                            <br />
                        </div>
                    </div>
                </div>
                <br/>

            </div>
        </div>
    </div>
</main>
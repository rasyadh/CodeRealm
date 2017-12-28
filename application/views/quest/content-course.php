<section class="hero-skills">
<div class="ui center aligned container" id="hero-content">
    <div class="ui container">
        <h1 class="ui inverted header"><?= $content[0]->name; ?></h1>
        <p class="ui inverted header"><?= $content[0]->description; ?></p>
        <?php if (isset($this->session->userdata['user_signed_in'])) { ?>            
            <a class="ui large black button" href="<?= site_url('signin'); ?>">Enroll Now</a>    
        <?php } else { ?>
            <a class="ui large black button" href="<?= site_url('signin'); ?>">Enroll Now</a>    
        <?php } ?>
    </div>
</div>
</section>

<main class="learn-realm">
    <div class="ui container">
        <div class="ui stackable grid">
            <div class="ten wide column">
                <div class="ui container">
                    <?php foreach ($content[0]->courses as $quest) { ?>
                        <div class="ui segment">
                            <div class="ui stackable middle aligned grid">
                                <div class="three wide column">
                                    <a href="<?= $quest->img; ?>">
                                        <img class="ui small circular image" src="<?= $quest->img; ?>" alt="<?= $quest->nameCourse; ?>" />
                                    </a>
                                </div>
                                <div class="ten wide column">
                                    <a href="#"><h2><?= $quest->nameCourse; ?></h2></a>
                                    <p><?= $quest->description; ?></p>
                                    <p>Point : <?= $quest->point; ?></p>
                                </div>
                                <div class="three wide column">
                                    <div class="ui small label">Not Complete</div>
                                </div>
                            </div>
                        </div>
                        <br />
                    <?php } ?>
                </div>
            </div>
            <div class="two wide column"></div>
            <div class="four wide column">
                <div class="ui center aligned container">
                    <div class="ui card">
                        <div class="image">
                            <img src="<?= $content[0]->img; ?>" alt="<?= $content[0]->name; ?>" />
                        </div>
                        <div class="content">
                            <div class="header">
                                Courses
                            </div>
                            <div class="meta">
                                <?= $content[0]->numOfCourse; ?> Course
                            </div>
                        </div>
                        <?php if (isset($this->session->userdata['user_signed_in'])) { ?>
                            <div class="extra content">
                                <a href="<?= site_url('account'); ?>">My Account</a>
                            </div>
                        <?php } ?>
                    </div>
                    <br/>
                    <div class="ui card">
                        <div class="image">
                            <img src="<?= $content[0]->lecturePhoto; ?>" alt="<?= $content[0]->lecture; ?>" />
                        </div>
                        <div class="content">
                            <div class="header">
                                Lecture
                            </div>
                            <div class="meta">
                                <?= $content[0]->lecture; ?>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</main >
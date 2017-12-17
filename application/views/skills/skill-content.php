<section class="hero-skills">
<div class="ui center aligned container" id="hero-content">
    <div class="ui container">
        <h1 class="ui inverted header"><?= $content[0]->name; ?></h1>
        <p class="ui inverted header"><?= $content[0]->description; ?></p>
        <?php if (isset($this->session->userdata['user_signed_in'])) { ?>            
            <?php if ($enroll['enroll_status']) { ?>
                <a class="ui large black button" href="<?= site_url('skills/unenroll/'.$enroll['id_enroll_skills'].'/'.$user['id_skill'].'/'.$enroll['enroll_status']); ?>">Enrolled</a>    
            <?php } else { ?>
                <a class="ui large black button" href="<?= site_url('skills/enroll/'.$user['id_user'].'/'.$user['id_skill']); ?>">Enroll Now</a>    
            <?php } ?>
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

                <?php foreach ($content[0]->path as $path) { ?>
                    <div class="ui container">
                        <div class="title-course">
                            <h2><?= $path->titlePath; ?></h2>
                            <p><?= $path->description; ?></p>
                        </div>
                        <?php foreach ($path->courses as $course) { ?>
                            <div class="ui segment">
                                <div class="ui stackable middle aligned grid">
                                    <div class="three wide column">
                                        <a href="<?= $course->courseBadge; ?>">
                                            <img class="ui small circular image" src="<?= $course->courseBadge; ?>" alt="<?= $course->courseName; ?>" />
                                        </a>
                                    </div>
                                    <div class="thirteen wide column">
                                        <div class="ui small label">Course</div><br />
                                        <a href="<?= site_url('skills/download/'.$content[0]->skillFile); ?>"><h2><?= $course->courseName; ?></h2></a>
                                        <p><?= $course->description; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <br />
                    </div>
                <?php } ?>

            </div>
            <div class="two wide column"></div>
            <div class="four wide column">
                <div class="ui center aligned container">
                    <div class="ui card">
                        <div class="image">
                            <img src="<?= $content[0]->skillBadge; ?>" alt="<?= $content[0]->name; ?>" />
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
                </div>  
            </div>
        </div>
    </div>
</main >
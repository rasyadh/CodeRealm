<section class="hero-skills">
<div class="ui center aligned container" id="hero-content">
    <div class="ui container">
        <h1 class="ui inverted header"><?= $skill_content[0]->title; ?></h1>
        <p class="ui inverted header"><?= $skill_content[0]->description; ?></p>
        <a class="ui large black button" href="<?= site_url('signup'); ?>">Enroll Now</a>
    </div>
</div>
</section>

<main class="learn-realm">
    <div class="ui container">
        <div class="ui stackable grid">
            <div class="ten wide column">

                <?php foreach ($skill_content[0]->courses as $courses) { ?>
                    <div class="ui container">
                        <div class="title-course">
                            <h2><?= $courses->titleCourse ?></h2>
                            <p><?= $courses->descriptionCourse ?></p>
                        </div>
                        <?php foreach ($courses->course as $course) { ?>
                            <div class="ui segment">
                                <div class="ui stackable middle aligned grid">
                                    <div class="three wide column">
                                        <a href="<?= $course->courseUrl; ?>">
                                            <img class="ui small circular image" src="<?= base_url($course->courseBadge); ?>" alt="<?= $course->courseName; ?>" />
                                        </a>
                                    </div>
                                    <div class="thirteen wide column">
                                        <div class="ui small label">Course</div><br />
                                        <a href="/skills"><h2><?= $course->courseName; ?></h2></a>
                                        <p><?= $course->courseDescription; ?></p>
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
                            <img src="<?= base_url($skill_content[0]->badgeUrl); ?>" alt="<?= $skill_content[0]->title; ?>" />
                        </div>
                        <div class="content">
                            <div class="header">
                                Courses Complete
                        </div>
                            <div class="meta">
                                <?= $skill_content[0]->completedCourses.'/'.$skill_content[0]->numOfCourses; ?>Complete
                        </div>
                        </div>
                        <div class="extra content">
                            My Account
                    </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</main >
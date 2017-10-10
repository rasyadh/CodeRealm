<section class="hero-skills">
    <div class="ui center aligned container" id="hero-content">
        <div class="ui container">
            <h1 class="ui inverted header">Quest Courses</h1>
            <p class="ui inverted header">Curated skill paths to help you develop the right skills in the right order</p>
            <a class="ui large black button" href="<?= site_url('users/signup'); ?>">Enroll Now</a>
        </div>
    </div>
</section>

<main class="learn-realm">
    <div class="ui container">
        <div class="ui secondary blue pointing menu">
            <a class="item" href="<?= site_url('skills'); ?>"><i class="block layout icon"></i>Skills Path</a>
            <a class="active item" href="<?= site_url('quest'); ?>"><i class="list layout icon"></i>Quest Courses</a>
            <a class="item" href="<?= site_url('pvp'); ?>"><i class="game icon"></i>PvP</a>
        </div>
        <br>
        <div class="ui four stackable link centered cards">

            <?php foreach ($skill_path as $skill){ ?>
                <div class="raised card">
                    <div class="image">
                        <img src="<?= base_url($skill->imgUri); ?>">
                    </div>
                    <div class="content">
                        <div class="header"><?= $skill->name; ?></div>
                        <div class="meta">
                            <a><?= $skill->numOfCourse; ?>Courses</a>
                        </div>
                        <div class="description">
                            <?= $skill->description; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</main>
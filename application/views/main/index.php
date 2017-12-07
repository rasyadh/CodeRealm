<section class="hero-main">
    <div class="ui center aligned container" id="hero-main-content">
        <h1 class="ui inverted header">Role. Playing. Code.</h1>
        <h2 class="ui inverted header">The Interactive learning and playfull like a game</h2>
        <br>
        <a class="ui large inverted button" href="<?= site_url('skills'); ?>">Explore Our Realm</a>
    </div>
</section>

<main class="learn-realm">
    <div class="ui text center aligned container main-title">
        <h1>Learning The Realm</h1>
        <p>CodeRealm mission courses are organized into Skills Path based on technology. Learn to upgrade your skills now.
        </p>
    </div>
    <div class="ui container">
        <div class="ui three stackable centered cards">
            
            <?php foreach ($skills as $skill){ ?>
                <div class="raised card">
                    <a class="image" href="<?= $skill->enrollUrl; ?>">
                        <img src="<?= $skill->skillBadge; ?>">
                    </a>
                    <div class="content">
                        <a class="header" href="<?= $skill->enrollUrl; ?>"><?= $skill->name; ?></a>
                        <div class="meta">
                            <a><?= $skill->numOfCourse; ?> Courses</a>
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

<section id="how-coderealm-works">
    <div class="ui text center aligned container main-title">
        <h1>How CodeRealm Works</h1>
    </div>
    <div class="ui container">
        <div class="ui stackable two column grid">
            <div class="column" id="works">
                <img class="ui small centered image" src="<?= base_url("assets/image/Works/works-learn.svg"); ?>">
            </div>
            <div class="column" id="works">
                <div class="ui container">
                    <h2>Learn</h2>
                    <p>Experienced, engaging instructors take you through course material, step by step, in our high-quality video lessons.</p>
                </div>
            </div>
            <div class="column" id="works">
                <img class="ui small centered image" src="<?= base_url("assets/image/Works/works-win.svg"); ?>">
            </div>
            <div class="column" id="works">
                <div class="ui container">
                    <h2>Win</h2>
                    <p>Rack up points in the challenges and earn badges as you complete each course level, leading up to the coveted course completion badge.</p>
                </div>
            </div>
            <div class="column" id="works">
                <img class="ui small centered image" src="<?= base_url("assets/image/Works/works-track.svg"); ?>">
            </div>
            <div class="column" id="works">
                <div class="ui container">
                    <h2>Track</h2>
                    <p>Keep track of all your activity — points and badges earned, courses completed, screencasts watched, and more — with your Report Card.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="badges-rank">
    <div class="ui container" id="badges-rank-content">
        <div class="ui middle aligned stackable two column grid">
            <div class="column">
                    <h2 id="text-white">Beginner Guide to Web Development</h2>
                    <p id="text-white">Our guide explains the basics of web development and points you in the right direction based on your
                        goals.
                    </p>
                    <br>
                    <a class="ui inverted button" href="<?= site_url('quest'); ?>">Read the Guide</a>
            </div>
            <div class="column">
                <img class="ui centered medium image" src="<?= base_url("assets/image/logo-code-realm.svg"); ?>">
            </div>
        </div>
    </div>
</section>
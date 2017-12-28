<main class="main">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <div class="ui four cards">
            <div class="blue card">
                <div class="content">
                    <div class="header">User</div>
                </div>
                <div class="content" style="text-align: center">
                    <div class="ui statistic">
                        <div class="value">
                            <?= $dashboard[0]['numUser'] ?>
                        </div>
                        <div class="label">
                            Users
                        </div>
                    </div>
                </div>
            </div>

            <div class="blue card">
                <div class="content">
                    <div class="header">Skills Path</div>
                </div>
                <div class="content" style="text-align: center">
                    <div class="ui statistic">
                        <div class="value">
                            <?= $dashboard[1]['numSkill'] ?>
                        </div>
                        <div class="label">
                            Skills
                        </div>
                    </div>
                </div>
            </div>

            <div class="blue card">
                <div class="content">
                    <div class="header">Quest Course</div>
                </div>
                <div class="content" style="text-align: center">
                    <div class="ui statistic">
                        <div class="value">
                            <?= $dashboard[2]['numQuest'] ?>
                        </div>
                        <div class="label">
                            Course
                        </div>
                    </div>
                </div>
            </div>

            <div class="blue card">
                <div class="content">
                    <div class="header">Lecture</div>
                </div>
                <div class="content" style="text-align: center">
                    <div class="ui statistic">
                        <div class="value">
                            <?= $dashboard[3]['numLecture'] ?>
                        </div>
                        <div class="label">
                            Lecture
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
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
                <!-- Keep Playing -->
                <div class="ui container" id="content-account">
                    <h2>Keep Playing</h2>
                    <br />
                    <div class="ui stackable middle aligned grid">
                        <div class="four wide column">
                            <a href="<?= site_url('account'); ?>">
                                <img class="ui circular image" src="<?= base_url('assets/image/Course/Javascript/javascript-01.png') ?>" alt="Course" />
                            </a>
                        </div>
                        <div class="eight wide column">
                            <div class="ui small label">Javascript Course</div>
                            <br />
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

                <!-- Recently Played -->
                <div class="ui container" id="content-account">
                    <h2>Recently Played</h2>
                    <br />
                    <div class="ui three stackable cards">
                        <div class="card">
                            <div class="image" id="recently-played-img">
                                <img src="<?= base_url('assets/image/Course/Ruby/ruby-bits.png'); ?>" alt="Course" />
                            </div>
                            <div class="content">
                                <div class="meta">Ruby Course</div>
                                <div class="header">Try Ruby</div>
                                <br />
                                <div class="description">
                                    <div class="ui tiny blue progress">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="image" id="recently-played-img">
                                <img src="<?= base_url('assets/image/Course/Ruby/ruby-bits.png'); ?>" alt="Course" />
                            </div>
                            <div class="content">
                                <div class="meta">Ruby Course</div>
                                <div class="header">Try Ruby</div>
                                <br />
                                <div class="description">
                                    <div class="ui tiny blue progress">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="image" id="recently-played-img">
                                <img src="<?= base_url('assets/image/Course/Ruby/ruby-bits.png'); ?>" alt="Course" />
                            </div>
                            <div class="content">
                                <div class="meta">Ruby Course</div>
                                <div class="header">Try Ruby</div>
                                <br />
                                <div class="description">
                                    <div class="ui tiny blue progress">
                                        <div class="bar"></div>
                                    </div>
                                </div>
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
                            <br />
                            <div class="ui tiny circular images">
                                <img class="ui circular image" src="<?= base_url('assets/image/Course/Javascript/javascript-01.png'); ?>" alt="Course" />
                                <img class="ui circular image" src="<?= base_url('assets/image/Course/Javascript/javascript-01.png'); ?>" alt="Course" />
                                <img class="ui circular image" src="<?= base_url('assets/image/Course/Javascript/javascript-01.png'); ?>" alt="Course" />
                                <img class="ui circular image" src="<?= base_url('assets/image/Course/Javascript/javascript-01.png'); ?>" alt="Course" />
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

                <!-- Path Progress -->
                <div class="ui container">
                    <div class="ui card">
                        <div class="content">
                            <div class="header">
                                <h3>Skills Path Progress</h3>
                            </div>
                        </div>
                        <div class="extra content">
                            <br/>
                            <div class="ui stackable middle aligned grid">
                                <div class="five wide column">
                                    <a href="<?= site_url('account'); ?>">
                                        <img class="ui circular image" src="<?= base_url('assets/image/Course/Javascript/javascript-01.png'); ?>" alt="Course" />
                                    </a>
                                </div>
                                <div class="eleven wide column">
                                    <a href="<?= site_url('account'); ?>">
                                        <h3>JavaScript</h3>
                                    </a>
                                    <p>1 / 8 Courses Completed</p>
                                    <div class="ui tiny blue progress">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                            </div>
                            <br />
                        </div>
                    </div>
                </div>
                <br/>

                <!-- Completed Course -->
                <div class="ui container">
                    <div class="ui card">
                        <div class="content">
                            <div class="header">
                                <h3>Completed Course</h3>
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="meta">Ruby Course</div>
                            <div class="header">Ruby Bits</div>
                        </div>
                        <div class="extra content">
                            <div class="meta">Ruby Course</div>
                            <div class="header">Ruby Bits</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
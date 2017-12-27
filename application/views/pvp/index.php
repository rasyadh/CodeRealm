<section class="hero-pvp">
    <div class="ui center aligned container" id="hero-content">
        <div class="ui container">
            <h1 class="ui inverted header">Player Vs Player</h1>
            <p class="ui inverted header">Test your skill with playing this PVP gameplay</p>
            <a class="ui large black button" href="<?= site_url('users/signup'); ?>">Fight Now</a>
        </div>
    </div>
</section>

<main class="learn-realm">
    <div class="ui container">
        <div class="ui secondary blue pointing menu">
            <a class="item" href="<?= site_url('skills'); ?>"><i class="block layout icon"></i>Skills Path</a>
            <a class="item" href="<?= site_url('quest'); ?>"><i class="list layout icon"></i>Quest Courses</a>
            <a class="active item" href="<?= site_url('pvp'); ?>"><i class="game icon"></i>PvP</a>
        </div>
        <br>
        <div class="ui four column grid container">
            <div class="four column row">
                <div class="right floated column" >
                    <div class="ui search">
                        <div class="ui icon input">
                            <input class="prompt" placeholder="Search Friends" type="text">
                            <i class="search icon"></i>
                        </div>
                        <div class="results"></div>
                    </div>
                </div>
            </div>
            <div class="four column row">
                <?php foreach($friends as $friend){

                ?>
                <div class="column">
                    <div class="ui card">
                        <div class="image">
                            <img src="<?= $friend->photo_urla; ?>">
                        </div>
                        <div class=" center aligned content">
                            <a class="header"><?= $friend->namea; ?></a>
                        </div>
                        <div class="extra  center aligned content">
                            <a href="<?= site_url('/pvp/challenge/'.$friend->ida); ?>"><button class="ui teal button">Challenge</button></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>        
    </div>
    <script>
        $('.ui.search')
            .search({
                type          : 'category',
                minCharacters : 3,
                apiSettings   : {
                onResponse: function(githubResponse) {
                    var
                    response = {
                        results : {}
                    }
                    ;
                    // translate GitHub API response to work with search
                    $.each(githubResponse.items, function(index, item) {
                    var
                        language   = item.language || 'Unknown',
                        maxResults = 8
                    ;
                    if(index >= maxResults) {
                        return false;
                    }
                    // create new language category
                    if(response.results[language] === undefined) {
                        response.results[language] = {
                        name    : language,
                        results : []
                        };
                    }
                    // add result to category
                    response.results[language].results.push({
                        title       : item.name,
                        description : item.description,
                        url         : item.html_url
                    });
                    });
                    return response;
                },
                url: '//api.github.com/search/repositories?q={query}'
                }
            })
            ;
    </script>
</main>
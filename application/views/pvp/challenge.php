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
        <div class="ui three column grid container">
            <div class="row">
                <div class="ui column">
                    <div id="" class="Asuna Asuna-1"></div>
                    <br/>
                    <div class="ui teal progress" id="hpgw">
                        <div class="bar"></div>
                        <div class="label"><span id="texthpgw" ></span></div>
                    </div>
                </div>
                <div class="ui column">
                    <div class="ui padded segment">
                        <div class="ui center aligned grid">
                            <div class="three column row">
                                <div class="column">
                                    <a class="ui red big circular label"><?= $statgw->attack ?></a>
                                </div>
                                <div class="column">
                                    <div class="ui big label">
                                        Base Attack
                                    </div>
                                </div>
                                <div class="column">
                                    <a class="ui blue big circular label"><?= $statmusuh->attack ?></a>
                                </div>
                            </div>
                            <div class="three column row">
                                <div class="column">
                                    <a class="ui red big circular label"><?= $statgw->def ?></a>
                                </div>
                                <div class="column">
                                    <div class="ui big label">
                                        Base Defend
                                    </div>
                                </div>
                                <div class="column">
                                    <a class="ui blue big circular label"><?= $statmusuh->def ?></a>
                                </div>
                            </div>
                            <div class="one row row">
                                <div class="column">
                                    <div class="ui center aligned container">
                                        <h1>VS</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="One column row">
                                <div class="ui big label" id="turntext"></div>
                            </div>
                            <div class="One column row">
                                <div class="ui label" id="attackturn">
                                    Attack <span id="attackval"></span>
                                </div>
                            </div>
                            <br/>
                        </div>
                    </div>
                </div>
                <div class="ui column">
                    <div id="" class="Yuuki Yuuki-1" style="-moz-transform: scaleX(-1);-o-transform: scaleX(-1);-webkit-transform: scaleX(-1);transform: scaleX(-1);filter: FlipH;-ms-filter: 'FlipH';"></div>
                    <br/>
                    <div class="ui teal progress" id="hpmusuh">
                        <div class="bar"></div>
                        <div class="label"><span id="texthpmusuh" ></span></div>
                    </div>
                </div>

            </div>
        </div>        
    </div>
    <div class="ui modal">
    <i class="close icon"></i>
    <div class="center aligned header">
        <span id="modaltitle"></span>
    </div>    
    <div class="actions">
        <div class="ui positive right labeled icon button" onclick="redirect()">
            Okay
        <i class="checkmark icon"></i>
        </div>
    </div>
    </div>
    <script>

        var ida = <?= $statgw->id ?>;
        var hpa = <?= $statgw->hp ?>;
        var currhpa = <?= $statgw->hp ?>;
        var atta = <?= $statgw->attack ?>;
        var defa = <?= $statgw->def ?>;

        var idb = <?= $statmusuh->id ?>;
        var hpb = <?= $statmusuh->hp ?>;
        var currhpb = <?= $statmusuh->hp ?>;
        var attb = <?= $statmusuh->attack ?>;
        var defb = <?= $statmusuh->def ?>;


        function changeHpGw(currhp){
            currhpa = currhp;
            $('#hpgw').progress({
                percent: (currhpa/hpa)*100
            });

            $('#texthpgw').html(currhpa);
        }

        function changeHpMusuh(currhp){
            currhpb = currhp;
            $('#hpmusuh').progress({
                percent: (currhpb/hpb)*100
            });

            $('#texthpmusuh').html(currhpb);
        }

        function play(turn){
            var hp = 0;
            if(turn == 0){
                hp = currhpb-((atta*getRandomInt(90,110)/100) - defb);

                if(hp < 0)hp = 0;

                $('#modaltitle').html('You Win');
                $('#attackturn').removeClass("red");
                $('#attackturn').addClass("blue");
                $('#attackval').html(currhpb - hp);
                changeHpMusuh(hp);
            }else{
                hp = currhpa-((attb*getRandomInt(90,110)/100) - defa);

                if(hp < 0)hp = 0;

                $('#modaltitle').html('You Lose');
                $('#attackturn').removeClass("blue");
                $('#attackturn').addClass("red");
                $('#attackval').html(currhpa - hp);
                changeHpGw(hp);
            }

            if(hp == 0){
                $('.ui.modal')
                    .modal('show')
                ;
                return false;
            }else{
                return true;
            }
        }

        function attackText(turn){
            if(turn == 0){
                $('#turntext').removeClass("blue");
                $('#turntext').addClass("red");
                $('#turntext').html("Your Turn");
            }else{  
                $('#turntext').removeClass("red");
                $('#turntext').addClass("blue");
                $('#turntext').html("Enemy Turn");
            }
        }
        
        function main(turn){            
            setTimeout(attackText(turn), 1000);

            setTimeout(function(){
                if(turn == 0 && play(turn)){
                    main(1);
                }else if(turn == 1 && play(turn)){
                    main(0);
                }
            }, 1000);
        }

        function getRandomInt(min, max) {
            min = Math.ceil(min);
            max = Math.floor(max);
            return Math.floor(Math.random() * (max - min)) + min; //The maximum is exclusive and the minimum is inclusive
        }

        function redirect(){
            window.location = "<?= site_url('pvp'); ?>";
        }

        changeHpGw(currhpa);
        changeHpMusuh(currhpb);

        main(getRandomInt(0, 2));

    </script>
</main>
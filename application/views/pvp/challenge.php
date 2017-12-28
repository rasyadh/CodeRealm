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
                    <div class="ui center aligned grid">
                        <div class="One column row">                            
                            <div class="column">
                                <p>Base Attack</p>
                            </div>
                        </div>
                        <div class="Two column row">                            
                            <div class="eight wide column">
                                <p><?= $statgw->attack ?></p>
                            </div>
                            <div class="eight wide column">
                                <p><?= $statmusuh->attack ?></p>
                            </div>
                        </div>
                        <div class="One column row">                            
                            <p>Base Defend</p>
                        </div>
                        <div class="Two column row">                            
                            <div class="eight wide column">
                                <p><?= $statgw->def ?></p>
                            </div>
                            <div class="eight wide column">
                                <p><?= $statmusuh->def ?></p>
                            </div>
                        </div>
                        <br/>
                        <div class="One column row">                            
                            <p><span id="turntext"></span></p>
                        </div>

                        <div class="One column row">                            
                            <p>Attack <span id="attackval"></span></p>
                        </div>
                        <br/>
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
                $('#attackval').html(currhpb - hp);
                changeHpMusuh(hp);
            }else{
                hp = currhpa-((attb*getRandomInt(90,110)/100) - defa);

                if(hp < 0)hp = 0;

                $('#modaltitle').html('You Lose');
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
                $('#turntext').html("Your Turn");
            }else{
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
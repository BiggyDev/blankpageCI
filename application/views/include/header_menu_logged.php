<div class="pusher">
    <div class="ui inverted vertical center aligned segment">
        <div class="ui container">
            <div class="ui large secondary inverted pointing menu">
                <a class="toc item">
                    <i class="sidebar icon"></i>
                </a>
                <?= anchor('candidats/index', 'Accueil', 'class = "item"'); ?>
                <?php if (current_url() == 'http://localhost/blankpageCI/candidats/profile') {
                    echo anchor('candidats/profile', 'Mon profil', 'class = "active item"');
                    echo anchor('candidats/monCV', 'Mon CV', 'class = "item"');
                } elseif (current_url() == 'http://localhost/blankpageCI/candidats/monCV') {
                    echo anchor('candidats/profile', 'Mon profil', 'class = "item"');
                    echo anchor('candidats/monCV', 'Mon CV', 'class = "active item"');
                } ?>


                <div class="right item">
                    <?php if(!isLogged()){
                        echo anchor('Accueil/login', 'Connexion', 'class = "ui inverted button"');
                        echo anchor('Accueil/inscription', 'Inscription', 'class = "ui inverted button"');
                    } else {
                        echo anchor('candidats/profile', 'Mon profil', 'class = "ui inverted button"');
                        echo anchor('candidats/disconnect', 'Déconnexion', 'class = "ui inverted button"');
                    } ?>
                </div>
            </div>
        </div>


    </div>
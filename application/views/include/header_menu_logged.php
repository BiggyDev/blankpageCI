<div class="pusher">
    <div class="ui inverted vertical center aligned segment">
        <div class="ui container">
            <div class="ui large secondary inverted pointing menu">
                <a class="toc item">
                    <i class="sidebar icon"></i>
                </a>
                <?= anchor('', 'Accueil', 'class = "item"'); ?>
                <a class="active item">Mes CV</a>
                <div class="right item">
                    <?php if(!isLogged()){
                        echo anchor('Accueil/login', 'Connexion', 'class = "ui inverted button"');
                        echo anchor('Accueil/inscription', 'Inscription', 'class = "ui inverted button"');
                    } else {
                        echo anchor('Candidats/profile', 'Mon CV', 'class = "ui inverted button"');
                        echo anchor('Candidats/disconnect', 'Déconnexion', 'class = "ui inverted button"');
                    } ?>
                </div>
            </div>
        </div>


    </div>
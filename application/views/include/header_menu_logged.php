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
                } elseif (current_url() == 'http://localhost/blankpageCI/candidats/modifEmail') {
                    echo anchor('candidats/profile', 'Mon profil', 'class = "active item"');
                    echo anchor('candidats/monCV', 'Mon CV', 'class = "item"');
                } elseif (current_url() == 'http://localhost/blankpageCI/candidats/modifPassword') {
                    echo anchor('candidats/profile', 'Mon profil', 'class = "active item"');
                    echo anchor('candidats/monCV', 'Mon CV', 'class = "item"');
                } elseif (current_url() == 'http://localhost/blankpageCI/candidats/addCV/1') {
                    echo anchor('candidats/profile', 'Mon profil', 'class = "item"');
                    echo anchor('candidats/monCV', 'Mon CV', 'class = "item"');
                } elseif (current_url() == 'http://localhost/blankpageCI/candidats/addCV/2') {
                    echo anchor('candidats/profile', 'Mon profil', 'class = "item"');
                    echo anchor('candidats/monCV', 'Mon CV', 'class = "item"');
                } elseif (current_url() == 'http://localhost/blankpageCI/candidats/addCV/3') {
                    echo anchor('candidats/profile', 'Mon profil', 'class = "item"');
                    echo anchor('candidats/monCV', 'Mon CV', 'class = "item"');
                } elseif (current_url() == 'http://localhost/blankpageCI/candidats/addCV/4') {
                    echo anchor('candidats/profile', 'Mon profil', 'class = "item"');
                    echo anchor('candidats/monCV', 'Mon CV', 'class = "item"');
                } elseif (current_url() == 'http://localhost/blankpageCI/candidats/addCV/5') {
                    echo anchor('candidats/profile', 'Mon profil', 'class = "item"');
                    echo anchor('candidats/monCV', 'Mon CV', 'class = "item"');
                } elseif (current_url() == 'http://localhost/blankpageCI/candidats/addCV/6') {
                    echo anchor('candidats/profile', 'Mon profil', 'class = "item"');
                    echo anchor('candidats/monCV', 'Mon CV', 'class = "item"');
                } elseif (current_url() == 'http://localhost/blankpageCI/candidats/addCV/7') {
                    echo anchor('candidats/profile', 'Mon profil', 'class = "item"');
                    echo anchor('candidats/monCV', 'Mon CV', 'class = "item"');
                } elseif (current_url() == 'http://localhost/blankpageCI/candidats/addCV/8') {
                    echo anchor('candidats/profile', 'Mon profil', 'class = "item"');
                    echo anchor('candidats/monCV', 'Mon CV', 'class = "item"');
                } elseif (current_url() == 'http://localhost/blankpageCI/candidats/addCV/9') {
                    echo anchor('candidats/profile', 'Mon profil', 'class = "item"');
                    echo anchor('candidats/monCV', 'Mon CV', 'class = "item"');
                } elseif (current_url() == 'http://localhost/blankpageCI/candidats/showCV') {
                    echo anchor('candidats/profile', 'Mon profil', 'class = "item"');
                    echo anchor('candidats/monCV', 'Mon CV', 'class = "item"');
                } elseif (current_url() == 'http://localhost/blankpageCI/candidats/CVconfirm') {
                    echo anchor('candidats/profile', 'Mon profil', 'class = "item"');
                    echo anchor('candidats/monCV', 'Mon CV', 'class = "item"');
                } else {
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
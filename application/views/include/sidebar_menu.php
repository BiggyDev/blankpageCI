<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
    <?php if (current_url() == 'http://localhost/blankpageCI/') {
        echo anchor('', 'Accueil', 'class = "active item"');
    } elseif (current_url() == 'http://localhost/blankpageCI/accueil/index') {
        echo anchor('', 'Accueil', 'class = "active item"');
    } elseif (current_url() == 'http://localhost/blankpageCI/candidats/index') {
        echo anchor('', 'Accueil', 'class = "active item"');
    } elseif (current_url() == 'http://localhost/blankpageCI/accueil') {
        echo anchor('', 'Accueil', 'class = "active item"');
    } elseif (current_url() == 'http://localhost/blankpageCI/candidats') {
        echo anchor('', 'Accueil', 'class = "active item"');
    } else {
        echo anchor('', 'Accueil', 'class = "item"');
    } ?>
    <?php if (current_url() == 'http://localhost/blankpageCI/candidats/index') { ?>
    <a class="item" href="#CV">CV</a>
    <a class="item" href="#visibilité">Visibilité</a>
    <a class="item" href="#métier">Métier</a>
    <a class="item" href="#accessibilité">Accessibilité</a>
    <?php } else {
        if (current_url() == 'http://localhost/blankpageCI/candidats/monCV') {
            echo anchor('candidats/monCV', 'Mon CV', 'class="active item"');
        } else {
            echo anchor('candidats/monCV', 'Mon CV', 'class="item"');
        }
    } ?>

    <?php if(!isLogged()){
        echo anchor('accueil/login', 'Connexion', 'class = "item"');
        echo anchor('accueil/inscription', 'Inscription', 'class = "item"');
    } else {
        if (current_url() == 'http://localhost/blankpageCI/candidats/profile') {
            echo anchor('candidats/profile', 'Mon profil', 'class = "active item"');
        } else {
            echo anchor('candidats/profile', 'Mon profil', 'class = "item"');
        }
        echo anchor('candidats/disconnect', 'Déconnexion', 'class = "item"');
    } ?>
</div>
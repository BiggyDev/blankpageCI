<!-- Following Menu -->
<div class="ui large top fixed hidden menu inverted">
    <div class="ui container">
        <?= anchor('', 'Accueil', 'class = "active item"'); ?>
        <a class="item" href="#CV">CV</a>
        <a class="item" href="#visibilité">Visibilité</a>
        <a class="item" href="#métier">Métier</a>
        <a class="item" href="#accessibilité">Accessibilité</a>
        <div class="right menu">
            <div class="item">
                <?php if(!isLogged()){
                    echo anchor('accueil/login', 'Connexion', 'class = "ui inverted button"');
                } else {
                    echo anchor('candidats/profile', 'Mon profil', 'class = "ui inverted button"');
                } ?>
            </div>
            <div class="item">
                <?php if(!isLogged()){
                    echo anchor('accueil/inscription', 'Inscription', 'class = "ui inverted button"');
                } else {
                    echo anchor('candidats/disconnect', 'Déconnexion', 'class = "ui inverted button"');
                } ?>
            </div>
        </div>
    </div>
</div>


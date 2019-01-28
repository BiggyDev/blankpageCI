<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
    <?= anchor('', 'Accueil', 'class = "active item"'); ?>
<a class="item" href="#CV">CV</a>
<a class="item" href="#visibilité">Visibilité</a>
<a class="item" href="#métier">Métier</a>
<a class="item" href="#accessibilité">Accessibilité</a>
    <?php if(!isLogged()){
        echo anchor('Accueil/login', 'Connexion', 'class = "item"');
        echo anchor('Accueil/inscription', 'Inscription', 'class = "item"');
    } else {
        echo anchor('Candidats/profile', 'Mon Profil', 'class = "item"');
        echo anchor('Candidats/disconnect', 'Déconnexion', 'class = "item"');
    } ?>
</div>
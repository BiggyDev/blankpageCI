<div class="pusher">
    <div class="ui inverted vertical masthead center aligned segment">
        <div class="ui container">
            <div class="ui large secondary inverted pointing menu">
                <a class="toc item">
                    <i class="sidebar icon"></i>
                </a>
                <?= anchor('', 'Accueil', 'class = "active item"'); ?>
                <a class="item" href="#CV">CV</a>
                <a class="item" href="#visibilité">Visibilité</a>
                <a class="item" href="#métier">Métier</a>
                <a class="item" href="#accessibilité">Accessibilité</a>
                <div class="right item">
                    <?php if(!isLogged()){
                        echo anchor('Accueil/login', 'Connexion', 'class = "ui inverted button"');
                        echo anchor('Accueil/inscription', 'Inscription', 'class = "ui inverted button"');
                    } else {
                        echo anchor('Candidats/index', 'Mon Profil', 'class = "ui inverted button"');
                        echo anchor('Candidats/disconnect', 'Déconnexion', 'class = "ui inverted button"');
                    } ?>
                </div>
            </div>
        </div>

        <h1 class="ui inverted header">
            Bienvenue sur Blankpage
        </h1>
        <h2 class="marginB">Blankpage est un site permettant la création d'un CV complet et ergonomique</h2>
        <?= anchor('Accueil/profil_candidat', 'Créer mon CV', 'class = "ui inverted teal massive button"'); ?>
    </div>
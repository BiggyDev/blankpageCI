    <div class="ui inverted vertical footer segment">
        <div class="ui container">
            <div class="ui stackable inverted divided equal height stackable grid">
                <div class="five wide column">
                    <h4 class="ui inverted header">À propos</h4>
                    <div class="ui inverted link list">
                        <a href="mailto:blankpage.nfs@gmail.com" class="item">Nous contacter</a>
                    </div>
                </div>
                <div class="five wide column">
                    <h4 class="ui inverted header">Services</h4>
                    <div class="ui inverted link list">
                        <?php if(!isLogged()){
                            echo anchor('Accueil/login', 'Connexion', 'class = "item"');
                            echo anchor('Accueil/inscription', 'Inscription', 'class = "item"');
                        } else {
                            echo anchor('Candidats/profile', 'Mon Profil', 'class = "item"');
                            echo anchor('Candidats/disconnect', 'Déconnexion', 'class = "item"');
                        } ?>
                        <a href="https://www.cnil.fr/fr/rgpd-de-quoi-parle-t-on" class="item" target="_blank">RGPD</a>
                    </div>
                </div>
                <div class="five wide column">
                    <h4 class="ui inverted header">Blank Page</h4>
                    <p>Blankpage est un site permettant la création d'un CV complet et ergonomique.</p>
                    <div class="ui inverted link list">
                    <?php if (!isLogged())
                        echo anchor('Accueil/login', 'Créer mon CV', 'class = "item"');
                    else
                        echo anchor('Candidats/addCV/1', 'Créer mon CV', 'class = "item"');
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

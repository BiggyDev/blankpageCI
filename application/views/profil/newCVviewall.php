<div class="ui attached segment">
    <div class="ui middle aligned center aligned margin50">
        <div class="column">
            <h1 class="title">Récapitulatif</h1>

            <div class="ui stacked segment">

                <h2 class="title">Infos Personnelles</h2>

                <div class="fields">
                    <h4>Date de naissance</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['birthday']; ?></span>
                    </div>

                    <h4>Sexe</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['gender']; ?></span>
                    </div>

                    <h4>Adresse</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['address']; ?></span>
                    </div>

                    <h4>Code Postal</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['postalcode']; ?></span>
                    </div>

                    <h4>Ville</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['city']; ?></span>
                    </div>

                    <h4>Portable</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['portable']; ?></span>
                    </div>

                    <h4>Permis</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['permis']; ?></span>
                    </div>

                    <h4>Véhicule personnel</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['vehicle']; ?></span>
                    </div>

                    <h4>A propos de moi</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['bio']; ?></span>
                    </div>

                    <h4>Site / Blog / Portfolio</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['portfolio']; ?></span>
                    </div>

                    <h4>Autres</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['more']; ?></span>
                    </div>
                </div>
            </div>
            <div class="ui stacked segment">

                <h2 class="title">Formations</h2>

                <?php foreach ($_SESSION['formations']['infos'] as $data_index) {; ?>

                <div class="fields">

                    <h4>Ecole</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['ecole']; ?></span>
                    </div>

                    <h4>Adresse</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['address']; ?></span>
                    </div>

                    <h4>Code Postal</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['postalcode']; ?></span>
                    </div>

                    <h4>Ville</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['city']; ?></span>
                    </div>

                    <h4>Diplôme</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['diplome']; ?></span>
                    </div>

                    <h4>Date de début</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['datedebut']; ?></span>
                    </div>

                    <h4>Durée</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['duree']; ?></span>
                    </div>

                    <h4>Mention / Commentaires</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['mention_commentaires']; ?></span>
                    </div>

                </div>
                <div class="ui divider"></div>

                <?php } ?>

            </div>
            <div class="ui stacked segment">

                <h2 class="title">Expériences professionnelles</h2>

                <?php foreach ($_SESSION['experiences']['infos'] as $data_index) {; ?>

                <div class="fields">

                        <h4>Entreprise</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['entreprise']; ?></span>
                        </div>

                        <h4>Adresse</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['address']; ?></span>
                        </div>

                        <h4>Code Postal</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['postalcode']; ?></span>
                        </div>

                        <h4>Ville</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['city']; ?></span>
                        </div>

                        <h4>Intitulé du poste</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['intitule']; ?></span>
                        </div>

                        <h4>Date de début</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['date_debut']; ?></span>
                        </div>

                        <h4>Durée</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['duree']; ?></span>
                        </div>

                        <h4>Description</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['description']; ?></span>
                        </div>

                </div>
                <div class="ui divider"></div>
                <?php } ?>
            </div>
            <div class="ui stacked segment">

                <h2 class="title">Compétences Techniques</h2>

                <div class="field">
                    <span class="font-weight-bold"><?= $_SESSION['competencestech']['name']; ?></span>
                </div>

            </div>
            <div class="ui stacked segment">

                <h2 class="title">Langues</h2>

                <div class="field">
                    <span class="font-weight-bold"><?= $_SESSION['langues']['infos'][0]['name']; ?> : </span>
                    <span class="font-weight-bold"><?= $_SESSION['langues']['infos'][0]['niveau']; ?></span>
                </div>

            </div>
            <div class="ui stacked segment">

                <h2 class="title">Certifications</h2>

                <?php foreach ($_SESSION['certifications']['infos'] as $data_index) {; ?>

                    <div class="fields">

                        <h4>Nom</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['name']; ?></span>
                        </div>

                        <h4>Description</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['description']; ?></span>
                        </div>

                        <h4>Date de début</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['datedebut']; ?></span>
                        </div>

                        <h4>Durée de validité</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['duree']; ?></span>
                        </div>

                    </div>
                    <div class="ui divider"></div>
                <?php } ?>
            </div>
            <div class="ui stacked segment">

                <h2 class="title">Savoir-être</h2>

                <div class="field">
                    <span class="font-weight-bold"><?= $_SESSION['savoiretre']['name']; ?></span>
                </div>

            </div>
            <div class="ui stacked segment">

                <h2 class="title">Réseaux Sociaux</h2>

                <div class="fields">
                    <h4>LinkedIn</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['reseaux']['linkedin']; ?></span>
                    </div>

                    <h4>Facebook</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['reseaux']['facebook']; ?></span>
                    </div>

                    <h4>Twitter</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['reseaux']['twitter']; ?></span>
                    </div>

                    <h4>Dribble</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['reseaux']['dribbble']; ?></span>
                    </div>

                    <h4>Instagram</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['reseaux']['instagram']; ?></span>
                    </div>

                    <h4>Twitch</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['reseaux']['twitch']; ?></span>
                    </div>
                </div>
            </div>
            <div class="ui stacked segment">

                <h2 class="title">Centres d'intérêt</h2>

                <?php foreach ($_SESSION['interets']['infos'] as $data_index) {; ?>

                    <div class="fields">

                        <h4>Nom</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['name']; ?></span>
                        </div>

                        <h4>Description</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['description']; ?></span>
                        </div>

                    </div>
                    <div class="ui divider"></div>
                <?php } ?>
            </div>
        </div>

        <?= anchor('candidats/CVconfirm', 'Valider ce CV', 'class="ui big teal button"'); ?>
    </div>
</div>



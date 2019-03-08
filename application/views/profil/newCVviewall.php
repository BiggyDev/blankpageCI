<div class="ui attached segment">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h1 class="title">Récapitulatif</h1>

            <?php if (isset($_SESSION['infos'])) { ?>
            <div class="ui stacked segment">

                <h2 class="title">Infos Personnelles</h2>

                <div class="fields">
                    <?php if (isset($_SESSION['infos']['age'])) { ?>
                    <h4>Age</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['age']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['infos']['gender'])) { ?>
                    <h4>Sexe</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['gender']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['infos']['address'])) { ?>
                    <h4>Adresse</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['address']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['infos']['postalcode'])) { ?>
                    <h4>Code Postal</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['postalcode']; ?></span>
                    </div>
                    <?php } ?>


                    <?php if (isset($_SESSION['infos']['city'])) { ?>
                    <h4>Ville</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['city']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['infos']['portable'])) { ?>
                    <h4>Portable</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['portable']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['infos']['permis'])) { ?>
                        <h4>Permis</h4>
                            <div class="field">
                                    <span class="text-info"><?= $_SESSION['infos']['permis']; ?></span><br/>
                            </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['infos']['vehicle'])) { ?>
                    <h4>Véhicule personnel</h4>
                    <div class="field">
                        <span class="text-info">
                            <?php if ($_SESSION['infos']['vehicle'] == 0)
                            {
                                echo 'Non';
                            } else {
                                echo 'Oui';
                            }
                            ?>
                        </span>
                    </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['infos']['bio'])) { ?>
                    <h4>A propos de moi</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['bio']; ?></span>
                    </div>
                    <?php } ?>


                    <?php if (isset($_SESSION['infos']['portfolio'])) { ?>
                    <h4>Site / Blog / Portfolio</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['portfolio']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['infos']['more'])) { ?>
                    <h4>Autres</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['infos']['more']; ?></span>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php }
            if (isset($_SESSION['formations']['infos'])) { ?>
            <div class="ui stacked segment">

                <h2 class="title">Formations</h2>

                <?php foreach ($_SESSION['formations']['infos'] as $data_index) {; ?>

                <div class="fields">

                    <?php if (isset($data_index['ecole'])) { ?>
                    <h4>Ecole</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['ecole']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($data_index['address'])) { ?>
                    <h4>Adresse</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['address']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($data_index['postalcode'])) { ?>
                    <h4>Code Postal</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['postalcode']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($data_index['city'])) { ?>
                    <h4>Ville</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['city']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($data_index['diplome'])) { ?>
                    <h4>Diplôme</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['diplome']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($data_index['datedebut'])) { ?>
                    <h4>Date de début</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['datedebut']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($data_index['duree'])) { ?>
                    <h4>Durée</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['duree']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($data_index['mention_commentaires'])) { ?>
                    <h4>Mention / Commentaires</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['mention_commentaires']; ?></span>
                    </div>
                    <?php } ?>

                </div>
                <div class="ui divider"></div>

                <?php } ?>

            </div>
            <?php } ?>
            <?php  if (isset($_SESSION['experiences'])) { ?>
            <div class="ui stacked segment">

                <h2 class="title">Expériences professionnelles</h2>

                <?php foreach ($_SESSION['experiences']['infos'] as $data_index) {; ?>

                <div class="fields">

                    <?php if (isset($data_index['entreprise'])) { ?>
                    <h4>Entreprise</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['entreprise']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($data_index['address'])) { ?>
                    <h4>Adresse</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['address']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($data_index['postalcode'])) { ?>
                    <h4>Code Postal</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['postalcode']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($data_index['city'])) { ?>
                    <h4>Ville</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['city']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($data_index['intitule'])) { ?>
                    <h4>Intitulé du poste</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['intitule']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($data_index['date_debut'])) { ?>
                    <h4>Date de début</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['date_debut']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($data_index['duree'])) { ?>
                    <h4>Durée</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['duree']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($data_index['description'])) { ?>
                    <h4>Description</h4>
                    <div class="field">
                        <span class="text-info"><?= $data_index['description']; ?></span>
                    </div>
                    <?php } ?>

                </div>
                <div class="ui divider"></div>
                <?php } ?>
            </div>
            <?php } ?>
            <?php  if (isset($_SESSION['competencestech']['name'])) { ?>
            <div class="ui stacked segment">

                <h2 class="title">Compétences Techniques</h2>

                <?php foreach ($_SESSION['competencestech']['name'] as $data_index) { ?>
                <div class="field">
                    <span class="font-weight-bold"><?= $data_index; ?></span>
                </div>
                <?php } ?>

            </div>
            <?php } ?>
            <?php if (isset($_SESSION['langues'])) { ?>
            <div class="ui stacked segment">

                <h2 class="title">Langues</h2>

                <div class="field">
                    <span class="font-weight-bold"><?= $_SESSION['langues']['name']; ?> : </span>
                    <span class="font-weight-bold"><?= $_SESSION['langues']['niveau']; ?></span>
                </div>

            </div>
            <?php } ?>
            <?php if (!empty($_SESSION['certifications'])) { ?>
            <div class="ui stacked segment">

                <h2 class="title">Certifications</h2>

                <?php foreach ($_SESSION['certifications']['infos'] as $data_index) { ?>

                    <div class="fields">

                        <?php if (isset($data_index['name'])) { ?>
                        <h4>Nom</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['name']; ?></span>
                        </div>
                        <?php } ?>

                        <?php if (isset($data_index['description'])) { ?>
                        <h4>Description</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['description']; ?></span>
                        </div>
                        <?php } ?>

                        <?php if (isset($data_index['datedebut'])) { ?>
                        <h4>Date de début</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['datedebut']; ?></span>
                        </div>
                        <?php } ?>

                        <?php if (isset($data_index['duree'])) { ?>
                        <h4>Durée de validité</h4>
                        <div class="field">
                            <span class="text-info"><?= $data_index['duree']; ?></span>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="ui divider"></div>
                <?php } ?>
            </div>
            <?php }
            if (isset($_SESSION['savoiretre']['name'])) { ?>
            <div class="ui stacked segment">

                <h2 class="title">Savoir-être</h2>

                <div class="field">
                    <span class="font-weight-bold"><?= $_SESSION['savoiretre']['name']; ?></span>
                </div>

            </div>
            <?php }
            if (isset($_SESSION['reseaux'])) { ?>
            <div class="ui stacked segment">

                <h2 class="title">Réseaux Sociaux</h2>

                <div class="fields">

                    <?php if (isset($_SESSION['reseaux']['linkedin'])) { ?>
                    <h4>LinkedIn</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['reseaux']['linkedin']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['reseaux']['facebook'])) { ?>
                    <h4>Facebook</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['reseaux']['facebook']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['reseaux']['twitter'])) { ?>
                    <h4>Twitter</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['reseaux']['twitter']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['reseaux']['dribbble'])) { ?>
                    <h4>Dribble</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['reseaux']['dribbble']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['reseaux']['instagram'])) { ?>
                    <h4>Instagram</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['reseaux']['instagram']; ?></span>
                    </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['reseaux']['twitch'])) { ?>
                    <h4>Twitch</h4>
                    <div class="field">
                        <span class="text-info"><?= $_SESSION['reseaux']['twitch']; ?></span>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php }
            if (isset($_SESSION['interets'])) { ?>
            <div class="ui stacked segment">

                <h2 class="title">Centres d'intérêt</h2>

                <?php foreach ($_SESSION['interets']['infos'] as $data_index) { ?>

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
            <?php } ?>
            <?= form_open('', 'class="ui form"'); ?>
            <div class="inline field">
                <div class="ui checkbox">
                    <?= form_checkbox('terms'); ?>
                    <?= form_label('J\'accepte les Termes et Conditions'); ?>
                </div>
            </div>
            <div class="ui error message"></div>

            <?= form_submit('submitted', 'Valider ce CV', 'class="ui big teal button"'); ?>
        </div>



        <?php if (isset($_POST['submitted'])) {
            redirect('candidats/CVconfirm');
        } ?>

    </div>
</div>

<script>

    $(document)
        .ready(function () {

            $('.ui.checkbox')
                .checkbox()
            ;

            $('.ui.form')
                .form({
                    fields: {
                        terms: {
                            identifier: 'terms',
                            rules: [
                                {
                                    type   : 'checked',
                                    prompt : 'Vous devez accepter les termes et conditions'
                                }
                            ]
                        }
                    }
                })
            ;

        })

</script>



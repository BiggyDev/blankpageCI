<div class="ui ordered attached mini steps width100">
    <div class="completed step">
        <div class="content">
            <div class="title">Informations </br>
                personnelles</div>
        </div>
    </div>
    <div class="completed step">
        <div class="content">
            <div class="title">Formations</div>
        </div>
    </div>
    <div class="active step">
        <div class="content">
            <div class="title">Expériences</div>
        </div>
    </div>
    <div class="disabled step">
        <div class="content">
            <div class="title">Compétences </br>
                techniques</div>
        </div>
    </div>
    <div class="disabled step">
        <div class="content">
            <div class="title">Langues</div>
        </div>
    </div>
    <div class="disabled step">
        <div class="content">
            <div class="title">Certifications</div>
        </div>
    </div>
    <div class="disabled step">
        <div class="content">
            <div class="title">Savoir-être</div>
        </div>
    </div>
    <div class="disabled step">
        <div class="content">
            <div class="title">Réseaux </br>
                sociaux</div>
        </div>
    </div>
    <div class="disabled step">
        <div class="content">
            <div class="title">Centres </br>
                d'intêret</div>
        </div>
    </div>
</div>


<div class="ui attached segment">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <div class="column">

            <h1 class="title">Exp&eacute;riences</h1>

            <?= form_open('', 'class = "ui huge form", id="addStep"'); ?>

            <div class="source-item ui stacked segment" id="wrapper" data-index="0">

                <div class="field">
                    <label>Entreprise</label>
                    <div class="ui left input">
                        <?= form_input('infos[0][' . 'entreprise' . ']', set_value('entreprise'), 'placeholder ="ex : NFactory", data-name="entreprise"'); ?>
                    </div>
                </div>

                <div class="field">
                    <label>Adresse</label>
                    <div class="ui left input">
                        <?= form_input('infos[0][' . 'address' . ']', set_value('address'), 'placeholder ="N° + Rue", data-name="address"'); ?>
                    </div>
                </div>

                <div class="field">
                    <div class="ui left input">
                        <?= form_input('infos[0][' . 'postalcode' . ']', set_value('postalcode'), 'placeholder ="Code Postal", data-name="postalcode"'); ?>
                    </div>
                </div>

                <div class="field">
                    <div class="ui left input">
                        <?= form_input('infos[0][' . 'city' . ']', set_value('city'), 'placeholder ="Ville", data-name="city"'); ?>
                    </div>
                </div>

                <div class="field">
                    <label>Intitul&eacute; du poste</label>
                    <div class="ui left input">
                        <?= form_input('infos[0][' . 'intitule' . ']', set_value('intitule'), 'placeholder ="D&eacute;veloppeur, technicien, chef de projet...", data-name="intitule"'); ?>
                    </div>
                </div>

                <div class="field">
                    <label>Date de d&eacute;but</label>
                    <?= form_input($date_debut); ?>
                </div>


                <div class="field">
                    <label>Dur&eacute;e</label>
                    <div class="ui left input">
                        <?= form_input('infos[0][' . 'duree' . ']', set_value('duree'), 'placeholder="En mois et ann&eacute;e (1 an et 6 mois)", data-name="duree"'); ?>
                    </div>
                </div>

                <div class="field">
                    <label>Description du poste</label>
                    <div class="ui left input">
                        <?= form_textarea('infos[0][' . 'description' . ']', set_value('description'), 'placeholder="D&eacute;crivez bri&egrave;vement votre exp&eacute;rience &agrave; ce poste", data-name="description"'); ?>
                    </div>
                </div>

                <div class="ui error message"></div>

            </div>
            </div>

            <?= form_submit('notsubmitted', 'Etape précédente', 'class="ui teal big button"'); ?>

            <button class="ui teal big button add-one" type="button">Ajouter une expérience</button>

            <?= form_submit('submitted', 'Etape suivante', 'class="ui teal big button"'); ?>



            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>

    $(document)
        .ready(function() {

            $('.ui.form')
                .form({
                    fields: {
                        entrerpise: {
                            identifier: 'infos[0][entrerpise]',
                            rules: [
                                {
                                    type   : 'maxLength[100]',
                                    prompt : 'Le nom de l\'entreprise est trop long (100 caractères maximum).'
                                }
                            ]
                        },
                        address: {
                            identifier: 'infos[0][address]',
                            rules: [
                                {
                                    type   : 'maxLength[70]',
                                    prompt : 'Votre adresse est trop longue (70 caractères maximum).'
                                }
                            ]
                        },
                        postalcode: {
                            identifier: 'infos[0][postalcode]',
                            rules: [
                                {
                                    type   : 'maxLength[5]',
                                    prompt : 'Veuillez entrer 5 caractères maximum.'
                                },
                                {
                                    type   : 'number',
                                    prompt : 'Veuillez entrer un nombre.'
                                }
                            ]
                        },
                        city: {
                            identifier: 'infos[0][city]',
                            rules: [
                                {
                                    type   : 'maxLength[50]',
                                    prompt : 'Le nom de votre ville est trop long (50 caractères maximum).'
                                }
                            ]
                        },
                        intitule: {
                            identifier: 'infos[0][intitule]',
                            rules: [
                                {
                                    type   : 'maxLength[50]',
                                    prompt : 'Le nom de votre diplôme est trop long (50 caractères maximum).'
                                }
                            ]
                        },
                        duree: {
                            identifier: 'infos[0][duree]',
                            rules: [
                                {
                                    type   : 'maxLength[11]',
                                    prompt : 'Le nombre est trop long (11 caractères maximum).'
                                },
                                {
                                    type   : 'number',
                                    prompt : 'Vous devez renseigner un nombre.'
                                }
                            ]
                        },
                        description: {
                            identifier: 'infos[0][identifier]',
                            rules: [
                                {
                                    type   : 'maxLength[500]',
                                    prompt : 'Votre texte est trop long (255 caractères maximum).'
                                }
                            ]
                        }
                    }
                })
            ;
        })
    ;

</script>
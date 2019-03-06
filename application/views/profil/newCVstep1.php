<div class="ui three top attached steps">
    <div class="active step">
        <i class="truck icon"></i>
        <div class="content">
            <div class="title">Infos personnelles</div>
            <div class="description">Dîtes nous qui vous êtes</div>
        </div>
    </div>
    <div class="disabled step">
        <i class="payment icon"></i>
        <div class="content">
            <div class="title">Formations</div>
            <div class="description">Quels sont vos diplômes ?</div>
        </div>
    </div>
    <div class="disabled step">
        <i class="info icon"></i>
        <div class="content">
            <div class="title">Exp&eacute;riences</div>
            <div class="description">Vos exp&eacute;riences professionnelles</div>
        </div>
    </div>
</div>
<div class="ui attached segment">
    <div class="ui middle aligned center aligned margin50">
        <div class="column">
        <h1 class="title">Infos Personnelles</h1>

        <?= form_open('', 'class = "ui huge form"'); ?>

        <div class="ui stacked segment">

            <div class="field">
                <label>Date de naissance</label>
                <div class="ui left input">
                    <?= form_input($birthday); ?>
                </div>
            </div>

            <div class="field">
                <label>Sexe</label>
                <?= form_dropdown('gender', $gender, '', 'class="ui selection dropdown" id="gender"'); ?>
            </div>

            <div class="field">
                <label>Adresse</label>
                <div class="ui left input">
                    <?= form_input('address', set_value('address'), 'placeholder ="N° + Rue"'); ?>
                </div>
            </div>

            <div class="field">
                <div class="ui left input">
                    <?= form_input('postalcode', set_value('postalcode'), 'placeholder ="Code Postal"'); ?>
                </div>
            </div>

            <div class="field">
                <div class="ui left input">
                    <?= form_input('city', set_value('city'), 'placeholder ="Ville"'); ?>
                </div>
            </div>

            <div class="field">
                <label>Téléphone</label>
                <div class="ui left input">
                    <?= form_input('portable', set_value('portable'), 'placeholder ="Portable"'); ?>
                </div>
            </div>

            <div class="field">
                <label>Permis</label>
                <?= form_multiselect('permis', $permis, '', 'class="ui fluid normal dropdown"'); ?>
            </div>

            <div class="inline fields">
                <label for="vehicle">Véhicule personnel</label>
                <div class="field">
                    <div class="ui slider checkbox">
                        <?= form_checkbox('vehicle', '1', FALSE, 'class="hidden"'); ?>
                    </div>
                </div>
            </div>

            <div class="field">
                <label>A propos de moi</label>
                <div class="ui left input">
                    <?= form_textarea('bio', set_value('bio'), 'placeholder="Ecrivez un résumé sur vous, vos aspirations, ect..."'); ?>
                </div>
            </div>

            <div class="field">
                <label>Site / Blog / Portfolio</label>
                <div class="ui labeled input">
                    <div class="ui label">
                        https://
                    </div>
                    <?= form_input('portfolio', set_value('portfolio'), 'placeholder="monsite.com"'); ?>
                </div>
            </div>

            <div class="field">
                <label>Autres</label>
                <div class="ui left input">
                    <?= form_textarea('more', set_value('more'), 'placeholder="Autres liens, informations à propos de vous,..."'); ?>
                </div>
            </div>

            <div class="ui error message"></div>

        </div>

        <?= form_submit('submitted', 'Etape suivante', 'class="ui teal big button"'); ?>



        <?= form_close(); ?>
        </div>
    </div>
</div>


<script>

    $(document)
        .ready(function() {

            $('.ui.normal.dropdown')
                .dropdown({
                    maxSelections: 6
                })

            $('#gender')
                .dropdown()
            ;

            $('.ui.slider.checkbox')
                .checkbox()
            ;

            $('.ui.form')
                .form({
                    fields: {
                        address: {
                            identifier: 'address',
                            rules: [
                                {
                                    type   : 'maxLength[70]',
                                    prompt : 'Votre adresse est trop longue (70 caractères maximum).'
                                }
                            ]
                        },
                        postalcode: {
                            identifier: 'postalcode',
                            rules: [
                                {
                                    type   : 'maxLength[5]',
                                    prompt : 'Veuillez un code postal à 5 chiffres maximum.'
                                },
                                {
                                    type   : 'number',
                                    prompt : 'Veuillez entrer un code postal sous forme de nombre.'
                                }
                            ]
                        },
                        city: {
                            identifier: 'city',
                            rules: [
                                {
                                    type   : 'maxLength[70]',
                                    prompt : 'Le nom de votre ville est trop long (70 caractères maximum).'
                                }
                            ]
                        },
                        portable: {
                            identifier: 'portable',
                            rules: [
                                {
                                    type   : 'maxLength[10]',
                                    prompt : 'Votre numéro de téléphone doit contenir 10 caractères.'
                                },
                                {
                                    type   : 'number',
                                    prompt : 'Votre numéro de téléphone doit être composé de chiffres.'
                                }
                            ]
                        },
                        bio: {
                            identifier: 'bio',
                            rules: [
                                {
                                    type   : 'maxLength[255]',
                                    prompt : 'Votre texte est trop long (255 caractères maximum).'
                                }
                            ]
                        },
                        portfolio: {
                            identifier: 'portfolio',
                            rules: [
                                {
                                    type   : 'maxLength[255]',
                                    prompt : 'Votre lien est trop long (255 caractères maximum).'
                                }
                            ]
                        },
                        more: {
                            identifier: 'more',
                            rules: [
                                {
                                    type   : 'maxLength[255]',
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
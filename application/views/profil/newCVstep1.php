<?php

$gender = array(
            ''          => 'Sexe',
            'female'    => 'Femme',
            'male'      => 'Homme'
        );

$permis = array(
            ''      => 'Choisissez vos permis',
            'am'    => 'AM',
            'a1'    => 'A1',
            'a2'    => 'A2',
            'a'     => 'A',
            'b1'    => 'B1',
            'b'     => 'B',
            'c1'    => 'C1',
            'c'     => 'C',
            'd1'    => 'D1',
            'd'     => 'D',
            'be'    => 'BE',
            'c1e'   => 'C1E',
            'ce'    => 'CE',
            'd1e'   => 'D1E',
            'de'    => 'DE'
);

?>

<div class="ui vertical steps">
    <div class="step"></i>
        <div class="content">
            <div class="title">Shipping</div>
            <div class="description">Choose your shipping options</div>
        </div>
    </div>
    <div class="step">
        <i class="credit card icon"></i>
        <div class="content">
            <div class="title">Billing</div>
            <div class="description">Enter billing information</div>
        </div>
    </div>
    <div class="step">
        <i class="info icon"></i>
        <div class="content">
            <div class="title">Confirm Order</div>
            <div class="description">Verify order details</div>
        </div>
    </div>
</div>

<div class="ui middle aligned center aligned">
    <div class="column">
        <h1 class="title">Infos Personnelles</h1>

        <?= form_open('', 'class = "ui huge form"'); ?>

        <div class="ui stacked segment">

            <div class="field">
                <label>Date de naissance</label>
                <div class="ui left input">
                    <?= form_input('birthday', set_value('birthday'), 'placeholder ="Date de naissance"'); ?>
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
                        <div class="ui radio checkbox">
                            <?= form_radio('vehicle', 'yes', FALSE, 'class="hidden"'); ?>
                            <?= form_label('Oui'); ?>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <?= form_radio('vehicle', 'no', FALSE, 'class="hidden"'); ?>
                            <?= form_label('Non'); ?>
                        </div>
                    </div>
            </div>

            <div class="field">
                <label>Photo</label>
                <div class="ui left input">
                <?= form_upload('picture'); ?>
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

            <?= form_submit('submitted', 'Etape suivante', 'class="ui teal big button"'); ?>

        </div>

        <?php if (isset($_POST['submitted'])) {
            echo '<div class="ui error message" style="display:block;">' . validation_errors() . '</div>';
        } else {
            echo '<div class="ui error message">' . validation_errors() . '</div>';
        }; ?>

        <?= form_close(); ?>
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

            $('.ui.radio.checkbox')
                .checkbox()
            ;
        })
    ;
</script>



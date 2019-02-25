<div class="ui three top attached steps">
    <div class="step">
        <i class="truck icon"></i>
        <div class="content">
            <div class="title">Infos personnelles</div>
            <div class="description">Dîtes nous qui vous êtes</div>
        </div>
    </div>
    <div class="active step">
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
            <h1 class="title">Formations</h1>

            <?= form_open('', 'class = "ui huge form", name="formulaireDynamique"'); ?>

            <div class="source-item ui stacked segment">

                <div class="field">
                    <label>Ecole</label>
                    <div class="ui left input">
                        <?= form_input('ecole', set_value('ecole'), 'placeholder ="ex : NFactory School"'); ?>
                    </div>
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
                    <label>Diplôme</label>
                    <div class="ui left input">
                        <?= form_input('diplome', set_value('diplome'), 'placeholder ="Baccalaur&eacute;at, Licence..."'); ?>
                    </div>
                </div>

                <div class="field">
                    <label>Date de d&eacute;but</label>
                    <?= form_input($datedebut); ?>
                </div>

                <div class="field">
                    <label>Dur&eacute;e</label>
                    <div class="ui left input">
                        <?= form_input('duree', set_value('duree'), 'placeholder="En mois et ann&eacute;e (1 an et 6 mois)"'); ?>
                    </div>
                </div>

                <div class="field">
                    <label>Mention / Commentaires</label>
                    <div class="ui left input">
                        <?= form_textarea('mention_commentaires', set_value('mention_commentaires'), 'placeholder="Indiquez la mention obtenue, les matières étudi&eacute;es, ect..."'); ?>
                    </div>
                </div>

            </div>

            <button class="ui teal big button" type="button" onclick="ajout(this);">Ajouter une formation</button>


            <?= form_submit('submitted', 'Etape suivante', 'class="ui teal big button"'); ?>

            <?php if (isset($_POST['submitted'])) {
                echo '<div class="ui error message" style="display:block;">' . validation_errors() . '</div>';
            } else {
                echo '<div class="ui error message">' . validation_errors() . '</div>';
            }; ?>

            <?= form_close(); ?>
        </div>
    </div>
</div>

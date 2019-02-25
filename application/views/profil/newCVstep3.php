<div class="ui three top attached steps">
    <div class="step">
        <i class="truck icon"></i>
        <div class="content">
            <div class="title">Informations</div>
            <div class="description">Parlez nous de vous</div>
        </div>
    </div>
    <div class="step">
        <i class="payment icon"></i>
        <div class="content">
            <div class="title">Formations</div>
            <div class="description">Entrez vos diff&eacute;rents dipl&ocirc;mes</div>
        </div>
    </div>
    <div class="active step">
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

        <h1 class="title">Exp&eacute;riences</h1>

        <?= form_open('', 'class = "ui huge form"'); ?>

        <div class="source-item ui stacked segment">

            <div class="field">
                <label>Entreprise</label>
                <div class="ui left input">
                    <?= form_input('entreprise', set_value('entreprise'), 'placeholder ="ex : NFactory"'); ?>
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
                <label>Intitul&eacute; du poste</label>
                <div class="ui left input">
                    <?= form_input('intitule', set_value('intitule'), 'placeholder ="D&eacute;veloppeur, technicien, chef de projet..."'); ?>
                </div>
            </div>

            <div class="field">
                <label>Date de d&eacute;but</label>
                <?= form_input($date_debut); ?>
            </div>


            <div class="field">
                <label>Dur&eacute;e</label>
                <div class="ui left input">
                    <?= form_input('duree', set_value('duree'), 'placeholder="En mois et ann&eacute;e (1 an et 6 mois)"'); ?>
                </div>
            </div>

            <div class="field">
                <label>Description du poste</label>
                <div class="ui left input">
                    <?= form_textarea('description', set_value('description'), 'placeholder="D&eacute;crivez bri&egrave;vement votre exp&eacute;rience &agrave; ce poste"'); ?>
                </div>
            </div>

        </div>

        <button class="ui teal big button" type="button" onclick="ajout(this);">Ajouter une expérience</button>

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
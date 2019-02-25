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
        <h1 class="title">Centres d'intêrets</h1>

        <?= form_open('', 'class = "ui huge form"'); ?>

        <div class="source-item ui stacked segment">

            <div class="field">
                <label>Activit&eacute;</label>
                <div class="ui left input">
                    <?= form_input('name', set_value('name'), 'placeholder="ex : Violon, Football, Pêche,..."'); ?>
                </div>
            </div>

            <div class="field">
                <label>Description</label>
                <div class="ui left input">
                    <?= form_textarea('description', set_value('description'), 'placeholder="Quelles compétences avez-vous pu développer pendant la pratique de cette activité..."'); ?>
                </div>
            </div>

        </div>

        <button class="ui teal big button" type="button" onclick="ajout(this);">Ajouter un centre d'intérêt</button>

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
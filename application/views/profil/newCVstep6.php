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
    <div class="column margin50">
        <h1 class="title">Certifications</h1>

        <?= form_open('', 'class = "ui huge form"'); ?>

        <div class="ui stacked segment">

            <div class="field">
                <label>Nom</label>
                <div class="ui left input">
                    <?= form_input('name', set_value('name'), 'placeholder="ex : TOEIC"'); ?>
                </div>
            </div>

            <div class="field">
                <label>Description</label>
                <div class="ui left input">
                    <?= form_textarea('description', set_value('description'), 'placeholder="Donnez des pr&eacute;cisions sur la certification"'); ?>
                </div>
            </div>

            <div class="field">
                <label>Date de d&eacute;but</label>
                <?= form_input($datedebut); ?>
            </div>

            <div class="field">
                <label>Dur&eacute;e de validité</label>
                <div class="ui left input">
                    <?= form_input('duree', set_value('duree'), 'placeholder="En ann&eacute;es"'); ?>
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
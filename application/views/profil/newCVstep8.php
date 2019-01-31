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
        <h1 class="title">R&eacute;seaux Sociaux</h1>

        <?= form_open('', 'class = "ui huge form"'); ?>

        <div class="ui stacked segment">
            <div class="field">
                <?= form_hidden('name', set_value('linkedin')); ?>
                <div class="ui left icon input">
                    <?= form_input('lien', set_value('lien'), 'placeholder="Linkedin"'); ?>
                    <i class="linkedin blue icon"></i>
                </div>
            </div>

            <div class="field">
                <?= form_hidden('name', set_value('facebook')); ?>
                <div class="ui left icon input">
                    <?= form_input('lien', set_value('lien'), 'placeholder="Facebook"'); ?>
                    <i class="facebook blue icon"></i>
                </div>
            </div>

            <div class="field">
                <?= form_hidden('name', set_value('twitter')); ?>
                <div class="ui left icon input">
                    <?= form_input('lien', set_value('lien'), 'placeholder="Twitter"'); ?>
                    <i class="twitter blue icon"></i>
                </div>
            </div>

            <div class="field">
                <?= form_hidden('name', set_value('dribbble')); ?>
                <div class="ui left icon input">
                    <?= form_input('lien', set_value('lien'), 'placeholder="Dribbble"'); ?>
                    <i class="dribbble orange icon"></i>
                </div>
            </div>

            <div class="field">
                <?= form_hidden('name', set_value('instagram')); ?>
                <div class="ui left icon input">
                    <?= form_input('lien', set_value('lien'), 'placeholder="Instagram"'); ?>
                    <i class="instagram pink icon"></i>
                </div>
            </div>

            <div class="field">
                <?= form_hidden('name', set_value('twitch')); ?>
                <div class="ui left icon input">
                    <?= form_input('lien', set_value('lien'), 'placeholder="Twitch"'); ?>
                    <i class="twitch purple icon"></i>
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
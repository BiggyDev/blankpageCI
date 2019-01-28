<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui teal image header">
            <div class="content">
                Inscrivez-vous pour accéder aux fonctionnalités du site
            </div>
        </h2>

        <?= form_open('', 'class = "ui large form"'); ?>

        <div class="ui stacked segment">

            <div class="field">
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <?= form_input('name', set_value('name'), 'placeholder ="Nom & Pr&eacute;nom"'); ?>
                </div>
            </div>

            <div class="field">
                <div class="ui left icon input">
                    <i class="mail icon"></i>
                    <?= form_input('email', set_value('email'), 'placeholder ="Adresse E-Mail"'); ?>
                </div>
            </div>

            <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <?= form_password('password', set_value('password'), 'placeholder ="Mot de Passe"'); ?>
                </div>
            </div>

            <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <?= form_password('confirmpassword', set_value('confirmpassword'), 'placeholder ="Confirmation Mot de Passe"'); ?>
                </div>
            </div>

            <?= form_submit('submitted', 'S\'inscrire', 'class="ui teal big button"'); ?>

        </div>

        <?php if (isset($_POST['submitted'])) {
                    echo '<div class="ui error message" style="display:block;">' . validation_errors() . '</div>';
              } else {
                    echo '<div class="ui error message">' . validation_errors() . '</div>';
              }; ?>

        <?= form_close(); ?>

        <div class="ui message">
            <div class="ui info message">
                Déjà inscrit(e)?
            </div>
            <?= anchor('Accueil/login', 'Se Connecter', 'class="ui button"'); ?>
        </div>


    </div>
</div>

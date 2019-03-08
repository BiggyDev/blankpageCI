<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui teal image header">
            <div class="content">
                Mot de passe oublié
            </div>
        </h2>

        <?= form_open('', 'class = "ui large form"'); ?>

        <div class="ui stacked segment">

            <div class="field">
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <?= form_input('email', set_value('email'), 'placeholder="Votre adresse E-mail"'); ?>
                </div>
            </div>

            <?= form_submit('submitted', 'Valider', 'class="ui teal big button"'); ?>
        </div>

        <?php if (isset($_POST['submitted'])) {
            echo '<div class="ui error message" style="display:block;">' . validation_errors() . $this->session->flashdata('fail_email') . '</div>';
        } else {
            echo '<div class="ui error message">' . validation_errors() . '</div>';
        }; ?>

        <?= form_close(); ?>

        <div class="ui message">
            <div class="ui info message">
                Vous n'êtes pas inscrit(e)?
            </div>
            <?= anchor('Accueil/inscription', 'Inscription', 'class="ui button"'); ?>
            <?= anchor('Accueil/index', 'Accueil', 'class="ui button"'); ?>
        </div>

    </div>
</div>

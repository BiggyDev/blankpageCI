<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui teal image header">
            <div class="content">
                Connectez-vous pour accéder à votre compte
            </div>
        </h2>

        <?= form_open('', 'class = "ui large form"'); ?>

            <div class="ui stacked segment">

                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <?= form_input('email', set_value('email'), 'placeholder="Adresse E-mail"'); ?>
                    </div>
                </div>

                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <?= form_password('password', set_value('password'), 'placeholder="Mot de Passe"'); ?>
                    </div>

                </div>

                <?= form_submit('submitted', 'Se connecter', 'class="ui teal big button""'); ?>

                <?= anchor('accueil/forgotPassword', 'Mot de passe oublié ?', 'class="ui button"'); ?>
            </div>

            <?php if (isset($_POST['submitted'])) {
                echo '<div class="ui error message" style="display:block;">' . validation_errors() . $this->session->flashdata('fail_password') . $this->session->flashdata('fail_email') . '</div>';
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
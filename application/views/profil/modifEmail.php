<div class="ui attached segment">
    <div class="ui middle aligned center aligned margin50">
        <div class="column">
            <h1 class="title">Modifier votre adresse e-mail</h1>

            <?= form_open('', 'class = "ui huge form"'); ?>

            <div class="ui stacked segment">

                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <?= form_input('newmail', set_value('newmail'), 'placeholder="Nouvelle adresse e-email"'); ?>
                    </div>
                </div>

                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                    <?= form_password('password', set_value('password'), 'placeholder="Votre mot de passe"'); ?>
                    </div>
                </div>

                <?php if (isset($_POST['submitted'])) {
                    echo '<div class="ui error message" style="display:block;">' . validation_errors() . $this->session->flashdata('fail_password') . '</div>';
                } else {
                    echo '<div class="ui error message">' . validation_errors() . '</div>';
                }; ?>

            </div>
            <?= anchor('candidats/profile', 'Retour', 'class="ui teal big button"'); ?>
            <?= form_submit('submitted', 'Valider', 'class="ui teal big button"'); ?>

            <?= form_close(); ?>
        </div>
    </div>
</div>
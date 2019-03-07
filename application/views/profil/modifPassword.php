<div class="ui attached segment">
    <div class="ui middle aligned center aligned margin50">
        <div class="column">
            <h1 class="title">Modifier votre mot de passe</h1>

            <?= form_open('', 'class = "ui huge form"'); ?>

            <div class="ui stacked segment">

                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <?= form_password('oldpassword', set_value('oldpassword'), 'placeholder="Votre ancien mot de passe"'); ?>
                    </div>
                </div>

                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <?= form_password('newpassword', set_value('newpassword'), 'placeholder="Votre nouveau mot de passe"'); ?>
                    </div>
                </div>

                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <?= form_password('password2', set_value('password2'), 'placeholder="Confirmez votre nouveau mot de passe"'); ?>
                    </div>
                </div>

                <?php if (isset($_POST['submitted'])) {
                    echo '<div class="ui error message" style="display:block;">' . validation_errors() . $this->session->flashdata('fail_oldpassword') . '</div>';
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
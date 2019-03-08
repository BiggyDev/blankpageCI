<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h1 class="ui teal image header">
            <div class="content">
                Votre nouveau mot de passe
            </div>
        </h1>

        <?= form_open('', 'class = "ui huge form"'); ?>

        <div class="ui stacked segment">

            <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <?= form_password('password', set_value('password'), 'placeholder="Votre nouveau mot de passe"'); ?>
                </div>
            </div>

            <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <?= form_password('confirmpassword', set_value('confirmpassword'), 'placeholder="Confirmez votre nouveau mot de passe"'); ?>
                </div>
            </div>

            <?php if (isset($_POST['submitted'])) {
                echo '<div class="ui error message" style="display:block;">' . validation_errors() . '</div>';
            } else {
                echo '<div class="ui error message">' . validation_errors() . '</div>';
            }; ?>

        </div>

        <?= form_submit('submitted', 'Enregistrer', 'class="ui teal big button" id="success"'); ?>

        <?= form_close(); ?>
    </div>
</div>

<script>

    $(function(){
        $("#success").click(function(){
            window.alert('Mot de passe modifié avec succès !');
        });
    });

</script>
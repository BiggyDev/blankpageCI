<?= validation_errors(); ?>

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
                    <input type="text" name="nom" placeholder="Nom & Pr&eacute;nom" value="<?= set_value('nom'); ?>" />
                </div>
            </div>

            <div class="field">
                <div class="ui left icon input">
                    <i class="mail icon"></i>
                    <input type="text" name="email" placeholder="Adresse E-Mail" value="<?= set_value('email'); ?>"/>
                </div>
            </div>

            <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" name="password" placeholder="Mot de Passe" value="<?= set_value('password'); ?>"/>
                </div>
            </div>

            <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" name="confirmpassword" placeholder="Confirmation Mot de Passe" value="<?= set_value('confirmpassword'); ?>"/>
                </div>
            </div>

            <input class="ui fluid teal large submit button" type="submit" name="submitted" value="S'inscrire">

        </div>

        <div class="ui error message"></div>


        <?= form_close(); ?>


    </div>
</div>
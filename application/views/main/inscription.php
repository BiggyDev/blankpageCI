<?= validation_errors(); ?>

<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui teal image header">
            <div class="content">
                Inscrivez-vous pour accéder aux fonctionnalités du site
            </div>
        </h2>


        <?= form_open('form', 'class = "ui large form"'); ?>


        <div class="ui stacked segment">

            <div class="field">
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="text" name="nom" placeholder="Nom & Pr&eacute;nom" />
                </div>
            </div>

            <div class="field">
                <div class="ui left icon input">
                    <i class="mail icon"></i>
                    <input type="text" name="email" placeholder="Adresse E-Mail" />
                </div>
            </div>

            <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" name="password" placeholder="Mot de Passe" />
                </div>
            </div>

            <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" name="confirmpassword" placeholder="Confirmation Mot de Passe" />
                </div>
            </div>

            <div class="ui fluid large teal submit button">Inscription</div>

        </div>

        <div class="ui error message"></div>


        <?= form_close(); ?>


    </div>
</div>
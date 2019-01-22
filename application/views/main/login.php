<?= validation_errors(); ?>

<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui teal image header">
            <div class="content">
                Connectez-vous pour accéder à votre compte
            </div>
        </h2>
        <?= form_open('form', 'class = "ui large form"'); ?>
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="email" placeholder="E-mail address" />
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                </div>
<!--                <div class="ui fluid large teal submit button">Login</div>-->
                <div class="ui animated teal submit button" tabindex="0">
                    <div class="visible content">Login</div>
                    <div class="hidden content">
                        <i class="right arrow icon"></i>
                    </div>
                </div>
            </div>

            <div class="ui error message"></div>

        <?= form_close(); ?>

        <div class="ui message">
            Vous n'êtes pas inscrit(e)? <?= anchor('Accueil/inscription', 'Inscription'); ?>
        </div>

    </div>
</div>
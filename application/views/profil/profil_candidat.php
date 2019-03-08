<div class="ui attached segment">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h1 class="title">Mes informations de connexion</h1>

            <div class="ui stacked segment">

                <h4>Nom & Prénom</h4>
                <div class="field">
                    <div class="ui left input">
                        <?= $_SESSION['bp_candidats']['name']; ?>
                    </div>
                </div>

                <h4>Adresse E-mail</h4>
                <div class="field">
                    <?= $_SESSION['bp_candidats']['email']; ?>
                </div>

                <h4>Mot de passe</h4>
                <div class="field">
                    <span>*********</span>
                </div>

                <div class="ui divider"></div>

                <h4>Actions</h4>

                <div class="fields">
                    <div class="field">
                        <?= anchor('candidats/modifEmail', 'Modifier mon adresse e-mail', 'type="button" class="ui button" id="email"'); ?>
                        <?= anchor('candidats/modifPassword', 'Modifier mon mot de passe', 'type="button" class="ui button" id="password"'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="ui attached segment">
    <div class="ui middle aligned center aligned margin50">
        <div class="column">
            <h1 class="title">Félicitations !</h1>

            <div class="ui stacked segment">

                <p class="text-center">Votre CV a bien été créé. Vous avez reçu un mail de confirmation attestant de la création de ce dernier.</p>

                <p class="text-info">Vous n'avez pas reçu de mail? Cliquez <?= anchor('candidats/sendMailredirect', 'ici'); ?> pour renvoyer le mail.</p>

            </div>

            <?= anchor('candidats/profile', 'Retour au profil', 'class="ui big teal button"'); ?>
        </div>
    </div>
</div>
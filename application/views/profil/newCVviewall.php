<?php

echo '<pre>';
var_dump($_SESSION);
echo '</pre>'; ?>

<div class="ui attached segment">
    <div class="ui middle aligned center aligned margin50">
        <div class="column">
            <h1 class="title">Récapitulatif</h1>

            <div class="ui stacked segment">

                <div class="field">
                    <h4>Date de naissance</h4>
                    <span class="text-info"><?= $_SESSION['name']; ?></span>
                </div>

                <div class="field">
                    <h4>Sexe</h4>
                    <span class="text-info"><?= $_SESSION['email']; ?></span>
                </div>


            </div>
        </div>
    </div>
</div>



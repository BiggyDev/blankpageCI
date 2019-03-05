<div class="ui three top attached steps">
    <div class="step">
        <i class="truck icon"></i>
        <div class="content">
            <div class="title">Informations</div>
            <div class="description">Parlez nous de vous</div>
        </div>
    </div>
    <div class="active step">
        <i class="payment icon"></i>
        <div class="content">
            <div class="title">Formations</div>
            <div class="description">Entrez vos diff&eacute;rents dipl&ocirc;mes</div>
        </div>
    </div>
    <div class="disabled step">
        <i class="info icon"></i>
        <div class="content">
            <div class="title">Exp&eacute;riences</div>
            <div class="description">Vos exp&eacute;riences professionnelles</div>
        </div>
    </div>
</div>
<div class="ui attached segment">
    <div class="ui middle aligned center aligned margin50">
        <div class="column">
            <h1 class="title">Formations</h1>

            <?= form_open('', 'class = "ui huge form",  id="addStep"'); ?>

            <div class="source-item ui stacked segment" id="wrapper" data-index="0">

                <div class="field">
                    <label>Ecole</label>
                    <div class="ui left input">
                        <?= form_input('infos[0][' . 'ecole' . ']', set_value('ecole'), 'placeholder ="ex : NFactory School", data-name="ecole"'); ?>
                    </div>
                </div>

                <div class="field">
                    <label>Adresse</label>
                    <div class="ui left input">
                        <?= form_input('infos[0][' . 'address' . ']', set_value('address'), 'placeholder ="N° + Rue", data-name="address"'); ?>
                    </div>
                </div>

                <div class="field">
                    <div class="ui left input">
                        <?= form_input('infos[0][' . 'postalcode' . ']', set_value('postalcode'), 'placeholder ="Code Postal", data-name="postalcode"'); ?>
                    </div>
                </div>

                <div class="field">
                    <div class="ui left input">
                        <?= form_input('infos[0][' . 'city' . ']', set_value('city'), 'placeholder ="Ville", data-name="city"'); ?>
                    </div>
                </div>

                <div class="field">
                    <label>Diplôme</label>
                    <div class="ui left input">
                        <?= form_input('infos[0][' . 'diplome' . ']', set_value('diplome'), 'placeholder ="Baccalaur&eacute;at, Licence...", data-name="diplome"'); ?>
                    </div>
                </div>

                <div class="field">
                    <label>Date de d&eacute;but</label>
                    <?= form_input($datedebut); ?>
                </div>

                <div class="field">
                    <label>Dur&eacute;e</label>
                    <div class="ui left input">
                        <?= form_input('infos[0][' . 'duree' . ']', set_value('duree'), 'placeholder="En mois et ann&eacute;e (1 an et 6 mois)", data-name="duree"'); ?>
                    </div>
                </div>

                <div class="field">
                    <label>Mention / Commentaires</label>
                    <div class="ui left input">
                        <?= form_textarea('infos[0][' . 'mention_commentaires' . ']', set_value('mention_commentaires'), 'placeholder="Indiquez la mention obtenue, les matières étudi&eacute;es, ect...", data-name="mention_commentaires"'); ?>
                    </div>
                </div>

            </div>
        </div>

        <?= form_submit('notsubmitted', 'Etape précédente', 'class="ui teal big button"'); ?>

        <button class="ui teal big button add-one" type="button">Ajouter une formation</button>


        <?= form_submit('submitted', 'Etape suivante', 'class="ui teal big button"'); ?>

        <?= form_close(); ?>

    </div>
</div>

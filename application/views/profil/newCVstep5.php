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

        <h1 class="title">Langues</h1>

        <?= form_open('', 'class = "ui huge form", id="addStep"'); ?>

        <div class="source-item ui stacked segment" id="wrapper" data-index="0">

            <div class="inline fields">
                <label for="language">Langues</label>
                <div class="field">
                    <div class="ui radio checkbox">
                        <?= form_radio('infos[0][' . 'name' . ']', 'anglais', FALSE, 'class="hidden", data-name="name"'); ?>
                        <?= form_label('Anglais'); ?>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <?= form_radio('infos[0][' . 'name' . ']', 'français', FALSE, 'class="hidden", data-name="name"'); ?>
                        <?= form_label('Français'); ?>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <?= form_radio('infos[0][' . 'name' . ']', 'espagnol', FALSE, 'class="hidden", data-name="name"'); ?>
                        <?= form_label('Espagnol'); ?>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <?= form_radio('infos[0][' . 'name' . ']', 'allemand', FALSE, 'class="hidden", data-name="name"'); ?>
                        <?= form_label('Allemand'); ?>
                    </div>
                </div>
            </div>

            <div class="inline fields">
                <label for="language">Niveau</label>
                <div class="field">
                    <div class="ui radio checkbox">
                        <?= form_radio('infos[0][' . 'niveau' . ']', 'débutant', FALSE, 'class="hidden", data-name="niveau"'); ?>
                        <?= form_label('Débutant'); ?>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <?= form_radio('infos[0][' . 'niveau' . ']', 'scolaire', FALSE, 'class="hidden", data-name="niveau"'); ?>
                        <?= form_label('Scolaire'); ?>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <?= form_radio('infos[0][' . 'niveau' . ']', 'professionnel', FALSE, 'class="hidden", data-name="niveau"'); ?>
                        <?= form_label('Professionnel'); ?>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <?= form_radio('infos[0][' . 'niveau' . ']', 'langue maternelle', FALSE, 'class="hidden", data-name="niveau"'); ?>
                        <?= form_label('Langue Maternelle'); ?>
                    </div>
                </div>

                <div class="ui error message"></div>
            </div>

        </div>
        </div>

        <?= form_submit('notsubmitted', 'Etape précédente', 'class="ui teal big button"'); ?>

        <button class="ui teal big button add-one" type="button">Ajouter une langue</button>

        <?= form_submit('submitted', 'Etape suivante', 'class="ui teal big button"'); ?>



        <?= form_close(); ?>

    </div>
</div>

<script>

    $(document)
        .ready(function() {

            $('.ui.radio.checkbox')
                .checkbox()
            ;

        })
    ;
</script>
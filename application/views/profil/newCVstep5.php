<div class="ui ordered attached steps width100">
    <div class="completed step">
        <div class="content">
            <div class="title">Informations </br>
                personnelles</div>
        </div>
    </div>
    <div class="completed step">
        <div class="content">
            <div class="title">Formations</div>
        </div>
    </div>
    <div class="completed step">
        <div class="content">
            <div class="title">Expériences</div>
        </div>
    </div>
    <div class="completed step">
        <div class="content">
            <div class="title">Compétences </br>
                techniques</div>
        </div>
    </div>
    <div class="active step">
        <div class="content">
            <div class="title">Langues</div>
        </div>
    </div>
    <div class="disabled step">
        <div class="content">
            <div class="title">Certifications</div>
        </div>
    </div>
    <div class="disabled step">
        <div class="content">
            <div class="title">Savoir-être</div>
        </div>
    </div>
    <div class="disabled step">
        <div class="content">
            <div class="title">Réseaux </br>
                sociaux</div>
        </div>
    </div>
    <div class="disabled step">
        <div class="content">
            <div class="title">Centres </br>
                d'intêret</div>
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
            </div>

        </div>
        </div>

        <?= form_submit('notsubmitted', 'Etape précédente', 'class="ui teal big button"'); ?>

        <button class="ui teal big button add-one" type="button">Ajouter une langue</button>

        <?= form_submit('submitted', 'Etape suivante', 'class="ui teal big button"'); ?>

        <div class="ui error message"></div>

        <?= form_close(); ?>

    </div>
</div>

<script>

    $(document)
        .ready(function() {

            $('.ui.radio.checkbox')
                .checkbox()
            ;

            $('.ui.form')
                .form({
                    fields: {

                })
            ;
        })
    ;
</script>
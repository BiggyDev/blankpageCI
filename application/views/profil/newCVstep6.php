<div class="ui ordered attached mini steps width100">
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
    <div class="completed step">
        <div class="content">
            <div class="title">Langues</div>
        </div>
    </div>
    <div class="active step">
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
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <div class="column">
            <h1 class="title">Certifications</h1>

            <?= form_open('', 'class = "ui huge form", id="addStep"'); ?>

            <div class="source-item ui stacked segment" id="wrapper" data-index="0">

                <div class="field">
                    <label>Nom</label>
                    <div class="ui left input">
                        <?= form_input('infos[0][' . 'name' . ']', set_value('name'), 'placeholder="ex : TOEIC", data-name="name"'); ?>
                    </div>
                </div>

                <div class="field">
                    <label>Description</label>
                    <div class="ui left input">
                        <?= form_textarea('infos[0][' . 'description' . ']', set_value('description'), 'placeholder="Donnez des pr&eacute;cisions sur la certification", data-name="description"'); ?>
                    </div>
                </div>

                <div class="field">
                    <label>Date de d&eacute;but</label>
                    <?= form_input($datedebut); ?>
                </div>

                <div class="field">
                    <label>Dur&eacute;e de validité</label>
                    <div class="ui left input">
                        <?= form_input('infos[0][' . 'duree' . ']', set_value('duree'), 'placeholder="En ann&eacute;es", data-name="duree"'); ?>
                    </div>
                </div>

                <div class="ui error message"></div>

            </div>
            </div>

            <?= form_submit('notsubmitted', 'Etape précédente', 'class="ui teal big button"'); ?>

            <button class="ui teal big button add-one" type="button">Ajouter une certification</button>

            <?= form_submit('submitted', 'Etape suivante', 'class="ui teal big button"'); ?>

            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>

    $(document)
        .ready(function() {

            $('.ui.form')
                .form({
                    fields: {
                        name: {
                            identifier: 'name',
                            rules: [
                                {
                                    type   : 'maxLength[50]',
                                    prompt : 'Le nom de la certification est trop long (50 caractères maximum).'
                                }
                            ]
                        },
                        description: {
                            identifier: 'description',
                            rules: [
                                {
                                    type   : 'maxLength[50]',
                                    prompt : 'Votre texte est trop long (50 caractères maximum).'
                                }
                            ]
                        },
                        duree: {
                            identifier: 'duree',
                            rules: [
                                {
                                    type   : 'integer',
                                    prompt : 'Vous devez renseigner un nombre ou un chiffre.'
                                }
                                {
                                    type   : 'maxLength[11]',
                                    prompt : 'Ce nombre est beaucoup trop long.'
                                }
                            ]
                        }
                    }
                })
            ;
        })
    ;
</script>
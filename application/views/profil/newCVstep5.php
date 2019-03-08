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
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <div class="column">

                <h1 class="title">Langues</h1>

                <?= form_open('', 'class = "ui huge form", id="addStep"'); ?>

                <div class="source-item ui stacked segment" id="wrapper" data-index="0">

                    <div class="field">
                        <label>Langue</label>
                        <?= form_dropdown('name', $name, '', 'class="ui fluid normal dropdown" id="name"' ); ?>
                    </div>

                    <div class="field">
                        <label>Niveau</label>
                        <?= form_dropdown('niveau', $niveau, '', 'class="ui fluid normal dropdown" id="niveau"'); ?>
                    </div>

                    <div class="ui error message"></div>

                </div>

            </div>

            <?= form_submit('notsubmitted', 'Etape précédente', 'class="ui teal big button"'); ?>

            <button class="ui teal big button add-one" type="button">Ajouter une langue</button>

            <?= form_submit('submitted', 'Etape suivante', 'class="ui teal big button"'); ?>

            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>

    $(document)
        .ready(function() {

            $('#name')
                .dropdown()
            ;

            $('#niveau')
                .dropdown()
            ;

        })
    ;
</script>
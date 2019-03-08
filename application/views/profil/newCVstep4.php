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
    <div class="active step">
        <div class="content">
            <div class="title">Compétences </br>
                techniques</div>
        </div>
    </div>
    <div class="disabled step">
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

        <h1 class="title">Comp&eacute;tences techniques</h1>

        <?= form_open('', 'class = "ui huge form"'); ?>

        <div class="ui stacked segment">

            <div class="field">
                <label>Comp&eacute;tences</label>
                <?= form_multiselect('name[]', $competence, '', 'class="ui fluid normal dropdown"'); ?>
            </div>

            <div class="ui error message"></div>

        </div>
        <?= form_submit('notsubmitted', 'Etape précédente', 'class="ui teal big button"'); ?>

        <?= form_submit('submitted', 'Etape suivante', 'class="ui teal big button"'); ?>

        <?= form_close(); ?>
        </div>
    </div>
</div>





<script>

    $(document)
        .ready(function() {

            $('.ui.normal.dropdown')
                .dropdown()
            ;

            $('#niveau')
                .dropdown()
            ;

            $('.ui.radio.checkbox')
                .checkbox()
            ;

            $('.ui.form')
                .form({
                    fields: {

                    }
                })
            ;
        })
    ;
</script>
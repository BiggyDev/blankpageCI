<div class="ui three top attached steps">
    <div class="active step">
        <i class="truck icon"></i>
        <div class="content">
            <div class="title">Infos personnelles</div>
            <div class="description">Dîtes nous qui vous êtes</div>
        </div>
    </div>
    <div class="disabled step">
        <i class="payment icon"></i>
        <div class="content">
            <div class="title">Formations</div>
            <div class="description">Quels sont vos diplômes ?</div>
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
        <h1 class="title">R&eacute;seaux Sociaux</h1>

        <?= form_open('', 'class = "ui huge form"'); ?>

        <div class="ui stacked segment">
            <div class="field">
                <div class="ui left icon input">
                    <?= form_input('linkedin', set_value('linkedin'), 'placeholder="Linkedin"'); ?>
                    <i class="linkedin blue icon"></i>
                </div>
            </div>

            <div class="field">
                <div class="ui left icon input">
                    <?= form_input('facebook', set_value('facebook'), 'placeholder="Facebook"'); ?>
                    <i class="facebook blue icon"></i>
                </div>
            </div>

            <div class="field">
                <div class="ui left icon input">
                    <?= form_input('twitter', set_value('twitter'), 'placeholder="Twitter"'); ?>
                    <i class="twitter blue icon"></i>
                </div>
            </div>

            <div class="field">
                <div class="ui left icon input">
                    <?= form_input('dribbble', set_value('dribbble'), 'placeholder="Dribbble"'); ?>
                    <i class="dribbble orange icon"></i>
                </div>
            </div>

            <div class="field">
                <div class="ui left icon input">
                    <?= form_input('instagram', set_value('instagram'), 'placeholder="Instagram"'); ?>
                    <i class="instagram pink icon"></i>
                </div>
            </div>

            <div class="field">
                <div class="ui left icon input">
                    <?= form_input('twitch', set_value('twitch'), 'placeholder="Twitch"'); ?>
                    <i class="twitch purple icon"></i>
                </div>
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

            $('.ui.form')
                .form({
                    fields: {
                        linkedin: {
                            identifier: 'linkedin',
                            rules: [
                                {
                                    type   : 'maxLength[255]',
                                    prompt : 'Votre lien est trop long.'
                                }
                            ]
                        },
                        facebook: {
                            identifier: 'facebook',
                            rules: [
                                {
                                    type   : 'maxLength[255]',
                                    prompt : 'Votre lien est trop long.'
                                }
                            ]
                        },
                        twitter: {
                            identifier: 'twitter',
                            rules: [
                                {
                                    type   : 'maxLength[255]',
                                    prompt : 'Votre lien est trop long.'
                                }
                            ]
                        },
                        dribbble: {
                            identifier: 'dribbble',
                            rules: [
                                {
                                    type   : 'maxLength[255]',
                                    prompt : 'Votre lien est trop long.'
                                }
                            ]
                        },
                        instagram: {
                            identifier: 'instagram',
                            rules: [
                                {
                                    type   : 'maxLength[255]',
                                    prompt : 'Votre lien est trop long.'
                                }
                            ]
                        },
                        twitch: {
                            identifier: 'twitch',
                            rules: [
                                {
                                    type   : 'maxLength[255]',
                                    prompt : 'Votre lien est trop long.'
                                }
                            ]
                        }
                    }
                })
            ;
        })
    ;
</script>
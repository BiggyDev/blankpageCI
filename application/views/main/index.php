<div class="pusher">
        <div class="ui inverted vertical masthead center aligned segment">
            <div class="ui container">
                <div class="ui large secondary inverted pointing menu">
                    <a class="toc item">
                        <i class="sidebar icon"></i>
                    </a>
                    <?= anchor('', 'Accueil', 'class = "active item"'); ?>
                    <a class="item" href="#CV">CV</a>
                    <a class="item" href="#visibilité">Visibilité</a>
                    <a class="item" href="#métier">Métier</a>
                    <a class="item" href="#accessibilité">Accessibilité</a>
                    <div class="right item">
                        <?= anchor('Accueil/login', 'Connexion', 'class = "ui inverted button"'); ?>
                        <?= anchor('Accueil/inscription', 'Inscription', 'class = "ui inverted button"'); ?>
                    </div>
                </div>
            </div>

                <h1 class="ui inverted header">
                    Bienvenue sur Blankpage
                </h1>
                <h2>Blankpage est un site permettant la création d'un CV complet et ergonomique</h2>
                <div class="ui huge teal button">Créer mon CV <i class="right arrow icon"></i></div>
        </div>

    <div class="ui text container" id="CV">
        <h2>Élaborez votre CV</h2><hr/>
        <h3>Grâce aux outils fournis</h3>
        <p>En renseignant quelques informations tel que vos études, vos compétences et vos passions vous pourrez choisir un design de CV et le mettre en ligne sur notre site WEB</p>
    </div>

            <div class="ui hidden divider"></div>

    <div class="ui text container" id="visibilité">
        <h2>Augmenter votre visibilité</h2><hr/>
        <h3>Auprès des professionnels</h3>
        <p>Votre CV est visible auprès de tous les professionnels utilisant notre plateforme, dans ce cas n'hésitez pas à renseigner toutes vos compétences et autres informations sur vous dans votre CV</p>
    </div>

            <div class="ui hidden divider"></div>

    <div class="ui text container" id="métier">
        <h2>Trouver le métier qui vous convient</h2><hr/>
        <h3>Rencontrez des professionnels.</h3>
        <p>Avec vos informations, nous sommes apte à vous mettre en relations avec des professionnels recherchant votre profil.</p>
    </div>

            <div class="ui hidden divider"></div>

    <div class="ui text container" id="accessibilité">
        <h2>Accessible partout</h2><hr/>
        <h3>Sur toutes les plateformes</h3>
        <p>En dehors des entretients vous pouvez avoir une occasions de donner votre CV en main propre ou simplement un moyen de l'afficher, c'est une part a ne pas négliger dans la recherche d'un emploi et elle fait souvent la différence</p>
    </div>
</div>

<!-- Menu fondu -->
<script>
    $(document)
        .ready(function() {

            // fix menu when passed
            $('.masthead')
                .visibility({
                    once: false,
                    onBottomPassed: function() {
                        $('.fixed.menu').transition('fade in');
                    },
                    onBottomPassedReverse: function() {
                        $('.fixed.menu').transition('fade out');
                    }
                })
            ;

            // create sidebar and attach to menu open
            $('.ui.sidebar')
                .sidebar('attach events', '.toc.item')
            ;

        })
    ;
</script>
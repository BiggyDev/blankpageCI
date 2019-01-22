<!-- Following Menu -->
<div class="ui large top fixed hidden menu">
    <div class="ui container">
        <?= anchor('', 'Accueil', 'class = "active item"'); ?>
        <a class="item">Work</a>
        <a class="item">Company</a>
        <a class="item">Careers</a>
        <div class="right menu">
            <div class="item">
                <?= anchor('Accueil/login', 'Login', 'class = "ui button"'); ?>
            </div>
            <div class="item">
                <?= anchor('Accueil/inscription', 'Inscription', 'class = "ui primary button"'); ?>
            </div>
        </div>
    </div>
</div>
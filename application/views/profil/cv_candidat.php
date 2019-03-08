<div class="buttonCV">
    <button class="ui huge orange button" onclick="changeColor('cv-1')">Template 1</button>
    <button class="ui huge black button" onclick="changeColor('cv-2')">Template 2</button>
    <button class="ui huge teal button" onclick="changeColor('cv-3')">Template 3</button>
</div>

<div class="page-wrap" id="cv-1">
    <?php if (!empty($user['candidats'][0]['name'])){ echo '<h2 class="important" id="nomOnCV">'.$user['candidats'][0]['name'].'</h2>';} ?>

    <?php if (!empty($user['infos'][0]['bio'])){ echo '<p class="bio">'.$user['infos'][0]['bio'].'</p>';} ?>

    <div class="clear"></div>

    <dl>
        <div class="clear"></div>
        <dt>Études</dt>
        <dd>
            <?php $compteur = 0;
            foreach ($user['formation'] as $key => $value){
                if (!empty($value['diplome'])){echo '<h2 class="important">'.$value['diplome'].'</h2>';}
                echo '<ul>';
                if (!empty($value['ecole'])){echo '<li>'.$value['ecole'].'</li>';}
                if (!empty($value['ville'])){echo '<li>'.$value['ville'].'</li>';}
                if (!empty($value['mention_commentaires'])){echo '<li>'.$value['mention_commentaires'].'</li>';}
                echo '</ul>';
                $compteur++;
            } ?>
        </dd>

        <div class="clear"></div>

        <dt>Compétences</dt>
        <dd>

            <p>
                <?php $compteur = 0;
                foreach ($user['competencestech'] as $key => $value){
                    $compteur++;

                    if (!empty($value['name'])) {
                        if ($compteur > 1) {
                            if ($compteur % 5 == 0) {
                                echo '<br/>' . $value['name'];
                            } else {
                                echo ' | ' . $value['name'];
                            }
                        } else {
                            echo $value['name'];
                        }
                    }
                } ?>
            </p>
        </dd>

        <div class="clear"></div>

        <dt>Vie professionnelle</dt>
        <dd>
            <?php foreach ($user['experiences'] as $key => $value){
                    if (!empty($value['intitule'])){echo '<h2 class="important">'.$value['intitule'].'</h2>';}
                    echo '<ul>';
                    if (!empty($value['entreprise'])){echo '<li>'.$value['entreprise'].'</li>';}
                    if (!empty($value['description'])){echo '<li>'.$value['description'].'</li>';}
                    echo '</ul>';
            } ?>
        </dd>

        <div class="clear"></div>

        <dt>Loisirs</dt>
        <dd>
            <?php $compteur = 0;
            foreach ($user['interet'] as $key => $value){
                if ($compteur == 0){
                    if (!empty($value['name'])){echo '<h2 class="important">'.$value['name'].'</h2>';}
                    echo '<ul>';
                    if (!empty($value['description'])){echo '<li>'.$value['description'].'</li>';}
                    echo '</ul>';
                }
                else {
                    if (!empty($value['name'])){echo '<strong>'.$value['name'].'</strong>';}
                    echo '<ul>';
                    if (!empty($value['description'])){echo '<li>'.$value['description'].'</li>';}
                    echo '</ul>';
                }
                $compteur++;
            } ?>
        </dd>

        <div class="clear"></div>

        <dt>Certifications</dt>
        <dd>
            <?php $compteur = 0;
            foreach ($user['certifications'] as $key => $value){
                if ($compteur == 0){
                    if (!empty($value['name'])){echo '<h2 class="important">'.$value['name'].'</h2>';}
                    echo '<ul>';
                    if (!empty($value['description'])){echo '<li>'.$value['description'].'</li>';}
                    echo '</ul>';
                }
                else {
                    if (!empty($value['name'])){echo '<strong>'.$value['name'].'</strong>';}
                    echo '<ul>';
                    if (!empty($value['description'])){echo '<li>'.$value['description'].'</li>';}
                    echo '</ul>';
                }
                $compteur++;
            } ?>
        </dd>

        <div class="clear"></div>

        <dt>Langues</dt>
        <dd>
            <?php $compteur = 0;
            foreach ($user['langues'] as $key => $value){
                if (!empty($value['name'])){echo '<h2 class="important">'.$value['name'].'</h2>';}
                echo '<ul>';
                if (!empty($value['niveau'])){echo '<li>'.$value['niveau'].'</li>';}
                echo '</ul>';
                $compteur++;
            } ?>
        </dd>

        <div class="clear"></div>

        <dt>Savoir être</dt>
        <dd>
            <?php $compteur = 0;
            foreach ($user['savoiretre'] as $key => $value){
                $compteur++;

                if (!empty($value['name'])) {
                    if ($compteur > 1) {
                        if ($compteur % 5 == 0) {
                            echo '<br/>' . $value['name'];
                        } else {
                            echo ' | ' . $value['name'];
                        }
                    } else {
                        echo $value['name'];
                    }
                }
            } ?>
        </dd>

        <div class="clear"></div>

        <dt>Contact</dt>
        <dd>
            <?php $compteur = 0;
            foreach ($user['reseaux'] as $key => $value){
                if ($compteur == 0){
                    if (!empty($user['candidats'][0]['email']) and !empty($user['infos'][0]['portable'])){
                        echo '<h2><i class="icon important mail"></i><a class="email" href="mailto:'.$user['candidats'][0]['email'].'">'.$user['candidats'][0]['email'].'</a></h2><span><i class="icon important phone"></i> : '.$user['infos'][0]['portable'].'</span>';
                    }
                    else if (!empty($user['candidats'][0]['email'])){
                        echo '<h2><i class="icon important mail"></i><a class="email" href="mailto:'.$user['candidats'][0]['email'].'">'.$user['candidats'][0]['email'].'</a></h2>';
                    }
                    else if (!empty($user['infos'][0]['portable'])){
                        echo '<span><i class="icon important phone"></i> : '.$user['infos'][0]['portable'].'</span><br/>';
                    }
                    echo '<ul>';
                    if (!empty($value['linkedin'])){echo '<li>Linkedin : '.$value['linkedin'].'</li>';}
                    if (!empty($value['facebook'])){ echo '<li>Facebook : '.$value['facebook'].'</li>';}
                    if (!empty($value['twitter'])){ echo '<li>Twitter : '.$value['twitter'].'</li>';}
                    if (!empty($value['dribbble'])){ echo '<li>Dribbble : '.$value['dribbble'].'</li>';}
                    if (!empty($value['instagram'])){ echo '<li>Instagram : '.$value['instagram'].'</li>';}
                    if (!empty($value['twitch'])){ echo '<li>Twitch : '.$value['twitch'].'</li>';}
                    echo '</ul>';
                }
                $compteur++;
            } ?>
        </dd>
    </dl>
    <div class="clear"></div>
</div>


<script>
    function changeColor(newId) {
        var tempo = document.querySelectorAll('div[id^="cv-"]');
        tempo = tempo[0].id;
        if (document.getElementById(tempo) !== null || document.getElementById(tempo) !== undefined){
            document.getElementById(tempo).id = newId;
        }
    }
</script>
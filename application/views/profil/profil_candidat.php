<div>

<?php
    $this->db->select('name,email');
    $this->db->from('bp_candidats');
    $this->db->where('id', $_SESSION['bp_candidats']['id']);
    $user['candidats'] = $this->db->get()->result_array();

    $this->db->select('name,description,date,duree');
    $this->db->from('bp_certifications');
    $this->db->where('id_candidats', $_SESSION['bp_candidats']['id']);
    $user['certifications'] = $this->db->get()->result_array();

    $this->db->select('name');
    $this->db->from('bp_competencestech');
    $this->db->where('id_candidats', $_SESSION['bp_candidats']['id']);
    $user['competencestech'] = $this->db->get()->result_array();

    $this->db->select('entreprise,intitule,date_debut,duree,description,adresse,cp,ville');
    $this->db->from('bp_experiences');
    $this->db->where('id_candidats', $_SESSION['bp_candidats']['id']);
    $user['experiences'] = $this->db->get()->result_array();

    $this->db->select('ecole,adresse,cp,ville,diplome,datedebut,duree,mention_commentaires');
    $this->db->from('bp_formation');
    $this->db->where('id_candidats', $_SESSION['bp_candidats']['id']);
    $user['formation'] = $this->db->get()->result_array();

    $this->db->select('age,sexe,adresse,cp,ville,portable,permis,vehicule,bio,portfolio,more');
    $this->db->from('bp_infos');
    $this->db->where('id_candidats', $_SESSION['bp_candidats']['id']);
    $user['infos'] = $this->db->get()->result_array();

    $this->db->select('name,description');
    $this->db->from('bp_interet');
    $this->db->where('id_candidats', $_SESSION['bp_candidats']['id']);
    $user['interet'] = $this->db->get()->result_array();

    $this->db->select('name,niveau');
    $this->db->from('bp_langues');
    $this->db->where('id_candidats', $_SESSION['bp_candidats']['id']);
    $user['langues'] = $this->db->get()->result_array();

    $this->db->select('linkedin,facebook,twitter,dribbble,instagram,twitch');
    $this->db->from('bp_reseaux');
    $this->db->where('id_candidats', $_SESSION['bp_candidats']['id']);
    $user['reseaux'] = $this->db->get()->result_array();

    $this->db->select('name');
    $this->db->from('bp_savoiretre');
    $this->db->where('id_candidats', $_SESSION['bp_candidats']['id']);
    $user['savoiretre'] = $this->db->get()->result_array();

    echo '<h2 class="ui inverted teal block center aligned header">M E S<br/>C V</h2>';

    if (isset($user)) {
        ?>
                    <div onclick="changeColor('cv-red')">
                        <i class="add icon"></i>Rouge
                    </div>
                    <div onclick="changeColor('cv-blue')">
                        <i class="add icon"></i>Bleu
                    </div>

            <div id="cv-Client">
                <div class="page-wrap">
                    <div id="contact-info" class="vcard">
                        <?php if (!empty($user['candidats'][0]['name'])){ echo '<h2 class="important" class="nomOnCV">'.$user['candidats'][0]['name'].'</h2>';} ?>
                    </div>

                    <div id="objective">
                            <?php if (!empty($user['infos'][0]['bio'])){ echo '<span>'.$user['infos'][0]['bio'].'</span>';} ?>
                    </div>

                    <div class="clear"></div>

                    <dl>
                        <dd class="clear"></dd>
                        <dt>Études</dt>
                        <dd>
                            <?php $compteur = 0;
                            foreach ($user['formation'] as $key => $value){
                                if ($compteur == 0){
                                    if (!empty($value['diplome'])){echo '<h2 class="important">'.$value['diplome'].'</h2>';}
                                    echo '<ul>';
                                    if (!empty($value['ecole'])){echo '<li>'.$value['ecole'].'</li>';}
                                    if (!empty($value['ville'])){echo '<li>'.$value['ville'].'</li>';}
                                    if (!empty($value['mention_commentaires'])){echo '<li>'.$value['mention_commentaires'].'</li>';}
                                    echo '</ul>';
                                }
                                else {
                                    if (!empty($value['diplome'])){echo '<strong>'.$value['diplome'].'</strong>';}
                                    echo '<ul>';
                                    if (!empty($value['ecole'])){echo '<li>'.$value['ecole'].'</li>';}
                                    if (!empty($value['ville'])){echo '<li>'.$value['ville'].'</li>';}
                                    if (!empty($value['mention_commentaires'])){echo '<li>'.$value['mention_commentaires'].'</li>';}
                                    echo '</ul>';
                                }
                                $compteur++;
                            } ?>
                        </dd>

                        <dd class="clear"></dd>

                        <dt>Compétences</dt>
                        <dd>

                            <p>
                                <?php $compteur = 0;
                                foreach ($user['competencestech'] as $key => $value){
                                    $compteur++;

                                    if (!empty($value['name'])) {
                                        if ($compteur == 1) {
                                            echo '<h2 class="important">' . $value['name'] . '</h2>';
                                        } else if ($compteur > 2) {
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

                        <dd class="clear"></dd>

                        <dt>Vie professionnelle</dt>
                        <dd>
                            <?php $compteur = 0;
                            foreach ($user['experiences'] as $key => $value){
                                if ($compteur == 0){
                                    if (!empty($value['intitule'])){echo '<h2 class="important">'.$value['intitule'].'</h2>';}
                                    echo '<ul>';
                                    if (!empty($value['entreprise'])){echo '<li>'.$value['entreprise'].'</li>';}
                                    if (!empty($value['description'])){echo '<li>'.$value['description'].'</li>';}
                                    echo '</ul>';
                                }
                                else {
                                    if (!empty($value['intitule'])){echo '<strong>'.$value['intitule'].'</strong>';}
                                    echo '<ul>';
                                    if (!empty($value['entreprise'])){echo '<li>'.$value['entreprise'].'</li>';}
                                    if (!empty($value['description'])){echo '<li>'.$value['description'].'</li>';}
                                    echo '</ul>';
                                }
                                $compteur++;
                            } ?>
                        </dd>

                        <dd class="clear"></dd>

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

                        <dd class="clear"></dd>

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

                        <dd class="clear"></dd>

                        <dt>Langues</dt>
                        <dd>
                            <?php $compteur = 0;
                            foreach ($user['langues'] as $key => $value){
                                if ($compteur == 0){
                                    if (!empty($value['name'])){echo '<h2 class="important">'.$value['name'].'</h2>';}
                                    echo '<ul>';
                                    if (!empty($value['niveau'])){echo '<li>'.$value['niveau'].'</li>';}
                                    echo '</ul>';
                                }
                                else {
                                    if (!empty($value['name'])){echo '<strong>'.$value['name'].'</strong>';}
                                    echo '<ul>';
                                    if (!empty($value['niveau'])){echo '<li>'.$value['niveau'].'</li>';}
                                    echo '</ul>';
                                }
                                $compteur++;
                            } ?>
                        </dd>

                        <dd class="clear"></dd>

                        <dt>Savoir être</dt>
                        <dd>
                            <?php $compteur = 0;
                            foreach ($user['savoiretre'] as $key => $value){

                                if ($compteur == 0){
                                    if (!empty($value['name'])){echo '<h2 class="important">'.$value['name'].'</h2>';}
                                }
                                else {
                                    if (!empty($value['name'])){echo '<strong>'.$value['name'].'</strong><br/>';}
                                }
                                $compteur++;
                            } ?>
                        </dd>

                        <dd class="clear"></dd>

                        <dt>Contact</dt>
                        <dd>
                            <?php $compteur = 0;
                            foreach ($user['reseaux'] as $key => $value){
                                if ($compteur == 0){
                                    if (!empty($user['candidats'][0]['email']) and !empty($user['infos'][0]['portable'])){
                                        echo '<h2 class="important"><a class="email" href="mailto:'.$user['candidats'][0]['email'].'">'.$user['candidats'][0]['email'].'</a></h2><strong>'.$user['infos'][0]['portable'].'</strong>';
                                    }
                                    else if (!empty($user['candidats'][0]['email'])){
                                        echo '<h2 class="important"><a class="email" href="mailto:'.$user['candidats'][0]['email'].'">'.$user['candidats'][0]['email'].'</a></h2>';
                                    }
                                    else if (!empty($user['infos'][0]['portable'])){
                                        echo '<h2 class="important">'.$user['infos'][0]['portable'].'</h2><br/>';
                                    }
                                    echo '<ul><li>Linkedin : '.$value['linkedin'].'</li><li>Facebook : '.$value['facebook'].'</li><li>Twitter : '.$value['twitter'].'</li><li>Dribbble : '.$value['dribbble'].'</li><li>Instagram : '.$value['instagram'].'</li><li>Twitch : '.$value['twitch'].'</li></ul>';
                                }
                                $compteur++;
                            } ?>
                        </dd>
                    </dl>

                    <div class="clear"></div>
                </div>
            </div>
    <?php
            }
?>

</div>

<script>
    function changeColor(newId) {
        document.getElementById('cv-Client').id = newId;
    }
</script>
<div>

<?php
if (!empty($_POST['code'])){

    echo '<pre>';
    print_r($_POST['code']);
    echo '</pre>';

    require_once('tcpdf.php');

    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->AddPage();
    $obj_pdf->SetTitle("Rapport de l'analyse de votre fichier");
    $obj_pdf->SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA,'',PDF_FONT_SIZE_DATA));
    $obj_pdf->setdefaultmonospacedFont('helvetica');
    $obj_pdf->setFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->setmargins(PDF_MARGIN_LEFT,'5',PDF_MARGIN_RIGHT);
    $obj_pdf->SetPrintHeader(false);
    $obj_pdf->SetPrintFooter(false);
    $obj_pdf->setautopagebreak(TRUE,10);
    $obj_pdf->setFont('helvetica','',12);

    $content = $_POST['code'];

    $obj_pdf->writeHTML($content);
    ob_end_clean();
    $obj_pdf->Output("test.pdf","D");
}

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

    if (isset($user)) {
        ?>
        <div class="buttonCV">
            <button class="ui grey button" onclick="changeColor('cv-1')">Template 1</button>
            <button class="ui grey button" onclick="changeColor('cv-2')">Template 2</button>
            <button class="ui grey button" onclick="changeColor('cv-3')">Template 3</button>
        </div>


            <div id="cv-1">
                <div class="page-wrap">
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

                        <div class="clear"></div>

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
                        </dd>

                        <div class="clear"></div>

                        <dt>Contact</dt>
                        <dd>
                            <?php $compteur = 0;
                            foreach ($user['reseaux'] as $key => $value){
                                if ($compteur == 0){
                                    if (!empty($user['candidats'][0]['email']) and !empty($user['infos'][0]['portable'])){
                                        echo '<h2 class="important"><a class="email" href="mailto:'.$user['candidats'][0]['email'].'">'.$user['candidats'][0]['email'].'</a></h2><strong>Téléphone : '.$user['infos'][0]['portable'].'</strong>';
                                    }
                                    else if (!empty($user['candidats'][0]['email'])){
                                        echo '<h2 class="important"><a class="email" href="mailto:'.$user['candidats'][0]['email'].'">'.$user['candidats'][0]['email'].'</a></h2>';
                                    }
                                    else if (!empty($user['infos'][0]['portable'])){
                                        echo '<h2 class="important">Téléphone : '.$user['infos'][0]['portable'].'</h2><br/>';
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
            </div>
    <?php
            }
            ?>

    <?= form_open('', 'class = "buttonCV" onsubmit="createCode()"'); ?>
    <?= form_hidden('code', 'pas de code'); ?>
    <?= form_submit('submitted', 'Enregistrer CV', 'class="ui teal huge button" id="saveCV"'); ?>
    <?= form_close(); ?>
</div>

<script>
    function createCode() {
        var tempo = document.querySelectorAll('div[id^="cv-"]');
        tempo = tempo[0].id;
        var html = '<div id="'+tempo+'">'+document.getElementById(tempo).innerHTML+'</div>'; //html
        var hidden = document.querySelectorAll('input[name="code"]');
        hidden[0].value = html; //hidden
        hidden = hidden[0];
    }

    function changeColor(newId) {
        var tempo = document.querySelectorAll('div[id^="cv-"]');
        tempo = tempo[0].id;
        if (document.getElementById(tempo) !== null || document.getElementById(tempo) !== undefined){
            document.getElementById(tempo).id = newId;
        }
    }
</script>
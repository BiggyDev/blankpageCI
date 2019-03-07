<div>

<?php
if (!empty($_POST['code'])){// Include the main TCPDF library (search for installation path).
    echo $_POST['code'];
    require_once('tcpdf.php');

// create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Nicola Asuni');
    $pdf->SetTitle('TCPDF Example 061');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 061', PDF_HEADER_STRING);

// set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set font
    $pdf->SetFont('helvetica', '', 10);

// add a page
    $pdf->AddPage();

// define some HTML content with style
    $html = $_POST['code'];

// output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

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

    echo '<h2 class="ui inverted teal block center aligned header">M E S<br/>C V</h2>';

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

        var css = '<style type="text/css">';
        css += '.clear {clear: both;}.page-wrap {width: 800px;margin: 40px auto 60px;padding: 15px;border: 2px black solid;}.important {font-size: 20px;margin: 0 0 6px 0;position: relative;}.important span {position: absolute;bottom: 0; right: 0;font-style: italic;font-size: 16px;color: #999;font-weight: normal;}.email {color: #999;text-decoration: none;border-bottom: 1px dotted #999;}.email:hover {border-bottom-style: solid;color: black;}ul {margin: 0 0 32px 17px;}#objective {width: 500px;float: left;}#objective p {font-style: italic;color: #666;}dt {font-style: italic;font-weight: bold;font-size: 18px;text-align: right;padding: 0 26px 0 0;width: 150px;float: left;padding-top: 20px;}dd {width: 600px;float: right;padding-left:10px;border-left: 1px solid black;margin: 10px 0;}#cv-1 .page-wrap{background-color: rgba(250, 250, 250, 0.5);}#cv-1 #nomOnCV {width:30%;padding:10px;margin: 0px auto 15px auto;text-align: center;text-transform: capitalize;font-size: 2em;box-shadow: 0px 1px 3px 0px black;border: none;border-radius: 5px;}#cv-1 .bio {text-align: center;margin: 10px auto;padding: 10px;border-top:solid 1px #FF8300;border-bottom:solid 1px #FF8300;border-radius: 10px;width:75%;color:#007CFF;font-size: 1.1em;}#cv-1 li{list-style-type:square;color:#007CFF;}#cv-1 .important, #cv-1 strong{color:#FF8300;border-bottom:1px solid #FF8300;text-transform: capitalize;}#cv-1 dt{color:#007CFF;}#cv-1 dd{width: 600px;float: right;padding-left:10px;border-left: 1px solid black;margin: 10px 0;}#cv-1 .email{text-decoration: none;border: none;color:#FF8300;}#cv-1 .email:hover{text-decoration: underline;}#cv-2 #nomOnCV {width:30%;padding:10px;margin: 0px auto 15px auto;text-align: center;text-transform: capitalize;font-size: 2em;border-left: 1px solid black;border-right: 1px solid black;}#cv-2 .bio {text-align: center;margin: 10px auto;padding: 10px;border-top:solid 1px black;border-bottom:solid 1px black;width:75%;font-size: 1.1em;}#cv-3 #nomOnCV {background-color: #D4E5EE;text-align: center;width: 50%;margin: 0 auto;padding-top: 20px;padding-bottom: 20px;border-radius: 10px;font-size: 2em;border: black solid 1px;}#cv-3 .bio {text-align: center;margin-top: 30px;font-size: 1.5em;border-bottom: solid 3px #006093;margin-bottom: 30px;padding-bottom: 30px;}#cv-3 .important {color: #006093;}';
        css += '</style>'; //css

        var code = css+'\n'+html; //code

        var hidden = document.querySelectorAll('input[name="code"]');
        hidden[0].value = code; //hidden
        hidden = hidden[0];
        console.log(hidden);
    }

    function changeColor(newId) {
        var tempo = document.querySelectorAll('div[id^="cv-"]');
        tempo = tempo[0].id;
        if (document.getElementById(tempo) !== null || document.getElementById(tempo) !== undefined){
            document.getElementById(tempo).id = newId;
        }
    }
</script>
<!-- Menu -->

<div id="truc" class="ui secondary vertical pointing menu">
    <!-- <a href="?lien=1" class="item" onclick="getElementById('demo').innerHTML = '<p>connard</p>' ">What is the time?</a> -->
    <a href="?lien=1" class="item">Voir mes CV</a>
    <a href="?lien=2" class="item">Lien 2</a>
    <a href="?lien=3" class="item">Lien 3</a>
</div>

<!--
<div>
    <p id="demo">demo</p>
</div>
-->

<div>

    <?php

    $this->db->select('name,email');
    $this->db->from('bp_candidats');
    $this->db->where('id', 3);
    $user['candidats'] = $this->db->get()->result_array();

    $this->db->select('name,description,date,duree,id_cv');
    $this->db->from('bp_certifications');
    $this->db->where('id_candidats', 3);
    $user['certifications'] = $this->db->get()->result_array();

    $this->db->select('name,id_cv');
    $this->db->from('bp_competencestech');
    $this->db->where('id_candidats', 3);
    $user['competencestech'] = $this->db->get()->result_array();

    $this->db->select('entreprise,intitule,date_debut,duree,description,adresse,cp,ville,id_cv');
    $this->db->from('bp_experiences');
    $this->db->where('id_candidats', 3);
    $user['experiences'] = $this->db->get()->result_array();

    $this->db->select('ecole,adresse,cp,ville,diplome,datedebut,duree,mention_commentaires,id_cv');
    $this->db->from('bp_formation');
    $this->db->where('id_candidats', 3);
    $user['formation'] = $this->db->get()->result_array();

    $this->db->select('age,sexe,adresse,cp,ville,portable,permis,vehicule,bio,portfolio,more,id_cv');
    $this->db->from('bp_infos');
    $this->db->where('id_candidats', 3);
    $user['infos'] = $this->db->get()->result_array();

    $this->db->select('name,description,id_cv');
    $this->db->from('bp_interet');
    $this->db->where('id_candidats', 3);
    $user['interet'] = $this->db->get()->result_array();

    $this->db->select('name,niveau,id_cv');
    $this->db->from('bp_langues');
    $this->db->where('id_candidats', 3);
    $user['langues'] = $this->db->get()->result_array();

    $this->db->select('name,lien,id_cv');
    $this->db->from('bp_reseaux');
    $this->db->where('id_candidats', 3);
    $user['reseaux'] = $this->db->get()->result_array();

    $this->db->select('name,id_cv');
    $this->db->from('bp_savoiretre');
    $this->db->where('id_candidats', 3);
    $user['savoiretre'] = $this->db->get()->result_array();

    $this->db->select('id,nom,description,id_candidats');
    $this->db->from('bp_cv');
    $this->db->where('id_candidats', 3);
    $user['cv'] = $this->db->get()->result_array();

    if(isset($_GET['lien'])){

        $link=$_GET['lien'];

        if ($link == '1') {

            echo '<h1>MES CV</h1>';

            if (isset($user)) {
                $compteur = 0;
                foreach ($user as $table => $multiple) {
                    foreach ($multiple as $number => $nom) {

                            if ($table == 'cv') {
                            $compteur++;
                                ?>
                                <div class="ui cards">
                                    <div class="card">
                                        <div class="content">
                                            <div class="header"><?= $nom['nom'] ?></div>
                                            <div class="description"><?= $nom['description'] ?></div>
                                        </div>

                                        <a onclick="afficherCV('cv-<?=$compteur?>')">
                                            <div class="ui bottom attached button" ">
                                                <i class="add icon"></i>Voir ce CV
                                            </div>
                                        </a>

                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                }
                echo '<pre>';
            print_r($user);
            echo '</pre>'; //id="cv-1" style="visibility: hidden;"
            }
        if ($link == '2'){
            echo '<p>lien 2</p>';
        }

        if ($link == '3'){
            echo '<p>lien 3</p>';
        }
    }  ?>

</div>

<!-- Mes CV -->
<script>
    var header = document.getElementById("truc");
    var btns = header.getElementsByClassName("item");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }

    function afficherCV(id) {

        var i = 1;
        while (document.getElementById('cv-'+i) !== null){
            document.getElementById('cv-'+i).style.visibility = "hidden";
            i++;
        }
        document.getElementById(id).style.visibility = "visible";
    }
</script>
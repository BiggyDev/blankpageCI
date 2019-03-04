



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

    $this->db->select('name,description,date,duree');
    $this->db->from('bp_certifications');
    $this->db->where('id_candidats', 3);
    $user['certifications'] = $this->db->get()->result_array();

    $this->db->select('name');
    $this->db->from('bp_competencestech');
    $this->db->where('id_candidats', 3);
    $user['competencestech'] = $this->db->get()->result_array();

    $this->db->select('entreprise,intitule,date_debut,duree,description,adresse,cp,ville');
    $this->db->from('bp_experiences');
    $this->db->where('id_candidats', 3);
    $user['experiences'] = $this->db->get()->result_array();

    $this->db->select('ecole,adresse,cp,ville,diplome,datedebut,duree,mention_commentaires');
    $this->db->from('bp_formation');
    $this->db->where('id_candidats', 3);
    $user['formation'] = $this->db->get()->result_array();

    $this->db->select('age,sexe,adresse,cp,ville,portable,permis,vehicule,bio,portfolio,more');
    $this->db->from('bp_infos');
    $this->db->where('id_candidats', 3);
    $user['infos'] = $this->db->get()->result_array();

    $this->db->select('name,description');
    $this->db->from('bp_interet');
    $this->db->where('id_candidats', 3);
    $user['interet'] = $this->db->get()->result_array();

    $this->db->select('name,niveau');
    $this->db->from('bp_langues');
    $this->db->where('id_candidats', 3);
    $user['langues'] = $this->db->get()->result_array();

    $this->db->select('name,lien');
    $this->db->from('bp_reseaux');
    $this->db->where('id_candidats', 3);
    $user['reseaux'] = $this->db->get()->result_array();

    $this->db->select('name');
    $this->db->from('bp_savoiretre');
    $this->db->where('id_candidats', 3);
    $user['savoiretre'] = $this->db->get()->result_array();

    $this->db->select('nom,description');
    $this->db->from('bp_cv');
    $this->db->where('id_candidats', 3);
    $user['cv'] = $this->db->get()->result_array();

    if(isset($_GET['lien'])){

        $link=$_GET['lien'];
<<<<<<< HEAD

        if ($link == '1') {

            echo '<h1>MES CV</h1>';

            if (isset($user)) {
                foreach ($user as $table => $multiple) {
                    foreach ($multiple as $number => $nom) {

                            if ($table == 'cv') {
                                ?>
                                <div class="ui cards">
                                    <div class="card">
                                        <div class="content">
                                            <div class="header"><?= $nom['nom'] ?></div>
                                            <div class="description"><?= $nom['description'] ?></div>
                                        </div>
                                        <div class="ui bottom attached button" ">
                                            <i class="add icon" onclick="afficherCacher();"></i>
                                            Voir ce CV
                                        </div>
                                    </div>
                                </div>
                                <div id="cv">bonjour</div>
                                <?php
                            }
                            else if ($number == 0) {

                            }
                        }
                    }
                }
            }
=======
        if ($link == '1'){
            echo '
            
            <h1>MES CV</h1>
            <table class="ui single line table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Registration Date</th>
        <th>E-mail address</th>
        <th>Premium Plan</th>
        <th>Premium Plan</th>
        <th>Premium Plan</th>
        <th>Premium Plan</th>
        <th>Premium Plan</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>John Lilki</td>
        <td>September 14, 2013</td>
        <td>jhlilk22@yahoo.com</td>
        <td>No</td>
    </tr>
    </tbody>
</table>
            
            
            ';
        }
>>>>>>> fe0ef1e1a42aab246e77b48e81221c24041adad7
        if ($link == '2'){
            echo '

            <p>Zizi</p>

            ';
        }
        if ($link == '3'){
            echo '

            <p>Bonjour !</p>

            ';
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

    function afficherCacher() {
        if (document.getElementById("cvCache").style.display === 'block') {
            document.getElementById("cv").style.display = 'none';
        }
        else {
            document.getElementById("cv").style.display = 'block';
        }
    }
</script>
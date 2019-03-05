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

    ?>
    <h2 class="ui inverted teal block center aligned header">M E S<br/>C V</h2>
    <?php

    if (isset($user)) {
        ?>
                <a href="#noir">
                    <div class="cv-noir">
                        <i class="add icon"></i>Template N°1
                    </div>
                </a>
                <a href="#couleur">
                    <div class="cv-couleur">
                        <i class="add icon"></i>Template N°2
                    </div>
                </a>

                <div class="page-wrap">
                    <div id="contact-info" class="vcard">
                        <h2 class="important">C'thulhu</h2>
                        <p>
                            Cell: <span class="tel">555-666-7777</span><br />
                            Email: <a class="email" href="mailto:greatoldone@lovecraft.com">greatoldone@lovecraft.com</a>
                        </p>
                    </div>

                    <div id="objective">
                        <p>
                            I am an outgoing and energetic (ask anybody) young professional, seeking a
                            career that fits my professional skills, personality, and murderous tendencies.
                            My squid-like head is a masterful problem solver and inspires fear in who gaze upon it.
                            I can bring world domination to your organization.
                        </p>
                    </div>

                    <div class="clear"></div>

                    <dl>
                        <dd class="clear"></dd>
                        <dt>Education</dt>
                        <dd>
                            <h2 class="important">Withering Madness University - Planet Vhoorl</h2>
                            <p><strong>Major:</strong> Public Relations<br />
                                <strong>Minor:</strong> Scale Tending</p>
                        </dd>

                        <dd class="clear"></dd>

                        <dt>Skills</dt>
                        <dd>
                            <h2 class="important">Office skills</h2>
                            <p>Office and records management, database administration, event organization, customer support, travel coordination</p>

                            <h2 class="important">Computer skills</h2>
                            <p>Microsoft productivity software (Word, Excel, etc), Adobe Creative Suite, Windows</p>
                        </dd>

                        <dd class="clear"></dd>

                        <dt>Experience</dt>
                        <dd>
                            <h2 class="important">Doomsday Cult <span>Leader/Overlord - Baton Rogue, LA - 1926-2010</span></h2>
                            <ul>
                                <li>Inspired and won highest peasant death competition among servants</li>
                                <li>Helped coordinate managers to grow cult following</li>
                                <li>Provided untimely deaths to all who opposed</li>
                            </ul>

                            <h2 class="important">The Watering Hole <span>Bartender/Server - Milwaukee, WI - 2009</span></h2>
                            <ul>
                                <li>Worked on grass-roots promotional campaigns</li>
                                <li>Reduced theft and property damage percentages</li>
                                <li>Janitorial work, Laundry</li>
                            </ul>
                        </dd>

                        <dd class="clear"></dd>

                        <dt>Hobbies</dt>
                        <dd>World Domination, Deep Sea Diving, Murder Most Foul</dd>

                        <dd class="clear"></dd>

                        <dt>References</dt>
                        <dd>Available on request</dd>

                        <dd class="clear"></dd>
                    </dl>

                    <div class="clear"></div>
                </div>
                <?php
            }
?>

</div>

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
</script>
<?php

function isLogged() //Fonction qui vérifie si l'utilisateur est connecté
{
    $ci =&get_instance();

    if(isset($ci->session->bp_candidats) &&
        isset($ci->session->bp_candidats['id']) &&
        isset($ci->session->bp_candidats['email']) &&
        isset($ci->session->bp_candidats['ip'])) {
        if($ci->session->bp_candidats['ip'] == $_SERVER['REMOTE_ADDR']) {
            return true;
        }
    } else {
        return false;
    }
}

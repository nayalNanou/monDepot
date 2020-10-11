<?php

$result = true;
$listErrors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['lastName'], $_POST['firstName'], $_POST['e-mail'], $_POST['phone'], $_POST['topic'], $_POST['message'])) {
    if (!preg_match("#^[ÉÈÇÀÙÄËÜÏÖÂÊÛÎÔéèàçâêîôùëüöïa-zA-Z' -]+$#i", trim($_POST['lastName']))) {
        $result = $result && false;
        array_push($listErrors, 'Le nom ne doit pas être vide et  contenir de nombres.');
    }

    if (!preg_match("#^[ÉÈÀÙÄËÜÏÖÂÊÛÎÔéèàçâöîôùëüïa-zA-Z' -]+$#i", trim($_POST['firstName']))) {
        $result = $result && false;
        array_push($listErrors, 'Le prenom ne doit pas être vide et contenir de nombres.');
    }

    if (!filter_var($_POST['e-mail'], FILTER_VALIDATE_EMAIL)) {
        $result = $result && false;
        array_push($listErrors, 'L\'adresse e-mail est invalide.');
    }

    if (!preg_match('#^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$#', $_POST['phone'])) {
        $result = $result && false;
        array_push($listErrors, 'Le numéro de téléphone est invalide.');
    }

    if ($_POST['topic'] == '---' || $_POST['topic'] == '') {
        $result = $result && false;
        array_push($listErrors, 'Sélectionnez le sujet du mail.');
    }

    if (!preg_match('#[a-z0-9]+#', trim($_POST['message']))) {
        $result = $result && false;
        array_push($listErrors, 'Le message est vide.');
    }


    if ($result == true) {
        echo 'Merci ' . $_POST['firstName'] . ' ' . $_POST['lastName'] . ' de nous avoir contacté à propos de "' . $_POST['topic'] . '"<br /><br />';

        echo "Un de nos conseiller vous contactera soit à l'adresse " . $_POST['e-mail'] . " ou par téléphone au " . $_POST['phone'] . " dans les plus brefs délais pour traiter votre demande :<br /><br />";

        echo $_POST['message'];
    } else {
        echo 'Liste des erreurs :<br /><br />';

        for ($i = 0, $c = count($listErrors); $i < $c; $i++) {
            echo '<span style="color: #CF3F3F;">' . $listErrors[$i] . '</span><br />';
        }
    }
}

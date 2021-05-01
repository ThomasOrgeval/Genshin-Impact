<?php

require './model/db.php';

function home()
{
    $_POST['characters'] = getCharacters();
    if (isset($_SESSION['Account']['mail']) && existQueue($_SESSION['Account']['mail'])) {
        $_POST['queue'] = getQueues($_SESSION['Account']['mail']);
    }
    require __DIR__ . '/../view/accueil.php';
}

function character()
{
    $_POST = getCharacter(str_replace('-', ' ', $_GET['label']));
     $_POST['stones'] = get_stones($_POST['element']);
    if (in_array($_GET['label'], ['Lumine', 'Aether'])) {
        unset($_POST['lvl1']);
        unset($_POST['lvl_rar1']);
    }

    if (isset($_SESSION['Account']['mail']) && existQueue($_SESSION['Account']['mail'])) {
        $_POST['queue'] = getQueues($_SESSION['Account']['mail']);
    }
    require __DIR__ . '/../view/character.php';
}

function resources()
{
    $items = getItems();
    $_POST['lists'] = array();
    foreach ($items as $item) { // Try par le type de l'item
        if (!isset($_POST['lists'][$item['type']])) $_POST['lists'][$item['type']] = array();
        array_push($_POST['lists'][$item['type']], $item);
    }

    if (isset($_SESSION['Account']['mail']) && existQueue($_SESSION['Account']['mail'])) {
        $_POST['queue'] = getQueues($_SESSION['Account']['mail']);
    }
    require __DIR__ . '/../view/resources.php';
}

function queue()
{
    $_POST['lists'] = getQueues($_SESSION['Account']['mail']);
    require __DIR__ . '/../view/queue.php';
}

function signUp()
{
    $mail = secure($_POST['mail']);
    $pseudo = secure($_POST['pseudo']);
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    if (!empty($pseudo) && !empty($pass) && !empty($mail) && verify_mail($mail) && uniqueMail($mail)) {
        setUser($mail, $pass, $pseudo);
        signIn();
    } else {
        setFlash('This email address is already taken, or you have filled in a field incorrectly.', 'danger');
        header('Location:home');
    }
}

function signIn()
{
    if ($_SESSION['Account'] = getUser(secure($_POST['mail']), $_POST['pass'])) setFlash('Sign in!');
    else {
        setFlash('Bad request :(', 'danger');
        unset($_SESSION);
    }
    header('Location:home');
}

function signOut()
{
    session_destroy();
    header('Location:home');
}

function queue_complete()
{
    if (completeQueue($_SESSION['Account']['mail'])) {
        emptyQueue($_SESSION['Account']['mail']);
        clearQueue($_SESSION['Account']['mail']);
    } else setFlash('you do not have the necessary resources', 'danger');
    header('Location:home');
}

function slug($label)
{
    return str_replace(' ', '-', $label);
}

function getValue($item, $level): int
{
    if (!isset($_SESSION['Account'])) return 0;
    return getInventory2($_SESSION['Account']['mail'], $item, $level)['amount'] ?? 0;
}

function secure($var): string
{
    $var = htmlspecialchars($var);
    $var = trim($var);
    return strip_tags($var);
}

function verify_mail($mail): bool
{
    $isValid = true;
    $atIndex = strrpos($mail, "@");
    if (is_bool($atIndex) && !$atIndex) $isValid = false;
    else {
        $domain = substr($mail, $atIndex + 1);
        $local = substr($mail, 0, $atIndex);
        $localLen = strlen($local);
        $domainLen = strlen($domain);
        if ($localLen < 1 || $localLen > 64) {
            $isValid = false; // local part length exceeded
        } else if ($domainLen < 1 || $domainLen > 255) {
            $isValid = false; // domain part length exceeded
        } else if ($local[0] == '.' || $local[$localLen - 1] == '.') {
            $isValid = false; // local part starts or ends with '.'
        } else if (preg_match('/\\.\\./', $local)) {
            $isValid = false; // local part has two consecutive dots
        } else if (!preg_match('/^[A-Za-z0-9\\-.]+$/', $domain)) {
            $isValid = false; // character not valid in domain part
        } else if (preg_match('/\\.\\./', $domain)) {
            $isValid = false; // domain part has two consecutive dots
        } else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\", "", $local))) {
            // character not valid in local part unless
            // local part is quoted
            if (!preg_match('/^"(\\\\"|[^"])+"$/',
                str_replace("\\\\", "", $local))) {
                $isValid = false;
            }
        }
        if ($isValid && !(checkdnsrr($domain, "MX") || checkdnsrr($domain, "A")))
            $isValid = false;// domain not found in DNS
    }
    return $isValid;
}

function get_stones($element): array
{
    $var = null;
    switch ($element) {
        case 'Pyro':
            $var = 'Agnidus Agate';
            break;
        case 'Cryo':
            $var = 'Shivada Jade';
            break;
        case 'Hydro':
            $var = 'Varunada Lazurite';
            break;
        case 'Electro':
            $var = 'Vajrada Amethyst';
            break;
        case 'Geo':
            $var = 'Prithiva Topaz';
            break;
        case 'Anemo':
            $var = 'Vayuda Turquoise';
            break;
        case 'All':
            $var = 'Brilliant Diamond';
            break;
    }
    return getStones($var);
}
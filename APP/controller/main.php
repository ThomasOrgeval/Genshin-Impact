<?php

require './model/db.php';

function home()
{
    $_POST['characters'] = getCharacters();
    require './view/accueil.php';
}

function character()
{
    $_POST = getCharacter(str_replace('-', ' ', $_GET['label']));
    require './view/character.php';
}

function resources()
{
    $items = getItems();
    $_POST['items'] = array();
    foreach ($items as $item) {
        if (!isset($_POST['items'][$item['type']])) $_POST['items'][$item['type']] = array();
        array_push($_POST['items'][$item['type']], $item);
    }
    require './view/resources.php';
}

function signUp()
{
    $mail = secure($_POST['mail']);
    $pseudo = secure($_POST['pseudo']);
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    if (!empty($pseudo) && !empty($pass) && !empty($mail) && verif_mail($mail) && uniqueMail($mail)) {
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
    else setFlash('Bad request :(', 'danger');
    header('Location:home');
}

function signOut()
{
    session_destroy();
    header('Location:home');
}

function slug($label)
{
    return str_replace(' ', '-', $label);
}

function getValue($var): int
{
    $value = 0;
    if (isset($_SESSION) && ((isset($_SESSION['items']) && isset($_SESSION['items'][$var]) || $_SESSION[$var] ))) {
        if ($var === 'moras') $value = $_SESSION[$var];
        else $value = $_SESSION['items'][$var];
    } elseif (isset($_COOKIE) && (isset($_COOKIE['item' . $var]) || isset($_COOKIE[$var]) )) {
        if ($var === 'moras') $value = $_COOKIE[$var];
        else $value = $_COOKIE['item' . $var];
    }
    return $value;
}

function secure($var): string
{
    $var = htmlspecialchars($var);
    $var = trim($var);
    return strip_tags($var);
}

function verif_mail($mail)
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
<?php

function flash(): ?string
{
    $flash = null;
    if (isset($_SESSION['Flash'])) {
        $flash = '<div class="alert alert-' . $_SESSION['Flash']['type'] . ' text-center" role="alert">' . $_SESSION['Flash']['message'] .'</div>';
        unset($_SESSION['Flash']);
    }
    return $flash;
}

function setFlash($message, $type = 'primary')
{
    $_SESSION['Flash']['message'] = $message;
    $_SESSION['Flash']['type'] = $type;
}
